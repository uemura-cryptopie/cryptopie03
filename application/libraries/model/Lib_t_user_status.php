<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_user_status {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_user_status');
		$this->CI->load->library('model/lib_t_user_status');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_user_status->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->t_user_status->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_user_status->update($params, $where);
	}

	// INSERT
	public function insertFirst($user_type, $user_id) {
		// DB登録実行
		$params = array(
			'user_type' => $user_type,
			'user_id'   => $user_id,
			'new_date'  => date('Y-m-d H:i:s'),
		);
		return $this->CI->t_user_status->insert($params);
	}

	// 本人確認書類 再登録時にステータス変更
	public function updateIdStatus() {
		$user = $this->CI->login_info;
		// DB登録実行
		$where = 'user_type = '.$user['user_type'].' AND user_id = '.$user['user_id'];
		$params = array(
			'id_check'      => 0,
			'id_check_date' => date('Y-m-d H:i:s'),
		);
		// ステータス取得&セッションセットし直す
		$result = $this->CI->t_user_status->update($params, $where);
		$user_status = $this->CI->lib_t_user_status->getData(array('where' => $where));
		$this->CI->session->set_userdata('status', $user_status[0]);
		return $result;
	}


}