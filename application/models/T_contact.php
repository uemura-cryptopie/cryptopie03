<?php
class T_contact extends MY_Model {
	
	function __construct()
	{
		parent::__construct();
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