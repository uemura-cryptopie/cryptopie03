<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_user_function {


	function __construct()
	{
		$this->CI =& get_instance();
	}

	/**
	 * try catch
	 * return bool
	 */
	public function userTrycatch(callable $func, callable $catch, $argument) {
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		
		try {
			
			call_user_func($func, $argument['try']);
			
			$this->CI->db->trans_complete();
			
			// 実行時間計測 終了
			$this->CI->benchmark->mark('code_end');
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$this->CI->lib_t_error_log->insert($e, $benchmark);
			
			call_user_func($catch, $argument['catch']);
			
			return false;
		}
		return true;
	}

	public function makePaymentId($user_type, $user_id) {
		$query_params = array(
			'select_max' => 'payment_id'
		);
		// 名義IDの最大値を取得
		if ($user_type == 1) {
			$this->CI->load->model('t_user');
			$result = $this->CI->t_user->getData($query_params);
		} else {
			$this->CI->load->model('t_corp');
			$result = $this->CI->t_corp->getData($query_params);
		}
		$payment_id = (int)$result[0]['payment_id'];

		// 名義ID作成
		if (empty($payment_id)) return $user_type.'0000'.$user_id;
		// 先頭の数字を取得
		$num = (int)substr($payment_id, 0, 1);
		if ($user_id < 10000) {
			$user_num = sprintf('%05d', $user_id);
		} else {
			$user_num = substr($user_id, -5);
		}

		// 重複チェック
		$check_paymentid = array(
			'where' => "payment_id = '".$num.$user_num."'"
		);
		if ($user_type == 1) {
			$check = $this->CI->t_user->getData($check_paymentid);
		} else {
			$check = $this->CI->t_corp->getData($check_paymentid);
		}
		if ($check) {
			// 下5桁が最大値の場合は繰り上げる
			$num = $num + 2; // 個人=先頭奇数, 法人=先頭偶数
		}
		return $num.$user_num;
	}

	/**
	 * user_type（ユーザー種別）
	 * ユーザー種別から参照テーブルを取得
	 */
	public function getUserInstance($user_type) {
		if ($user_type == 1) {
			$this->CI->load->model('t_user');
			return $this->CI->t_user;
		} else {
			$this->CI->load->model('t_corp');
			return $this->CI->t_corp;
		}
		
	}
}
