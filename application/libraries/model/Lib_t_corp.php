<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_corp {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_corp');
	}

	// SELECT
	public function getData($params=array()) {
		return $this->CI->t_corp->getList($params);
	}

	// SELECT
	public function getDataById($id) {
		return $this->CI->t_corp->getDataById($id);
	}

	
	// INSERT
	public function insert($params) {
		return $this->CI->t_corp->insert($params);
	}
	
	
	// UPDATE
	public function update($params, $where) {
		return $this->CI->t_corp->update($params, $where);
	}

	// 本会員登録者 法人 取得
	public function getNewList() {
		$sql_params = array(
			'select' => 't_corp.*' . $this->CI->lib_user_function->getJoinFields('t_user_status', 'status'),
			'where' => 'image_id = "" OR image_id IS NULL',
			'join' => array('t_user_status', ' t_user_status.user_type = 2 AND t_corp.id = t_user_status.user_id')
		);
		return $this->getData($sql_params);
	}

	// ＩＤ登録者一覧 法人 取得
	public function getIdList() {
		$sql_params = array(
			'select' => 't_corp.*' . $this->CI->lib_user_function->getJoinFields('t_user_status', 'status'),
			'where' => 'image_id != "" AND  (t_user_status.id_check = 0 OR t_user_status.id_check = 2)  AND t_user_status.post = 0 AND t_user_status.usable = 0',
			'join' => array('t_user_status', ' t_user_status.user_type = 2 AND t_corp.id = t_user_status.user_id')
		);
		return $this->getData($sql_params);
	}
	
	// 郵送対象者一覧 法人 取得
	public function getPostList() {
		$sql_params = array(
			'select' => 't_corp.*' . $this->CI->lib_user_function->getJoinFields('t_user_status', 'status'),
			'where' => 't_user_status.id_check = 1 AND (t_user_status.post = 0 OR t_user_status.post = 2) AND t_user_status.usable = 0',
			'join' => array('t_user_status', ' t_user_status.user_type = 2 AND t_corp.id = t_user_status.user_id')
		);
		return $this->getData($sql_params);
	}
	
	// 登録完了者一覧 法人 取得
	public function getUsableList() {
		$sql_params = array(
			'select' => 't_corp.*' . $this->CI->lib_user_function->getJoinFields('t_user_status', 'status'),
			'where' => 't_user_status.usable = 1',
			'join' => array('t_user_status', ' t_user_status.user_type = 2 AND t_corp.id = t_user_status.user_id')
		);
		return $this->getData($sql_params);
	}
	
	// ＩＤ登録画像 取得
	public function getIdImages($id) {
		$sql_params = array(
			'select' => 'file_certificate, image_id, image_front, image_back, list_image',
			'where' => 'id = '.$id.' AND image_id != ""',
		);
		$result = $this->getData($sql_params);
		return $result[0];
	}
	

}