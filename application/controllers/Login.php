<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->tpl('login.tpl');
	}
	public function two_factor_auth()
	{
		$this->tpl('two_factor_auth.tpl');
	}

}
