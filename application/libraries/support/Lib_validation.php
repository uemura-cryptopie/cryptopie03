<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_validation {


	function __construct()
	{
		$this->CI =& get_instance();
	}


	/**
	 * 入力チェック
	 * return bool
	 */
	public function validateInputs($config, $message=array()) {
		$this->CI->load->library('form_validation');
		$this->CI->form_validation->set_rules($config);
		if (is_array($message) && !empty($message)) {
			self::set_multi_message($mesage);
		}
		
		if ($this->CI->form_validation->run() === true) {
			return true;
		} else {
			$this->CI->assign('error', $this->CI->form_validation->error_array());
			return false;
		}
	}
	
	/**
	 * カスタムメッセージをセット
	 */
	private function set_multi_message($message = array() ){
		if(is_array($message)){
			foreach ($message as $label => $text) {
				$this->CI->form_validation->set_message($label, $text);
			}
		}
		return;
	}
	
	
	
}
