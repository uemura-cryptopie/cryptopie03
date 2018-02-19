<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_virtual_history {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_virtual_history');
		$this->CI->load->library('basic/lib_string');
		$this->CI->load->library('model/lib_m_currency');
	}

	// SELECT
	public function getData($params=array()) {
		return $this->CI->t_virtual_history->getList($params);
	}

	// INSERT
	public function insert($params) {
		return $this->CI->t_virtual_history->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		return $this->CI->t_virtual_history->update($params, $where);
	}

	// トランザクション登録・更新実行
	public function save($params) {
		foreach ($params as $transaction) {
			// 検索条件
			$sql_params = "order_id = '".$transaction['order_id']."'";
			// 実行時間計測
			$this->CI->benchmark->mark('code_start');
			try {
				// トランザクションの実行
				$this->CI->db->trans_off();
				$this->CI->db->trans_start();
				$this->CI->benchmark->mark('code_end');
				// 登録されてるかチェック
				$result = $this->getData(array('where' => $sql_params));
				if (!$result) {
					// 登録実行
					$this->insert($transaction);
				} else if ($transaction['status'] == 1) { // 承認済み
					// 更新実行
					$currency_id = 2;
					// 更新済みの場合はスルー
					if ($result[0]['status']) continue;
					$this->update($transaction, $sql_params);
					// アカウント残高更新
					$update_params = array(
						'm_currency_id' => $currency_id, // BTC
						'amount'        => $transaction['amount']
					);
					$where = array(
						'user_id'       => $result[0]['user_id'],
						'user_type'     => $result[0]['user_type'],
						'm_currency_id' => $currency_id
					);
					$this->CI->lib_t_balance->update($update_params, $where);
				}
				$this->CI->db->trans_complete();
			} catch (UserException $e) {
				$this->CI->db->trans_complete();
				$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
				$this->CI->lib_t_error_log->insert($e, $benchmark);
			}
		}
	}

	public function getDataView($params=array()) {
		$result = $this->getData($params);
		$currency = $this->CI->lib_m_currency->getData();
		foreach ($result as $key => $value) {
			$result[$key]['inserted_at']   = date('Y/m/d H:i:s', strtotime($value['inserted_at']));
			$result[$key]['m_currency_id'] = $currency[$value['m_currency_id']];
			$result[$key]['amount']        = $this->CI->lib_string->myNumberFormat($value['amount']);
			$result[$key]['tx_hash_trim']  = $this->CI->lib_string->sMidTrim($value['tx_hash'], 17, false, '.....');
			$result[$key]['status_view']        = $this->CI->approve_type[$value['status']];
		}
		return $result;
	}


}