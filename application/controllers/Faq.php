<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_login();
	}

	public function index()
	{
		$this->tpl('faq.tpl');
	}

}
