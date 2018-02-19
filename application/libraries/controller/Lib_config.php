<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_config {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(array('form', 'url'));
		$this->CI->load->library('encryption');
		$this->CI->load->library('form_validation');
		$this->CI->load->library('basic/common');
		$this->CI->load->library('model/lib_t_error_log');
		$this->CI->load->library('model/lib_t_config');
		$this->CI->load->library('support/lib_security');
		$this->CI->load->model('t_email_temp');
		$this->CI->load->model('log_login');
		if ($this->CI->login_info['type'] == 'user') {
			$this->CI->load->model('t_user');
			$this->user_table = $this->CI->t_user;
		} else {
			$this->CI->load->model('t_corp');
			$this->user_table = $this->CI->t_corp;
		}
	}
	
	// 二段階認証 コード作成
	public function twoFactorCreate() {
		$condition = array('mail' => $this->CI->login_info['email']);
		$data = $this->user_table->checkDuplicate($condition, true);
		
		// seacret code作成
		$secret_key = $this->CI->lib_security->createSecret();
		
		$this->result = array(
			'seacret' => $secret_key,
			'qr' => self::qrCodeCreate($secret_key)
		);
		return $this->result;
	}
	
	// 二段階認証 設定保存
	public function twoFactorSave($dataUpdate, $secret_key, $google_code) {
		$condition = array('mail' => $this->CI->login_info['email']);
		$data = $this->user_table->checkDuplicate($condition, true);
		
		$validSetting = true;
		if ($dataUpdate['setting_login'] == "0" && $dataUpdate['setting_transfer_coin'] == "0") {
			$validSetting = false;
		}
		
		// 二段階認証チェック
		$verifyCode = $this->CI->lib_security->verifyCode($secret_key, $google_code);
		
		
		// データ更新
		if (!$verifyCode || !$validSetting) {
			if (!$verifyCode) {
				$this->CI->session->set_flashdata(array('error_code' => '認証コードが間違っています'));
			}
			if (!$validSetting) {
				$this->CI->session->set_flashdata(array('error_save_setting' => '認証を設定するには使用設定を選択してください'));
			}
			$this->result = false;
		} else {
			$this->result = $this->CI->lib_user_function->userTrycatch(
				function($tryArg){ // try
					
					// 設定を保存
					$this->user_table->update($tryArg[0], $tryArg[1]);
					
					$success = array('success' => '二段階認証の設定を保存しました');
					$this->CI->session->set_flashdata($success);
					redirect(base_url() . 'mypage/config/');
					
					$this->result = true;
					
				},
				function($tryCatch){ // catch
					
				},
				array(
					'try'   => array( $dataUpdate, $condition),
					'catch' => null
				)
			);
		}
		
		return $this->result;
	}
	
	// 二段階認証 設定アップデート
	public function twoFactorUpdate($dataUpdate, $google_code) {
		$condition = array('mail' => $this->CI->login_info['email']);
		$data = $this->user_table->checkDuplicate($condition, true);
		
		
		// 二段階認証チェック
		$verifyCode = $this->CI->lib_security->verifyCode($data[0]['google_auth_code'], $google_code);
		
		
		// データ更新
		if (!$verifyCode) {
			$error = array('error_code' => '認証コードが間違っています');
			$this->CI->session->set_flashdata($error);
			redirect(base_url() . 'mypage/config/');
			$this->result = false;
		} else {
			$this->result = $this->CI->lib_user_function->userTrycatch(
				function($tryArg){ // try
					
					// 削除判定
					if ($tryArg[0]['setting_login'] == "0" && $tryArg[0]['setting_transfer_coin'] == "0") {
						$tryArg[0]['google_auth_code'] = null;
						$success = array('success' => '二段階認証を解除しました');
					} else {
						$success = array('success' => '二段階認証の設定を更新しました');
					}
					
					// 設定を保存
					$this->user_table->update($tryArg[0], $tryArg[1]);
					
					$this->CI->session->set_flashdata($success);
					
					redirect(base_url() . 'mypage/config/');
					$this->result = true;
					
				},
				function($tryCatch){ // catch
					
				},
				array(
					'try'   => array( $dataUpdate, $condition),
					'catch' => null
				)
			);
		}
		
		return $this->result;
	}
	
	// 個人情報取得
	public function userDataInfo() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$result = $this->user_table->getDataById($this->CI->login_info['user_id']);
				$this->userData = $result;
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => array(),
				'catch' => null
			)
		);
		return $this->userData;
	}
	
	
	// パスワード変更
	public function updatePassword($new_password="") {
		
		$this->CI->form_validation->set_rules(array(
				array(
					'field' => 'password',
					'label' => '現在のパスワード',
					'rules' => array(
						'required',
						'check_password'
					),
					'errors' => array(
						'required' => '%s は必須です。',
						'check_password' => '%s が違います',
					),
				)
		));
		
		$this->CI->form_validation->set_error_delimiters('<p class="error_text">', '</p>');
		
		$params = array(
			'password' => $this->CI->common->encrypt($new_password)
		);
		
		$where = array('id' => $this->CI->login_info['user_id']);
		
		if ($this->CI->form_validation->run()) {
			$this->CI->lib_user_function->userTrycatch(
				function($tryArg){ // try
					$result = $this->user_table->update($tryArg[0], $tryArg[1]);
					$success = array('success_password' => 'パスワードの変更が完了しました');
					$this->CI->session->set_flashdata($success);
					$this->result_password = $result;
				},
				function($tryCatch){ // catch
					
				},
				array(
					'try'   => array( $params, $where ),
					'catch' => null
				)
			);
		} else {
			$this->result_password = false;
		}
		
		return $this->result_password;
		
	}
	
	
/*
| -------------------------------------------------------------------------
| private method
| ------------------------------------------------------------------------- */
	
	// QRコード作成
	public function qrCodeCreate($secret_key) {
		$options = array(
			'title' => 'CryptoPie',
			'name' => $this->CI->login_info['email'],
		);
		return $this->CI->lib_security->getQRCode($secret_key, $options);
	}
	
	// 二段階認証バリデーション
	public function validate_factor_code($code="", $google_code="") {
		
		return $this->CI->lib_security->verifyCode($this->CI->encryption->decrypt($code), $google_code);
		
	}
	
	
	
	
	
}
