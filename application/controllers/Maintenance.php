<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * メンテナンス画面
	 */
	public function index() {
		if (!self::MAINTENANCE) {
			redirect(base_url());
		}
		$this->session->sess_destroy();
		$this->tpl('maintenance.tpl');
		exit();
	}
}