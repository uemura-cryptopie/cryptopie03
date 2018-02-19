<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_m_wallet {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('m_wallet');
		$this->CI->load->library('model/lib_m_api');
	}

	// SELECT
	public function getData($params='', $item='m_currency_id') {
		// 残高取得
		return $this->CI->m_wallet->getAll($params, $item);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->m_wallet->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->m_wallet->update($params, $where);
	}

	// SELECT
	public function getUsable() {
		// TODO
		// api情報取得
		// 
		$api = $this->CI->lib_m_api->getDataList();
		$wallet_sql = array(
			'where' => 'usable = 1'
		);
		$result = $this->CI->m_wallet->getList($wallet_sql);
		foreach ($result as $value) {
			$wallets[$value['m_currency_id']] = $value;
			$wallets[$value['m_currency_id']]['api'] = $api[$value['m_api_id']];
		}
		return $wallets;
	}


}