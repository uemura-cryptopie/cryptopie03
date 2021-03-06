<?php
class M_wallet extends MY_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * SELECT(ID)
	 *
	 */
	public function getAll($params='', $item='m_wallet_id', $key='id')
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
	 * SELECT BY ID
	 * 
	 */
	public function getById($id)
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
	 * UPDATE
	 * 
	 */
	public function update($data, $where)
	{
		return $this->execute_update($data, $where);
	}

	/**
	 * INSERT
	 * 
	 */
	public function insert_batch($data)
	{
		return $this->execute_insert_batch($data);
	}

	/**
	 * UPDATE
	 * 
	 */
	public function update_batch($data, $where)
	{
		return $this->execute_update_batch($data, $where);
	}

}