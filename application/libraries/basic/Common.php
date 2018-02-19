<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common {

	function __construct()
	{
		$this->CI =& get_instance();
	}

	public function randomString($length = 8) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    $randomString = '';

	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }

	    return $randomString;
	}

	public function randomNumber($length = 8) {
	    $characters = '0123456789';
	    $randomString = '';

	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }

	    return $randomString;
	}

	/**
	 * [encrypt encryption password]
	 */
	public function encrypt($password) {
		$salt_key = $this->CI->config->item('encryption_key');
		$password = $password . $salt_key; //パスワードをソルトキーをミックスする
		$enc_password = sha1($password);
		return $enc_password;
	}

	/**
	 * [encrypt encryption restrict password]
	 */
	public function encryptLimit($password, $limit = 8) {
		$passHash = $this->encrypt($password);
		$result = substr($passHash, 0, $limit);
		return $result;
	}

	/**
	 * [isValidScreen check is valid screen]
	 * @param  [type]  $screen [user | corp]
	 */
	public function isValidScreen($screen) {
		$screenAllow = array(
			'user',
			'corp'
		);
		// Redirect page when screen invalid
		if (!in_array($screen, $screenAllow)) {
			redirect(base_url());
		}
	}

	/**
	 * Generate token
	 */
	public function generateToken($email) {
		$generateString = $this->randomString();
		$stringCrypt = $email . $generateString;
		$token = $this->encrypt($stringCrypt);
		return $token;
	}

	/**
	 * Compare hash
	 */
	public function isValidHash($email, $hash) {
		$hash_origin = $this->encrypt($email);
		if ($hash_origin == $hash) {
			return true;
		}
		return false;
	}

	/**
	 * Check is valid token expired expired
	 */
	public function isValidIn24h($tokenExpired) {
		$currentTime = time();
		$tokenTime = strtotime($tokenExpired);
		if ($currentTime <= $tokenTime) {
			return true;
		}
		return false;
	}

	/**
	 * Check is valid token
	 * $table: t_user | t_corp | t_email_temp
	 */
	public function isValidToken($table = null, $token = null) {
		$tableName = 't_' . $table;
		if (in_array($tableName, array('t_user', 't_corp', 't_email_temp')) && !empty($token)) {
			$data = array('token' => $token);
			$dataToken = array();
			if ($tableName == 't_user') {
				$this->CI->load->model('t_user');
				$dataToken = $this->CI->t_user->checkDuplicate($data, true);
			} else if ($tableName == 't_corp') {
				$this->CI->load->model('t_corp');
				$dataToken = $this->CI->t_corp->checkDuplicate($data, true);
			} else if ($tableName == 't_email_temp') {
				$this->CI->load->model('t_email_temp');
				$dataToken = $this->CI->t_email_temp->checkDuplicate($data, true);
			}
			if (empty($dataToken)) {
				return false;
			}
			if (!$this->isValidIn24h($dataToken[0]['token_expired'])) {
				return false;
			}
			return true;
		}
		return false;
	}

	/**
	 * Check is user or corp by email
	 */
	public function checkIsUserOrCorp($email) {
		$this->CI->load->model('t_user');
		$this->CI->load->model('t_corp');
		$data = array('mail' => $email);
		$isUser = $this->CI->t_user->checkDuplicate($data, true);
		$isCorp = $this->CI->t_corp->checkDuplicate($data, true);
		$result = array();
		if (!empty($isUser)) {
			$result = !empty($isUser[0]) ? $isUser[0] : array();
			$result['screen'] = 'user';
		} else if (!empty($isCorp)) {
			$result = !empty($isCorp[0]) ? $isCorp[0] : array();
			$result['screen'] = 'corp';
		}
		return $result;
	}

	/**
	 * Format string use for date or datetime
	 */
	public function stringFormatDate() {
		return 'Y-m-d H:i:s';
	}

	/**
	 * Current time
	 */
	public function currentTime() {
		return date($this->stringFormatDate());
	}

	/**
	 * Add one or more day
	 */
	public function addMoreDay($day) {
		$label = 'day';
		if ($day > 1) {
			$label .= 's';
		}
		return date($this->stringFormatDate(), strtotime($this->currentTime() . " + " . $day . " " . $label));
	}

	/**
	 * Add 2 day
	 */
	public function add2Day() {
		return $this->addMoreDay(2);
	}

	/**
	 * Add more minutes
	 * Default add 30 minutes
	 */
	public function addMoreMinutes($minutes = 30) {
		$label = 'minute';
		if ($minutes > 1) {
			$label .= 's';
		}
		return date($this->stringFormatDate(), strtotime($this->currentTime() . " + " . $minutes . " " . $label));
	}

	public function d($data) {
		echo '<pre>';
			print_r($data);
		echo '</pre>';
	}

	public function dd($data) {
		echo '<pre>';
			print_r($data);
		echo '</pre>';
		die;
	}
}