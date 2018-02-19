<?php
class M_country extends MY_Model {
	
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
		$result = $this->get_all_data(array('key' => 'id', 'value' => 'country_name'));

		if ($result === FALSE) return FALSE;

		return $result;
	}
}