<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_mypage {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_error_log');
		$this->CI->load->library('model/lib_t_balance');
		$this->CI->load->library('model/lib_t_shop_history');
		$this->CI->load->library('model/lib_m_currency');
		$this->CI->load->library('model/lib_t_user_status');
		$this->CI->load->library('support/lib_user_function');
	}

	public function commonData() {
		$result = array(
			'balance' => ''
		);
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
			$result['balance'] = $this->CI->lib_t_balance->getBalanceView();
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$result = $this->CI->lib_t_error_log->insert($e, $benchmark);
		}

		return $result;
	}

	public function indexData() {
		$result = array(
			'currency' => '',
			'history' => ''
		);
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
			$login    = $this->CI->session->userdata();
			$shop_sql = array(
				'where'    => 'user_id = '.$login['user_id'].' AND user_type = '.$login['user_type'],
				'order_by' => 'id DESC'
			);
			$result['currency'] = $this->CI->lib_m_currency->getData();
			$result['history'] = $this->CI->lib_t_shop_history->getData($shop_sql);
			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$result = $this->CI->lib_t_error_log->insert($e, $benchmark);
		}

		return $result;
	}

	// 本人確認書類 アップロード済み確認
	public function is_upload() {
		$user = $this->CI->login_info;
		$instance = $this->CI->lib_user_function->getUserInstance($user['user_type']);
		$params = array('where' => 'id = '.$user['user_id'].' AND image_id != ""');
		$result = $instance->getData($params);

		// ユーザーステータスSESSION更新
		$where = 'user_type = '.$user['user_type'].' AND user_id = '.$user['user_id'];
		$user_status = $this->CI->lib_t_user_status->getData(array('where' => $where));
		$this->CI->session->set_userdata('status', $user_status[0]);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}


	// 本人確認書類 アップロード済み確認
	public function getUserData() {
		$user = $this->CI->login_info;
		$instance = $this->CI->lib_user_function->getUserInstance($user['user_type']);
		return $instance->getDataById($user['user_id']);
	}


}
