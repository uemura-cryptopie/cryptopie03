<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_m_currency {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('m_currency');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->m_currency->getAll($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->m_currency->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->m_currency->update($params, $where);
	}
}