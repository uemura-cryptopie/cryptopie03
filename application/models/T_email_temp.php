<?php
class T_email_temp extends MY_Model {
	
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
	 * [isRegistered check user is registered]
	 * @param  [type]  $email [email]
	 * @return boolean        [true | false]
	 */
	public function isRegistered($email = null) {
		return $this->get_record(array('mail' => $email));	
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
	 * Delete
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	public function delete($where) {
		return $this->execute_delete($where);
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
}