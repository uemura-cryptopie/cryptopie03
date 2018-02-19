<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_user_agent {
	function __construct()
	{
		$this->CI =& get_instance();
	}


	public function is_sumaho()
	{
		if ($this->is_iphone() || $this->is_android()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_agent()
	{
		$http_user_agent = $this->CI->input->server('HTTP_USER_AGENT');
		return ($http_user_agent) ? $http_user_agent : '';
	}

	public function is_ie()
	{
		return preg_match('/MSIE/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_ie6()
	{
		return preg_match('/MSIE 6/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_ie7()
	{
		return preg_match('/MSIE 7/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_ie8()
	{
		return preg_match('/MSIE 8/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_ie9()
	{
		return preg_match('/MSIE 9/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_iphone()
	{
		return preg_match('/iPhone/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_ipad()
	{
		return preg_match('/iPad/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_android()
	{
		return preg_match('/Android/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_androidLU()
	{
		return preg_match('/Linux; U;/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_android23()
	{
		return preg_match('/Android 2.3/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_android40()
	{
		return preg_match('/Android 4.0/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_firefox()
	{
		return preg_match('/Firefox/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function is_chrome()
	{
		return preg_match('/Chrome/', $this->check_agent()) ? TRUE : FALSE ;
	}

	public function assign_agent()
	{
		$this->CI->smarty->assign('is_ie', $this->is_ie());
		$this->CI->smarty->assign('is_ie6', $this->is_ie6());
		$this->CI->smarty->assign('is_ie7', $this->is_ie7());
		$this->CI->smarty->assign('is_ie8', $this->is_ie8());
		$this->CI->smarty->assign('is_ie9', $this->is_ie9());
		$this->CI->smarty->assign('is_ipad', $this->is_ipad());
		$this->CI->smarty->assign('is_sumaho', $this->is_sumaho());
		$this->CI->smarty->assign('is_iphone', $this->is_iphone());
		$this->CI->smarty->assign('is_android', $this->is_android());
		$this->CI->smarty->assign('is_firefox', $this->is_firefox());
		$this->CI->smarty->assign('is_chrome', $this->is_chrome());
		$this->CI->smarty->assign('is_androidLU', $this->is_androidLU());
		$this->CI->smarty->assign('is_android23', $this->is_android23());
		$this->CI->smarty->assign('is_android40', $this->is_android40());
	}
}
