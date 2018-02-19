<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_send_address {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_send_address');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_send_address->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->t_send_address->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_send_address->update($params, $where);
	}

	/**
	 * 受信アドレス取得
	 */
	public function getAddresses() {
		$addresses = array();
		$login     = $this->CI->session->userdata();
		// 残高情報取得
		$params = array('where' => 'user_id = '.$login['user_id'].' AND user_type = '.$login['user_type'].' AND delete_flag = 0');
		$result = $this->getData($params);
		if (empty($result)) return array();

		return $result;
	}


}