<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_m_api {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('m_api');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->m_api->getAll($params);
	}

	// SELECT
	public function getDataList($params=array()) {
		// 残高取得
		return $this->CI->m_api->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->m_api->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->m_api->update($params, $where);
	}
}