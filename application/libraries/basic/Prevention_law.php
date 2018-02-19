<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prevention_law {

	function __construct()
	{
		$this->CI =& get_instance();
	}

	public function radio($data = null) {
		$result =  array(
			'1' => 'はい',
			'2' => 'いいえ'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}
}