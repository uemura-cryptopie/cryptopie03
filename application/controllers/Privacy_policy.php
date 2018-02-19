<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->tpl('privacy_policy.tpl');
	}

}
