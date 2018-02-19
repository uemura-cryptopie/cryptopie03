<?php
class Log_pass extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	/**
	 * Check data exists in database
	 * 
	 */
	public function checkDuplicate($data, $isData = false) {
		return $this->get_record($data, $isData);
	}

	/**
	 * Insert
	 * 
	 */
	public function insert($data) {
		return $this->execute_insert($data);
	}

	/**
	 * Update
	 */
	public function update($data, $where) {
		return $this->execute_update($data, $where);
	}
}