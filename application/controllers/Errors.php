<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 事前登録 (個人)
	 */
	public function error_404()
	{
		$this->output->set_status_header('404');
		$this->tpl('error/404.tpl');
	}

	/**
	 * 通信エラー
	 */
	public function error_general()
	{
		$this->output->set_status_header('503');
		$this->tpl('error/general.tpl');
	}
	/**
	 * 通信エラー
	 */
	public function communication()
	{
		$this->output->set_status_header('503');
		$this->tpl('error/communication.tpl');
	}
	/**
	 * 通信エラー (個人)
	 */
	public function address()
	{
		$this->output->set_status_header('503');
		$this->tpl('error/address.tpl');
	}
}
