<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticker extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('basic/lib_ticker');
	}

	/**
	 * Index
	 */
	public function index()
	{
		// インデックスにアクセスされたらリダイレクト
		redirect(base_url() . "api/ticker/get/");
	}
	/**
	 * Index
	 */
	public function get()
	{
		echo json_encode($this->lib_ticker->getDataDb());
	}
}
