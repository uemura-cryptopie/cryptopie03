<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_m_ticker_adjustment {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('m_ticker_adjustment');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->m_ticker_adjustment->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->m_ticker_adjustment->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->m_ticker_adjustment->update($params, $where);
	}
}