<?php
class M_pref extends MY_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * SELECT(ID)
	 *
	 */
	public function selectAll()
	{
		return $this->getAll();
	}

	/**
	 * SELECT(ID)
	 *
	 */
	public function getAll()
	{
		$result = $this->get_master_all();

		if ($result === FALSE) return FALSE;

		return $result;
	}
}