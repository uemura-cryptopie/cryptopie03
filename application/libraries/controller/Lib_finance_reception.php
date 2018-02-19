<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_finance_reception {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('coinbase/lib_wallet');
		$this->CI->load->library('model/lib_t_send_address');
		$this->CI->load->library('model/lib_t_virtual_wallet');
	}

	// 受信アドレス作成
	// TODO BTCのみ対応
	public function createAddress() {
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		// LOGIN 情報取得
		$login = $this->CI->session->userdata();
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
			// 重複確認 重複の場合リダイレクト
			$wallet = $this->CI->lib_t_virtual_wallet->getWallet(true);
			if ($wallet['BTC']) redirect(base_url() . 'mypage/finance/reception/');
			// アドレス作成
			$label = "user_".$login['user_type']."_".$login['user_id'];
			try {
				$address = $this->CI->lib_wallet->createNewAddress($label);
			} catch (Exception $e) {
				// coinbaseがエラーの時はリダイレクト
				redirect(base_url() . 'errors/address/');
			}
			$params = array(
				"user_type"   => $login['user_type'],
				"user_id"     => $login['user_id'],
				"address_id"  => $address['id'],
				"address"     => $address['address'],
				"m_wallet_id" => 2
			);
			// アドレス 取引履歴登録
			$result = $this->CI->lib_t_virtual_wallet->insert($params);
			// 実行時間計測 終了
			$this->CI->benchmark->mark('code_end');
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$this->CI->lib_t_error_log->insert($e, $benchmark);
		}
	}


}
