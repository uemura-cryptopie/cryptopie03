<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_finance_send {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('controller/lib_finance');
		$this->CI->load->library('coinbase/lib_transaction');
		$this->CI->load->library('model/lib_t_send_address');
		$this->CI->load->library('model/lib_t_balance');
		$this->CI->load->library('model/lib_t_virtual_wallet');
		$this->CI->load->library('support/lib_security');
		$this->CI->load->library('support/lib_error');
	}

	// 送信アドレス一覧取得
	public function addresses() {
		return $this->CI->lib_t_send_address->getAddresses();
	}

	// 送信アドレス一覧取得
	public function histories() {
		return $this->CI->lib_t_send_address->getAddresses();
	}

	// 送信アドレス登録
	public function add_exec() {
		$post  = $this->CI->input->post();
		$login = $this->CI->session->userdata();
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
			// 登録実行
			$user_info = array(
				'user_id'       => $login['user_id'],
				'user_type'     => $login['user_type'],
				'm_currency_id' => 1
			);
			$params = $post + $user_info;
			$this->CI->lib_t_send_address->insert($params);
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$result = $this->CI->lib_t_error_log->insert($e, $benchmark);
		}
	}

	// 送信アドレス更新
	public function update_exec() {
		$params = $this->CI->input->post();
		$login  = $this->CI->session->userdata();
		
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
			// 更新実行
			$where = 'user_id = '.$login['user_id'].' AND user_type = '.$login['user_type'].' AND id = '.$params['id'];
			$this->CI->lib_t_send_address->update($params, $where);
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$result = $this->CI->lib_t_error_log->insert($e, $benchmark);
		}
	}

	// BTC外部送信実行
	public function sendFunds()
	{
		$post   = $this->CI->input->post();
		// POST情報が無ければリダイレクト
		if (empty($post)) redirect(base_url() . 'mypage/finance/send/');
		
		
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');

		try {
			// 二段階認証チェック
			$user_data = $this->CI->lib_mypage->getUserData();
			if ($user_data['setting_transfer_coin'] == 1) {
				$verifyCode = $this->CI->lib_security->verifyCode($user_data['google_auth_code'], $post['google_code']);
				if (!$verifyCode) {
					$error = array('tf_error' => '認証コードが間違っています');
					$this->CI->session->set_flashdata($error);
					redirect(base_url() . 'mypage/finance/send/');
				}
			}
			
			$currency_id = 2;
			// トランザクションの実行
			$this->CI->db->trans_start();
			// 残高チェック
			$balance = $this->CI->lib_t_balance->getBalance(true);

			$total_amount = bcadd($post['amount'], 0.002);
			// 一日上限チェック
			$is_tradable = $this->CI->lib_finance->isTradable($post['amount'], $currency_id);

			if ($balance[$currency_id] < $total_amount || !$is_tradable['result'] || $post['amount'] < 0.001) {
				if ($post['amount'] < 0.001) {
					$error = array('error' => '最低送金額は0.001BTCです');
				} else if ($balance[$currency_id] < $total_amount) {
					$error = array('error' => '「残高」が不足しています');
				} else if (!$is_tradable['result']) {
					$error = array('error' => '一日の取引上限を超えています');
				}

				$this->CI->session->set_flashdata($error);
				redirect(base_url() . 'mypage/finance/send/');
			}


			// cryptopieユーザーかチェック
			$to_wallet = $this->CI->lib_t_virtual_wallet->getUserInfo($post['address']);
			if (!empty($to_wallet)) {
				// cryptopieアカウント
				// アドレスからユーザー情報を取得
				// パラメータ作成
				$from_wallet = $this->CI->lib_t_virtual_wallet->getWallet();
				// ユーザー情報の取得
				// 送信トランザクション登録
				$to_transaction = $this->make_params_cryptopie($from_wallet, $to_wallet, 1);
				$this->CI->lib_t_virtual_history->insert($to_transaction);

				// 受信トランザクション登録
				$from_transaction = $this->make_params_cryptopie($from_wallet, $to_wallet, 2);
				$this->CI->lib_t_virtual_history->insert($from_transaction);

				// 残高更新(受信者)
				$update_params = array(
					'm_currency_id' => 2,
					'amount'        => $post['amount']
				);
				$where = array(
					'user_id'       => $to_wallet['user_id'],
					'user_type'     => $to_wallet['user_type'],
					'm_currency_id' => 2
				);
				$this->CI->lib_t_balance->update($update_params, $where);
			} else {
				// 外部送金
				try {
					$result = $this->CI->lib_transaction->sendFunds(
							$post['address'],
							$post['amount']
						);
				} catch (Exception $e) {
					// coinbaseがエラーの時はリダイレクト
					$this->CI->db->trans_complete();

					$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
					$massage = (object)['errorMessage'=>'131 '.$e->getMessage()];
					$this->CI->lib_t_error_log->insert($massage, 1);
					redirect(base_url() . 'errors/communication/');
				}

				// 送信実行
				if (!$result) {
					$this->CI->db->trans_complete();

					$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
					$massage = (object)['errorMessage'=>'142 '.json_encode($result)];
					$this->CI->lib_t_error_log->insert($massage, $benchmark);
					redirect(base_url() . 'errors/communication/');
				}
				// 送信トランザクション登録
				$transaction = $this->make_params($result);
				$this->CI->lib_t_virtual_history->insert($transaction);
			}

			// 残高更新(送信者)
			$update_params = array(
				'm_currency_id' => 2,
				'amount'        => bcdiv($total_amount, -1)
			);
			$login  = $this->CI->session->userdata();
			$where = array(
				'user_id'       => $login['user_id'],
				'user_type'     => $login['user_type'],
				'm_currency_id' => 2
			);
			$this->CI->lib_t_balance->update($update_params, $where);

			$success = array('success' => 'ビットコイン送金を承りました');
			$this->CI->session->set_flashdata($success);

			// 実行時間計測 終了
			$this->CI->benchmark->mark('code_end');
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();

			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$this->CI->lib_t_error_log->insert($e, $benchmark);
		}
	}

	/*
	 * 更新用 配列作成
	 */
	public function make_params($params) {
		// TODO
		// BTCのみ対応

		// アドレスからユーザー情報を取得
		// パラメータ作成
		$wallet = $this->CI->lib_t_virtual_wallet->getWallet();
		$result = array();
		// ユーザー情報の取得
		$user_info = $this->CI->session->userdata();
		$result = array(
			'order_id'        => $params['id'],
			'user_type'       => $user_info['user_type'],
			'user_id'         => $user_info['user_id'],
			'type'            => 1,
			'm_currency_id'   => 2,
			'amount'          => $params['network']['transaction_amount']['amount'],
			'user_address'    => $wallet[2]['address'],
			'to_address'      => $params['to']['address'],
			'fee'             => 0.002,
			'transaction_fee' => $params['network']['transaction_fee']['amount'],
			'status'          => 0,
		);
		return $result;
	}

	/*
	 * 更新用 配列作成
	 */
	public function make_params_cryptopie($from_wallet, $to_wallet, $type) {
		// TODO
		// BTCのみ対応
		$post   = $this->CI->input->post();
		// パラメータ作成
		$result = array(
			'user_type'       => ($type == 1) ? $from_wallet[2]['user_type'] : $to_wallet['user_type'],
			'user_id'         => ($type == 1) ? $from_wallet[2]['user_id'] : $to_wallet['user_id'],
			'type'            => $type,
			'm_currency_id'   => 2,
			'amount'          => $post['amount'],
			'user_address'    => ($type == 1) ? $from_wallet[2]['address'] : $to_wallet['address'],
			'to_address'      => ($type == 1) ? $to_wallet['address'] : NULL,
			'fee'             => ($type == 1) ? 0.002 : NULL,
			'status'          => 1,
			'created_at'      => date('Y-m-d H:i:s'),
		);
		return $result;
	}


/*------------------------------------------------------------------------------------------*
 * バリデーション
 *------------------------------------------------------------------------------------------*/
	/*
	 * 送信先登録
	 */
	public $sendAddressRules = array(
		array(
			'field' => 'name',
			'label' => '名称',
			'rules' => array(
				'required',
			),
		),
		array(
			'field' => 'address',
			'label' => '新しいビットコインアドレス',
			'rules' => array(
				'required',
			),
		),
	);

}
