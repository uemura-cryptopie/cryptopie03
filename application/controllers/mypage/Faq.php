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
		$this->load->model('m_faq_category');
		$this->load->library('controller/lib_faq');
		
		$this->assign('category', $this->m_faq_category->selectAll());
		$this->assign('faq', $this->lib_faq->getList());
		$this->tpl('mypage/faq.tpl');
	}

}
