<?php
class M_currency extends MY_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * SELECT(ID)
	 *
	 */
	public function getAll($params='', $item='name', $key='id')
	{
		$result = $this->get_master_all($params, $item, $key);

		if ($result === FALSE) return FALSE;

		return $result;
	}

	/**
	 * SELECT
	 * 
	 */
	public function getList($params=array())
	{
		return $this->get_all($params);
	}


	/**
	 * INSERT
	 * 
	 */
	public function insert($data)
	{
		return $this->execute_insert($data);
	}

}