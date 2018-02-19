<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_error {
	function __construct()
	{
		$this->CI =& get_instance();
	}


	public function error_404()
	{
		$this->CI->tpl('error/404.tpl');
		exit();
	}

	public function error_general()
	{
		$this->CI->tpl('error/general.tpl');
		exit();
	}


}
