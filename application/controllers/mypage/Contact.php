<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('controller/lib_contact');
		$this->load->library('support/Lib_log');
		$this->is_login();
	}

	/**
	 * Index
	 */
	public function index()
	{
		// インデックスにアクセスされたらリダイレクト
		redirect(base_url() . "mypage/contact/input/");
	}
	
	/**
	 * 質問内容入力
	 */
	public function input()
	{
		
		$id = $this->session->userdata('user_id');
		$back_url = base_url();
		
		if ($id) {
			$back_url = base_url() . 'mypage/';
		}
		$this->assign('back_url', $back_url);
		$this->tpl('mypage/contact/input.tpl');
	}

	/**
	 * 登録実行
	 */
	public function register()
	{
		if ($this->lib_contact->validateInputs()) {
			// 登録実行
			$this->load->model('t_contact');
			$this->load->library('basic/mail');
			$result = $this->t_contact->insert($this->input->post()); // 登録実行
			$this->lib_contact->sendMailMyPage(); // メール送信(問合せ本人&BCC)
			redirect(base_url() . "mypage/contact/complete/");
		} else {
			// 再入力
			$this->assign('params', $this->input->post());
			$this->assign('error', $this->form_validation->error_array());
			$this->tpl('mypage/contact/input.tpl');
		}
	}

	
	/**
	 * 質問内容確認
	 */
	public function complete()
	{
		$id = $this->session->userdata('user_id');
		$back_url = null;
		if ($id) {
			$back_url = base_url() . 'mypage/';
		}
		$this->assign('back_url', $back_url);
		$this->tpl('mypage/contact/complete.tpl');
	}

}
