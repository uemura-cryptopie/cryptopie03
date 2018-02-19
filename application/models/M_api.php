<?php
class M_api extends MY_Model {
	
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
		$result = $this->get_all($params);
		foreach ($result as $key => $value) {
			$api[$value['id']] = $value;
		}
		return $api;
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