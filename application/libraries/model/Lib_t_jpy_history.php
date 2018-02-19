<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_jpy_history {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_jpy_history');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_jpy_history->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->t_jpy_history->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_jpy_history->update($params, $where);
	}

	public function getHistory() {
		$user_info = $this->CI->session->userdata();
		$sql_params = array(
			'where'    => 'user_id = '.$user_info['user_id'].' AND user_type = '.$user_info['user_type'],
			'order_by' => 'inserted_at DESC'
		);
		return $this->getData($sql_params);
	}

	public function getHistoryView() {
		$history = $this->getHistory();
		if (empty($history)) return array();
		foreach ($history as $key => $value) {
			$history[$key]['inserted_at'] = date('Y/m/d H:i:s', strtotime($value['inserted_at']));
			$history[$key]['amount'] = number_format($value['amount']);
			$history[$key]['status'] = $this->CI->withdrawal_type[$value['status']];
		}
		return $history;
	}

}