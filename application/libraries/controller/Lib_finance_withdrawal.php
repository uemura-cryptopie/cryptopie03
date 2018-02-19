<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_finance_withdrawal {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_balance');
		$this->CI->load->library('model/lib_t_jpy_history');
		$this->CI->load->library('controller/lib_finance');
		$this->CI->load->library('support/lib_error');
		$this->CI->load->library('basic/mail');
	}

	// INDEXに必要な情報を取得
	public function indexData() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$this->params['history'] = $this->CI->lib_t_jpy_history->getHistoryView();
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => null,
				'catch' => null
			)
		);
		return $this->params;
	}


	// 送信アドレス一覧取得
	public function insert_exec() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$currency_id = 1;
				$fee = 400;
				$post      = $this->CI->input->post();
				$user_info = $this->CI->session->userdata();
				// 残高チェック
				$checkamount = $this->CI->lib_finance->checkAmount(bcadd($post['amount'], $fee), $currency_id);
				// 一日上限チェック
				$is_tradable = $this->CI->lib_finance->isTradable($post['amount'], $currency_id);
				if (!$checkamount['result'] || !$is_tradable['result']) {
					if (!$checkamount['result']) {
						$error = array('error' => '「残高」が不足しています');
					} else if (!$is_tradable['result']) {
						$error = array('error' => '一日の取引上限を超えています');
					}
					$this->CI->session->set_flashdata($error);
					redirect(base_url() . 'mypage/finance/jpy-withdrawal/');
				}
				$params = array(
					'user_type' => $user_info['user_type'],
					'user_id'   => $user_info['user_id'],
					't_bank_id' => $post['bank'],
					'type'      => 1,
					'amount'    => $post['amount'],
					'fee'       => $fee,
					'status'    => 0,
				);
				// 残高更新
				$update_params = array(
					'm_currency_id' => $currency_id,
					'amount'        => bcdiv(bcadd($post['amount'], $fee), -1)
				);
				$where = array(
					'user_id'       => $user_info['user_id'],
					'user_type'     => $user_info['user_type'],
					'm_currency_id' => $currency_id // 日本円
				);
				$this->CI->lib_t_balance->update($update_params, $where);
				// 出金依頼登録
				$this->CI->lib_t_jpy_history->insert($params);
				$success = array('success' => '出金依頼を承りました');
				$this->CI->session->set_flashdata($success);
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => null,
				'catch' => null
			)
		);
	}
	/**
	 * メール送信実行
	 * return bool
	 */
	public function sendMail() {
		$user = $this->CI->lib_mypage->getUserData();
		$options = array(
			'to' => $user['mail'],
			'data' => array()
		);

		// Template mail use for register corp
		$options['subject']  = '【CryptoPie】出金依頼を承りました';
		$options['template'] = 'mypage/mail/withdrawal.tpl';

		return $this->CI->mail->sendEmail($options);
	}

	/**
	 * 残高取得ajax
	 * return bool
	 */
	public function checkAmount() {
		$currency_id = 1;
		$fee         = 400;
		$post        = $this->CI->input->post();
		$checkamount = $this->CI->lib_finance->checkAmount(bcadd($post['amount'], $fee), $currency_id);
		echo json_encode($checkamount);
	}

}
