<?php
class T_faq extends MY_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * SELECT
	 * 
	 */
	public function getDataList($params=array())
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
	 * UPDATE
	 * 
	 */
	public function update($data, $where)
	{
		$where = 'id = '.$data['id'];
		return $this->execute_update($data, $where);
	}

	/**
	 * UPDATE
	 * 
	 */
	public function delete($data)
	{
		$where = 'id = '.$data['id'];
		return $this->execute_update_flag($data, $where);
	}

}