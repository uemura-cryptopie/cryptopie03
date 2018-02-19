<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_finance {

	const TX_HASH_URL = 'https://blockchain.info/ja/rawtx/';

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('coinbase/lib_transaction');
		$this->CI->load->library('coinbase/lib_wallet');
		$this->CI->load->library('model/lib_t_virtual_wallet');
		$this->CI->load->library('model/lib_t_virtual_history');
		$this->CI->load->library('model/lib_t_jpy_history');
		$this->type = array('pending' => 0, 'completed' => 1);
	}

	// 受信トランザクション更新
	public function saveTransactionReceived() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$wallet = $this->CI->lib_t_virtual_wallet->getData();
				$receive_tx = array();
				// 受信アドレスごとの受信トランザクションを取得
				foreach ($wallet as $key => $value) {
					$tmp = array();
					try {
						$tmp[$key] = $this->CI->lib_transaction->getAddressTransactions($value['address_id']);
					} catch (Exception $e) {
					}
					$tmp[$key]['address'] = $value['address'];
					$receive_tx = array_merge($receive_tx, $this->receivedConfirm($tmp[$key]));
				}
				// 受信トランザクション登録・更新
				$this->CI->lib_t_virtual_history->save($receive_tx);
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => null,
				'catch' => null
			)
		);
	}

	// 送信トランザクション更新
	public function saveTransactionSend() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				// 全ての送信トランザクションを取得
				try {
					$all_tx  = $this->CI->lib_transaction->getAccountTransactions();
				} catch (Exception $e) {
				}
				$send_tx = $this->sendConfirm($all_tx);

				// 送信トランザクション更新
				foreach ($send_tx as $send_tx_item) {
					if ($this->is_completed($send_tx_item['order_id'])) continue;
					$where = array('order_id' => $send_tx_item['order_id']);
					$this->CI->lib_t_virtual_history->update($send_tx_item, $where);
				}
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => null,
				'catch' => null
			)
		);
	}



	// BTC送信トランザクション確認
	public function sendConfirm($transaction) {
		$send = array();
		foreach ($transaction as $key => $value) {
			if (!strstr($value['details']['title'],'Sent')) continue;
			$send[] = array(
				'order_id'   => $value['id'],
				'tx_hash'    => $value['network']['hash'],
				'status'     => $this->type[$value['status']],
				'created_at' => date('Y-m-d H:i:s', strtotime($value['created_at'])),
			);
		}
		return $send;
	}

	// BTC受信トランザクション確認
	public function receivedConfirm($transaction) {
		$address = $transaction['address'];
		$user_info = $this->CI->lib_t_virtual_wallet->getUserInfo($address);
		// 不要になったアドレス情報を削除
		unset($transaction['address']);
		$received = array();
		foreach ($transaction as $key => $value) {
			if (!strstr($value['details']['title'],'Received')) continue;
			$received[] = array(
				'order_id'        => $value['id'],
				'user_type'       => $user_info['user_type'],
				'user_id'         => $user_info['user_id'],
				'type'            => 2,
				'm_currency_id'   => 2,
				'amount'          => $value['amount']['amount'],
				'user_address'    => $address,
				'tx_hash'         => $value['network']['hash'],
				'created_at'      => date('Y-m-d H:i:s', strtotime($value['created_at'])),
				'status'          => $this->type[$value['status']],
			);
		}
		return $received;
	}

	// 送受取履歴取得
	public function getHistory($type) {
		$history = array();
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		// LOGIN 情報取得
		$login = $this->CI->session->userdata();
		$sql_params = array(
			'where'    => 'user_id = '.$login['user_id'].' AND user_type = '.$login['user_type'].' AND type = '.$type,
			'order_by' => 'created_at DESC'
		);
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
			// 送受信トランザクション登録
			$history = $this->CI->lib_t_virtual_history->getDataView($sql_params);
			// 実行時間計測 終了
			$this->CI->benchmark->mark('code_end');
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$this->CI->lib_t_error_log->insert($e, $benchmark);
		}
		return $history;
	}

	// 送受取履歴取得
	public function is_completed($order_id) {
		$sql_params = array('where' => "order_id = '".$order_id."' AND status = 1");
		return $this->CI->lib_t_virtual_history->getData($sql_params);
	}


	/*
	 * 残高が足りているかチェック
	 */
	public function checkAmount($amount, $currency_id) {
		$currency_id = 1;
		if ($amount <= 0){
			// 注文数が0
			return array('result' => false, 'code' => 101);
		}
		// 残高取得
		$balance = $this->CI->lib_t_balance->getBalance(true);
		$amount = bcsub($balance[$currency_id], $amount);
		if ($amount < 0) {
			// 残高不足
			return array('result' => false, 'code' => 301);
		}
		return array('result' => true, 'code' => NULL);
	}

	// 一日の取引額を取得
	public function getDailyTrade($currency_id) {
		$user_info = $this->CI->session->userdata();
		$user_query = 'user_id = '.$user_info['user_id'].' AND user_type = '.$user_info['user_type'];
		$date_query = "inserted_at >= '".date('Y-m-d')." 00:00:00' AND inserted_at <= '".date('Y-m-d')." 23:59:59'";
		$sql_params = array(
			'select' => 'SUM(amount) AS total',
			'where'  => $user_query.' AND '.$date_query,
		);
		if ($currency_id == 1) {
			$result = $this->CI->lib_t_jpy_history->getData($sql_params);
		} else if ($currency_id == 2) {
			$result = $this->CI->lib_t_virtual_history->getData($sql_params);
		}
		if (empty($result[0]['total'])) {
			return 0;
		} else {
			return $result[0]['total'];
		}
	}


	/**
	 * 一日の取引額を取得し取引可能かチェック
	 * JPY上限（300万円）, BTC上限(5BTC)
	 * return bool
	 */
	public function isTradable($amount, $currency_id) {
		$limit = array(1 => 3000000, 2 => 5);
		$result = $this->getDailyTrade($currency_id);
		// 取引上限を超えていないかチェック
		$total = $result + $amount;
		if ($total > $limit[$currency_id]) {
			return array('result' => false, 'code' => 401);
		} else {
			return array('result' => true, 'code' => NULL);
		}
	}

}
