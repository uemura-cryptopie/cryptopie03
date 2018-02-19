<?php
class T_corp extends MY_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 重複登録チェック
	 * 
	 */
	public function checkDuplicate($data, $isData = false)
	{
		return $this->get_record($data, $isData);
	}

	/**
	 * [isRegistered check corp is registered]
	 * @param  [type]  $email [email]
	 * @return boolean        [true | false]
	 */
	public function isRegistered($email = null) {
		return $this->get_record(array('mail' => $email));	
	}

	/**
	 * SELECT
	 * 
	 */
	public function getData($params)
	{
		return $this->get_all($params);
	}

	/**
	 * SELECT BY ID
	 * 
	 */
	public function getDataById($id)
	{
		return $this->get_record_by_id($id);
	}

	/**
	 * INSERT
	 * 
	 */
	public function insert($data)
	{
		return $this->execute_insert($data);
	}

	/**
	 * Update
	 * @param  [array] $data [array data update]
	 * @param  [string | array] $where [condition]
	 * @return [boolean] [true | false]
	 */
	public function update($data, $where) {
		return $this->execute_update($data, $where);
	}

	/**
	 * Get primary key by email
	 */
	public function getIdByEmail($email) {
		$data = $this->checkDuplicate(array('mail' => $email), true);
		if (!empty($data[0]['id'])) {
			return $data[0]['id'];
		}
		return null;
	}
	public function checkSecurity($loginId,$corpId) {
		if(empty($loginId) ||empty($corpId)) {
			return false;
		}
		$this->load->model('log_login');
		$where = 'login_id = '.$loginId;
		$userLogin = $this->log_login->checkDuplicate($where,true);
		if(empty($userLogin[0]['id'])) {
			return false;
		}
		else {
			$where = 'id = '.$corpId;
			$dataCorp = $this->get_record($where , true);
			if(empty($dataCorp[0]['id']) || $dataCorp[0]['mail'] != $userLogin[0]['email']) {
				return false;
			}
		}
		return true;
	}
}