<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->library('form_validation');
		$this->load->library('controller/lib_config');
		$this->load->library('support/lib_user');
		$this->load->library('support/lib_security');
		$this->load->helper(array('form', 'url'));
		if ($this->login_info['type'] == 'user') {
			$this->load->model('t_user');
			$this->user_table = $this->t_user;
		} else {
			$this->load->model('t_corp');
			$this->user_table = $this->t_corp;
		}
			
	}

	/**
	 * Index
	 */
	public function index()
	{
		$this->assign('sidebarActive', 'config');
		$mode = "no_code";
		$data = array();
		
		
		$condition = array('mail' => $this->login_info['email']);
		
		$data = $this->user_table->checkDuplicate($condition, true);
		
		$setting = array(
			'login'         => !empty($data[0]['setting_login']) ? 1 : 0,
			'transfer_coin' => !empty($data[0]['setting_transfer_coin']) ? 1 : 0
		);
		
		if ($setting['login'] != "0" || $setting['transfer_coin'] != "0") {
			$mode = "tow_factor_setting";
		}
		
		if ($this->input->post()) {
			$post = $this->input->post();
			
			// 二段階認証作成
			if (isset($post['setQRCode'])) {
				$mode = "create_code";
				$twoFactor = $this->lib_config->twoFactorCreate();
				
				$token = $this->encryption->encrypt($twoFactor['seacret']);
				
				$this->assign('token', $token );
				$this->assign('google_QR_Code', $twoFactor['qr']);
				
			}
			
			// 二段階認証設定 新コード保存
			if (isset($post['saveQRCode'])) {
				$dataUpdate = array(
					'setting_login'         => !empty($post['setting_login']) ? 1 : 0,
					'setting_transfer_coin' => !empty($post['setting_transfer_coin']) ? 1 : 0,
					'google_auth_code'      => $post['token']
				);
				
				$result = $this->lib_config->twoFactorSave($dataUpdate, $post['token'], $post['google_code'] );
				
				if ($result) {
					$mode = "tow_factor_setting";
					$data = $this->user_table->checkDuplicate($condition, true);
					$setting['login']         = $data[0]['setting_login'];
					$setting['transfer_coin'] = $data[0]['setting_transfer_coin'];
				} else {
					$mode = "create_code";
					$secret_key = $this->encryption->decrypt($post['token']);
					$this->assign('token', $post['token'] );
					$this->assign('google_QR_Code', $this->lib_config->qrCodeCreate($secret_key));
				}
				
			}
			
			
			// 二段階認証設定 アップデート
			if (isset($post['updateQRCode'])) {
				
				$dataUpdate = array(
					'setting_login'         => !empty($post['setting_login']) ? 1 : 0,
					'setting_transfer_coin' => !empty($post['setting_transfer_coin']) ? 1 : 0
				);
				
				$result = $this->lib_config->twoFactorUpdate($dataUpdate, $post['google_code'] );
				
				if ($result) {
					$data = $this->user_table->checkDuplicate($condition, true);
					$setting['login']         = $data[0]['setting_login'];
					$setting['transfer_coin'] = $data[0]['setting_transfer_coin'];
					if ($data[0]['setting_login'] == "0" && $data[0]['setting_transfer_coin'] == "0") {
						$mode = "no_code";
					}
				}
				
			}
			
			// パスワードアップデート
			if ($this->input->post('btnPasswordUpdate')) {
				$result = $this->lib_config->updatePassword($this->input->post('new_password'));
			}
			
		}
		
		// 登録情報
		$defaultData = $this->lib_user->defaultHtmlView('user');
		$this->assign('data', $defaultData);
		
		$userData = $this->lib_config->userDataInfo();
		$this->assign('user_type', $this->login_info['user_type']);
		$this->assign('params', $userData);
		
		$this->assign('mode', $mode);
		
		$flashdata = $this->session->flashdata();
		$this->assign('flashdata', $flashdata);
		$this->assign('setting_login', $setting['login']);
		$this->assign('setting_transfer_coin', $setting['transfer_coin']);
		
		$this->tpl('mypage/config.tpl');
	}
}