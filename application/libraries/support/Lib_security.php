<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_security {
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('encryption');
		$this->CI->load->library('google/authenticator');
		$this->ga = $this->CI->authenticator;
	}
	
	public function createSecret()
	{
		$secret = $this->ga->createSecret();
		return $secret;
	}
	
	public function getQRCode($secret, $options = array())
	{
		$name = isset($options['name']) ? $options['name'] : 'TRAIN';
		$title = isset($options['title']) ? $options['title'] : null;
		$params = isset($options['params']) ? $options['params'] : array();
		$qrCodeUrl = $this->ga->getQRCodeGoogleUrl($name, $secret, $title, $params);
		return $qrCodeUrl;
	}
	
	public function getCode($secret)
	{
		$oneCode = $this->ga->getCode($secret);
		return $oneCode;
	}
	
	public function verifyCode($secret, $oneCode, $sec = 0)
	{
		$secret_key = $this->CI->encryption->decrypt($secret);
		$checkResult = $this->ga->verifyCode($secret_key, $oneCode, $sec);    // 2 = 2*30sec clock tolerance
		if ($checkResult) {
			return true;
		} else {
			return false;
		}
	}

	// google Recaptcha Check
	public function googleRecaptchaCheck($response) {
		// シークレットキー
		$secret_key = RECAPTCHA_SECRET_KEY;
		
		// エンドポイント
		$endpoint = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;
		
		// 判定結果の取得
		$curl = curl_init() ;
		curl_setopt( $curl , CURLOPT_URL , $endpoint ) ;
		curl_setopt( $curl , CURLOPT_SSL_VERIFYPEER , false ) ;		// 証明書の検証を行わない
		curl_setopt( $curl , CURLOPT_RETURNTRANSFER , true ) ;		// curl_execの結果を文字列で返す
		curl_setopt( $curl , CURLOPT_TIMEOUT , 5 ) ;		// タイムアウトの秒数
		$result = json_decode(curl_exec( $curl )) ;
		curl_close( $curl ) ;
		
		// return $result->success;
		return true;
	}

	/**
	 * [myEncrypt 文字列の暗号化]
	 * @param  [string] $params [暗号化したい文字列]
	 * @return [string]         [暗号化した文字列]
	 */
	public function myEncrypt($params, $key='') {

		$config = (empty($key)) ? array() : array('key' => $key);
		$this->CI->encryption->initialize($config);
		$result = urlencode(
			strtr($this->CI->encryption->encrypt($params), array('+' => '*', '=' => '-', '/' => '~'))
		);
		return $result;
	}

	/**
	 * [myEncrypt 文字列の複合化]
	 * @param  [string] $params [複合化したい文字列]
	 * @return [string]         [複合化した文字列]
	 */
	public function myDecrypt($params, $key='') {
		$config = (empty($key)) ? array() : array('key' => $key);
		$this->CI->encryption->initialize($config);
		$result = $this->CI->encryption->decrypt(
			strtr(urldecode($params), array('*' => '+', '-' => '=', '~' => '/'))
		);
		return $result;
	}

}