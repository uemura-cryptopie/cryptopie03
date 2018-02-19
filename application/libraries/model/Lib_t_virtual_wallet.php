<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_virtual_wallet {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_virtual_wallet');
		$this->CI->load->library('model/lib_m_wallet');
		$this->CI->load->library('model/lib_m_currency');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_virtual_wallet->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->t_virtual_wallet->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_virtual_wallet->update($params, $where);
	}

	/**
	 * 残高取得
	 */
	public function getWallet($kye_name=false) {
		$user_wallet = '';
		$login    = $this->CI->session->userdata();
		$wallet   = $this->CI->lib_m_wallet->getData();
		$currency = $this->CI->lib_m_currency->getData();
		// 残高情報取得
		$params = array('where' => 'user_id = '.$login['user_id'].' AND user_type = '.$login['user_type']);
		$result = $this->getData($params);
		if (empty($result)) return false;

		// 通貨ごとに格納
		foreach ($result as $value) {
			$wallet_id = $value['m_wallet_id'];
			if ($kye_name) {
				$key = $currency[$wallet[$wallet_id]];
			} else {
				$key = $wallet[$wallet_id];
			}
			$user_wallet[$key] = $value;
		}

		return $user_wallet;
	}

	/**
	 * 受信アドレスからユーザー情報を取得
	 */
	public function getUserInfo($address) {
		$params = array('where' => "address = '".$address."'");
		$result = $this->getData($params);
		if (empty($result)) return array();

		return $result[0];
	}
}