<?php
class M_faq_category extends MY_Model {
	
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
		$result = $this->get_master_all();

		if ($result === FALSE) return FALSE;

		return $result;
	}
}