<?php
class MY_Controller extends CI_Controller {

	const HP_NAME        = 'CryptoPie';
	const META_ROBOTS    = 'noindex,nofollow';
	const MAIL_FROM      = 'info@cryptopie.com';
	const MAIL_FROM_NAME = 'CryptoPie';
	const MAINTENANCE    = false; // 強制メンテナンスモード

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Tokyo');

		// セッション対策
		$this->output->set_header('Expires:');
		$this->output->set_header('Cache-Control:');
		$this->output->set_header('Pragma:');

		// キャッシュを無効化
		$this->smarty->force_compile = true;
		$this->smarty->setCompileCheck(true);
		

		// development の場合 プロファイラを有効に
		if (ENVIRONMENT === 'development'
			|| ENVIRONMENT === 'development_local') {
			// $this->output->enable_profiler();
		}

		// ipアドレス取得
		$this->input->ip_address();
		// 強制メンテナンスモード
		if (self::MAINTENANCE
			&& str_replace('_', '-', $this->router->class) != 'maintenance') {
			redirect(base_url().'maintenance/');
		}

		// すべての BC 演算関数におけるデフォルトのスケールを設定する
		bcscale(8);


		// 残高情報
		$this->load->library('controller/lib_mypage');
		$data = $this->lib_mypage->commonData();
		$this->assign('balance', $data['balance']);

		// user agant情報
		$this->load->library('support/lib_settings');
		$this->lib_settings->set_url();

		// user agant情報
		$this->load->library('support/lib_user_agent');
		$this->lib_user_agent->assign_agent();

		// meta
		$this->assign('title' ,  self::HP_NAME);
		$this->assign('robots' , self::META_ROBOTS);
	}




	/**
	 * テンプレートにassign
	 *
	 */
	public function assign($name, $value) {
		$this->smarty->assign($name, $value);
	}

	/**
	 * テンプレート呼び出し
	 *
	 */
	public function tpl($templete) {
		$this->smarty->display($templete);
	}


	/**
	 * ログインチェック
	 * 会員登録=new,身分証確認=id_check,郵送=post,使用可否=usable
	 */
	public function is_login($grade_name='')
	{
		// ログインチェック
		if (!$this->session->userdata("user_type")) {
			// ログイン情報なし
			redirect(base_url().'login/');
		} else {
			// ログイン情報あり
			$this->login_info = $this->session->userdata();
			$this->assign('login_info', $this->login_info);
			// timeout
			if (isset($this->login_info['timestamp'])) {
				$time_limit = 60 * 60 * 2; // 2時間
				$logout_time = $this->login_info['timestamp'] + $time_limit;
				if ($logout_time < time()) {
					$this->session->sess_destroy();
					redirect(base_url().'login/');
				}
			}
			// 内部ticker更新ではセットしない
			if (!($this->controller == 'index' && $this->action == 'ticker')) {
				// timeout時間を延長
				$this->session->set_userdata('timestamp', time());
			}
			// ステータスチェック
			if (!empty($grade_name)
				&& !(1 == $this->login_info['status'][$grade_name])) {
				// ステータスが満たない場合はTOPにリダイレクト
				redirect(base_url().'mypage/');
			}
		}
	}

}