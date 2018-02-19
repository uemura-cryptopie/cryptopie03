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
	public function checkDuplicate($data)
	{
		return $this->get_record($data);
	}

	/**
	 * SELECT
	 * 
	 */
	public function getList($params)
	{
		return $this->get_all($params);
	}

	/**
	 * INSERT
	 * 
	 */
	public function insert($params)
	{
		return $this->execute_insert($params);
	}

}