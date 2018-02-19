<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_contact {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('basic/mail');
	}


	/**
	 * 入力チェック
	 * return bool
	 */
	public function validateInputs() {
		$this->CI->load->library('form_validation');
		$config = array(
			array(
				'field' => 'name',
				'label' => 'お名前',
				'rules' => array(
					'required',
				),
			),
			array(
				'field' => 'mail',
				'label' => 'メールアドレス',
				'rules' => array(
					'required',
				),
			),
			array(
				'field' => 'subject',
				'label' => '件名',
				'rules' => array(
					'required',
				),
			),
			array(
				'field' => 'text',
				'label' => '問い合わせの内容',
				'rules' => array(
					'required',
				),
			),
		);
		$this->CI->form_validation->set_rules($config);
		$result = $this->CI->form_validation->run();
		if ($this->CI->form_validation->run() === true) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * メール送信実行
	 * return bool
	 */
	public function sendMail() {
		$post = $this->CI->input->post();

		$options = array(
			'to' => $post['mail'],
			'data' => $post
		);

		// Template mail use for register corp
		$options['subject']  = 'Cryptopie お問い合せメール';
		$options['template'] = 'other/contact/mail.tpl';

		return $this->CI->mail->sendEmail($options);
	}
	
	/**
	 * メール送信実行
	 * return bool
	 */
	public function sendMailMyPage() {
		$post = $this->CI->input->post();

		$options = array(
			'to' => $post['mail'],
			'data' => $post
		);

		// Template mail use for register corp
		$options['subject']  = 'Cryptopie お問い合せメール';
		$options['template'] = 'mypage/contact/mail.tpl';

		return $this->CI->mail->sendEmail($options);
	}
	
	
	
}
