<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mail {


	function __construct()
	{
		$this->CI =& get_instance();
	}


	/**
	 * メール送信実行
	 * $params メール本文・内容
	 * $config['tpl'] 送信先
	 * $config['to'] 送信先
	 * $config['subject'] 送信先
	 * 
	 */
	public function trySend($config, $params) {
		// メールライブラリをロード
		$this->CI->load->library('email');

		// テンプレートに変数をアサイン（本文作成）
		$this->CI->load->library('parser');
		$message = $this->CI->parser->parse($config['tpl'], $params, TRUE);

		// 送信者情報
		$from      = 'info@cryptopie.com';
		$from_name = 'CryptoPie';

		$config['wordwrap'] = FALSE;
		$this->CI->email->initialize($config);

		$this->CI->email->from($from, mb_encode_mimeheader($from_name, 'UTF-8', 'B'));
		$this->CI->email->to($config['to']);
		$this->CI->email->subject($config['subject']);
		$this->CI->email->message($message);

		// メール送信
		return $this->CI->email->send();
	}

	/**
	 * [sendEmail send email]
	 * @param array $options [data use for send mail]
	 * @return boolean [true/false]
	 */
	public function sendEmail($options = array()) {
		// Load library email
		$this->CI->load->library('email');
		$this->CI->load->library('parser');

		// Default from and from name
		$from_default = EMAIL_USER_FROM;
		$from_name_default = EMAIL_USER_FROM_NAME;

		$from = isset($options['from']) ? $options['from'] : $from_default;
		$from_name = isset($options['from_name']) ? $options['from_name'] : $from_name_default;
		$from_name = mb_encode_mimeheader($from_name, 'UTF-8', 'B');
		$to = isset($options['to']) ? $options['to'] : $from_default;
		$cc = isset($options['cc']) ? $options['cc'] : array();
		$bcc = isset($options['bcc']) ? $options['bcc'] : array(EMAIL_USER_FROM, EMAIL_USER_BCC);

		// Default email bcc
		// $bcc[] = EMAIL_USER_BCC;

		$template = isset($options['template']) ? $options['template'] : 'mail_register_user.tpl';

		// Data use for template mail
		$data = isset($options['data']) ? $options['data'] : array();

		$subject = isset($options['subject']) ? $options['subject'] : $from_name_default . EMAIL_USER_SUBJECT;
		// $message = isset($options['message']) ? $options['message'] : $this->CI->parser->parse($template, $data, TRUE);


		// 追加コード
		// メール本文作成方法変更
		foreach ($data as $key => $value) {
			$this->CI->assign($key, $value);
		}
		$message = $this->CI->smarty->fetch($template);


		// Config email
		$configs = array(
			'protocol' => EMAIL_PROTOCOL,
			'smtp_host' => EMAIL_SMTP_HOST,
			'smtp_user' => EMAIL_SMTP_USER,
			'smtp_pass' => EMAIL_SMTP_PASS,
			'smtp_crypto' => EMAIL_SMTP_CRYPTO,
			'smtp_port' => EMAIL_SMTP_PORT,
			'wordwrap' => FALSE,
		);

		$this->CI->email->initialize($configs);

		$this->CI->email->from($from, $from_name);
		$this->CI->email->to($to);
		$this->CI->email->cc($cc);
		$this->CI->email->bcc($bcc);

		$this->CI->email->subject($subject);
		$this->CI->email->message($message);

		// Send mail
		return $this->CI->email->send();
	}

}
