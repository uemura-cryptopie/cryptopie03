<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_wallet {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_wallet');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_wallet->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->t_wallet->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_wallet->update($params, $where);
	}


}