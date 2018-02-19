<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_registered extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('basic/date');
		$this->load->library('basic/mail');
		$this->load->library('basic/financial');
		$this->load->library('basic/prevention_law');
		$this->load->library('basic/common');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('t_user');
		$this->load->model('t_corp');
		$this->load->model('log_login');
		$this->load->model('t_email_temp');
		$this->load->library('model/lib_t_user_status');
		$this->load->library('session');

		// 追加コード
		$this->load->library('model/lib_t_balance');

		// Redirect to my page if exists session info of log login
		// $this->log_login->redirectToMyPage();
	}

	public function index()
	{
		// インデックスにアクセスされたら個人登録ページへリダイレクト
		redirect(base_url() . "{$this->controller}/kojin/");
	}

	/**
	 * 事前登録 (個人)
	 */

	/* 入力 or 再入力 */
	public function kojin()
	{
		// 簡易的に登録開始セッション登録
		$this->session->set_userdata('input_start', true);
		// 必要情報をassign
		self::_assign_data();
		// 入力情報
		$this->assign('params', $this->input->post());
		$this->assign('media_id', $this->session->userdata('media_id'));

		$this->tpl('pre_application.tpl');
	}

	/* 確認 */
	public function kojin_conf()
	{
		// 登録開始セッションが無ければTOPへリダイレクト
		self::_redirect();

		// 必要情報をassign
		self::_assign_data();
		// 入力情報
		$this->assign('params', $this->input->post());

		$this->tpl('pre_application_conf.tpl');
	}

	/* パスワード設定 */
	public function kojin_password()
	{
		// 登録開始セッションが無ければTOPへリダイレクト
		self::_redirect();

		$this->assign('params', $this->input->post());
		$this->tpl('pre_application_password.tpl');
	}

	/* 登録実行 */
	public function kojin_regist()
	{
		// 登録開始セッションが無ければTOPへリダイレクト
		self::_redirect();

		$params = $this->input->post();
		$referrer = $this->agent->referrer();
		if (true) {
			/* 登録実行 */
			// 不要な値を削除
			unset($params['password_again']);
			unset($params['term']);
			// 登録処理
			$this->load->model('t_user');
			$result = $this->t_user->insert($params);


			// メール送信処理(御客様用)
			self::_mail_to_customer($params, 'kojin');
			// メール送信処理(クライアント用)
			self::_mail_to_client($params, 'kojin');

			if ($result) {
				/* 登録完了 */
				redirect(base_url() . "{$this->controller}/kojin-complete/");
			} else {
				/* エラーの場合の処理 */
			}
			
		}
	}

	/* 登録完了 */
	public function kojin_complete()
	{
		if (!$this->session->has_userdata('input_start')) {
			// セッションのメディア情報が無ければTOPへリダイレクト
			redirect(base_url());
		}
		// セッションのメディア情報を削除
		$this->session->unset_userdata('input_start');
		$this->tpl('pre_application_complete.tpl');
	}

	/* 重複チェック */
	public function is_duplicate()
	{
		self::_is_duplicate_exec('t_user');
	}




	/**
	 * 事前登録 (法人)
	 */
	/* 入力 or 再入力 */
	public function hojin()
	{
		// 簡易的に登録開始セッション登録
		$this->session->set_userdata('input_start', true);
		// 必要情報をassign
		self::_assign_data();
		// 入力情報
		$this->assign('params', $this->input->post());
		$this->assign('media_id', $this->session->userdata('media_id'));

		$this->tpl('pre_application_corp.tpl');
	}

	/* 確認 */
	public function hojin_conf()
	{
		// 登録開始セッションが無ければTOPへリダイレクト
		self::_redirect();

		// 必要情報をassign
		self::_assign_data();
		// 入力情報
		$this->assign('params', $this->input->post());

		$this->tpl('pre_application_conf_corp.tpl');
	}

	/* パスワード設定 */
	public function hojin_password()
	{
		$this->assign('params', $this->input->post());
		$this->tpl('pre_application_password_corp.tpl');
	}

	/* 登録実行 */
	public function hojin_regist()
	{
		// 登録開始セッションが無ければTOPへリダイレクト
		self::_redirect();

		$params = $this->input->post();
		$referrer = $this->agent->referrer();
		if (true) {
			/* 登録実行 */

			// 不要な値を削除
			unset($params['password_again']);
			unset($params['term']);
			// 登録処理
			$this->load->model('t_corp');
			$result = $this->t_corp->insert($params);

			// メール送信処理(御客様用)
			self::_mail_to_customer($params, 'hojin');
			// メール送信処理(クライアント用)
			self::_mail_to_client($params, 'hojin');

			if ($result=true) {
				/* 登録完了 */
				redirect(base_url() . "{$this->controller}/hojin-complete/");
			} else {
				/* エラーの場合の処理 */
			}
			
		}
	}

	/* 登録完了 */
	public function hojin_complete()
	{
		// 登録開始セッションが無ければTOPへリダイレクト
		self::_redirect();
		// セッションのメディア情報を削除
		$this->session->unset_userdata('input_start');
		$this->tpl('pre_application_complete_corp.tpl');
	}

	/* 重複チェック */
	public function is_duplicate_corp()
	{
		self::_is_duplicate_exec('t_corp');
	}

	/**
	 * 自作関数
	 */

	/* 共通で使用する情報をassign */
	private function _assign_data(){
		// DBから情報を取得
		$this->load->model('m_pref');
		$this->assign('pref_list', $this->m_pref->getAll());

		// libraryから情報を取得
		$this->assign('year', $this->date->yearList(0, 120));
		$this->assign('month', $this->date->monthList());
		$this->assign('date', $this->date->dateList());
	}

	/* 共通で使用する情報をassign */
	private function _is_duplicate_exec($table){
		// TODO nullチェック
		$params = $this->input->post();
		$where  = "(tel1 = '" .$params['tel1']. "' AND tel2 = '" .$params['tel2'] . "' AND tel3 = '" .$params['tel3'] . "') OR mail = '" .$params['mail'] . "'";
		// 重複チェック処理
		$this->load->model($table);
		$result = array('duplicate' => $this->$table->checkDuplicate($where));
		// $dataをJSONにして返す
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	/* 御客様用メール送信 */
	private function _mail_to_customer($params, $type){
		$data = array();
		if ($type == 'kojin') {
			$data['name'] = $params['family_name']. ' ' .$params['first_name'];
		} else if($type == 'hojin'){
			$data['name'] = $params['corp_name'].PHP_EOL.$params['ceo_name']. ' ' .$params['ceo_first_name'];
		}
		
		$data['from']      = 'info@cryptopie.com';
		$data['from_name'] = 'CryptoPie';
		$data['to']        = $params['mail'];
		$data['password']  = $params['password'];
		$data['subject']   = 'Cryptopie事前登録完了致しました';
		// テンプレートに変数をアサイン
		$this->load->library('parser');
		$message = $this->parser->parse('mail.tpl', $data, TRUE);
		$result_mail = $this->mail->send($data, $message);
	}

	/* クライアント用メール送信 */
	private function _mail_to_client($params, $type){
		$data = array();
		if ($type == 'kojin') {
			$data['name'] = $params['family_name']. ' ' .$params['first_name'];
		} else if($type == 'hojin'){
			$data['name'] = $params['corp_name'].PHP_EOL.$params['ceo_name']. ' ' .$params['ceo_first_name'];
		}
		
		$data['from']      = 'info@cryptopie.com';
		$data['from_name'] = 'CryptoPie';
		$data['to']        = 'info@cryptopie.com';
		$data['password']  = $params['password'];
		$data['subject']   = 'Cryptopie事前登録完了致しました';
		// テンプレートに変数をアサイン
		$this->load->library('parser');
		$message = $this->parser->parse('mail.tpl', $data, TRUE);
		$result_mail = $this->mail->send($data, $message);
	}

	/* トップへリダイレクト */
	private function _redirect(){
		if (!$this->session->has_userdata('input_start')) {
			// セッションのメディア情報が無ければTOPへリダイレクト
			redirect(base_url());
		}
	}

	public function yearMonthDay() {
		$result = array();
		// libraryから情報を取得
		$result['year'] = $this->date->yearList(0, 120);
		$result['month'] = $this->date->monthList();
		$result['day'] = $this->date->dateList();

		return $result;
	}

	/**
	 * 事前登録（個人）管理テーブル
	 * [defaultDataUser default value of user]
	 */
	private static function defaultDataUser() {
		return array(
			// 苗字
			'family_name' => '',
			// 苗字（フリガナ）
			'family_name_kana' => '',
			// 名前
			'first_name' => '',
			// 名前（フリガナ）
			'first_name_kana' => '',
			// 生年月日　年
			'year' => '',
			// 生年月日　月
			'month' => '',
			// 生年月日　日
			'day' => '',
			// 電話番号
			'tel1' => '',
			// 電話番号
			'tel2' => '',
			// 電話番号
			'tel3' => '',
			// メールアドレス
			'mail' => '',
			// 郵便番号
			'post1' => '',
			// 郵便番号
			'post2' => '',
			// Prefecture: m_pref FK
			'pref_id' => '',
			// 市区町村
			'city' => '',
			// 住所（番地）
			'address' => '',
			// 建物
			'building' => '',
			// Overseas flag
			'overseas_address_flag' => 0,
			// Address Line1
			'overseas_adr1' => '',
			// Address Line2
			'overseas_adr2' => '',
			// City
			'overseas_city' => '',
			// State/Region
			'overseas_state' => '',
			// Zipcode
			'overseas_zip' => '',
			// Country
			'overseas_country_id' => '',
			// Password
			'password' => '',
			// 自宅形態
			'home_type' => '',
			// 居住年数
			'stay_year' => '',
			// 雇用体系
			'job' => '',
			// 勤務先名
			'job_name' => '',
			// 勤務先の郵便番号3桁
			'job_post1' => '',
			// 勤務先の郵便番号7桁
			'job_post2' => '',
			// 勤務先の住所
			'job_address' => '',
			// 勤務先電話番号
			'job_tel1' => '',
			// 勤務先電話番号
			'job_tel2' => '',
			// 勤務先電話番号
			'job_tel3' => '',
			// 勤続年数
			'job_year' => '',
			// ご年収(昨年度)
			'guarantee' => '',
			// 既存のお借り入れ
			'debt1' => '',
			// お支払い延滞の有無
			'debt2' => '',
			// 家族構成 (独身or既婚)
			'famiry' => '',
			// 投資可能資産を ご選択ください。
			'investment_asset' => '',
			// 投資可能資産はご自身の資産でお間違えありませんか？ はい=1,いいえ=2
			'investment_asset_flag' => '',
			// 主な収入源をご選択ください。
			'income' => '',
			// 取引目的をご選択ください。
			// 取引目的1
			'purpose1' => 0,
			// 取引目的2
			'purpose2' => 0,
			// 取引目的3
			'purpose3' => 0,
			// 取引目的4
			'purpose4' => 0,
			// 申込の経緯をご選択ください。
			'subscription' => '',
			// その他をご選択された方は具体的な申込経緯をご記入ください。
			'subscription_text' => '',
			// FX・CFD取引のご経験をご選択ください。
			'fx_trade' => '',
			// 現物株式取引のご経験をご選択ください。
			'cash_trade' => '',
			// 信用株式取引のご経験をご選択ください。
			'credit_trade' => '',
			// 先物オプション取引のご経験をご選択ください。
			'option_trade' => '',
			// 商品先物取引のご経験をご選択ください。
			'item_trade' => '',
			// 収益移転防止法に関する項目1
			'agree_1' => '',
			// 収益移転防止法に関する項目2
			'agree_2' => '',
			// 収益移転防止法に関する項目3
			'agree_3' => '',
			// 会員登録登録完了=1,身分証確認完了=2,郵送物確認完了=3
			'status' => 1,
			// 事前登録者=1
			'advance_flag' => 0
		);
	}

	/**
	 * 法人管理テーブル
	 * [defaultDataCorp default value of corp]
	 */
	private static function defaultDataCorp() {
		return array(
			// 法人名（漢字）
			'corp_name' => '',
			// 法人名（フリガナ）
			'corp_name_kana' => '',
			// 代表者名（漢字）
			'ceo_name' => '',
			// 代表者名（フリガナ）
			'ceo_name_kana' => '',
			// 代表者名名前
			'ceo_first_name' => '',
			// 代表者名名前（フリガナ）
			'ceo_first_name_kana' => '',
			// メールアドレス
			'mail' => '',
			// 郵便番号
			'post1' => 0,
			// 郵便番号
			'post2' => 0,
			// m_pref FK
			'pref_id' => 0,
			// 市区町村
			'city' => '',
			// 住所（番地）
			'address' => '',
			// 建物
			'building' => '',
			// 海外居住者=1
			'overseas_address_flag' => '',
			// AddressLine1
			'overseas_adr1' => '',
			// AddressLine2
			'overseas_adr2' => '',
			// City
			'overseas_city' => '',
			// State/Region
			'overseas_state' => '',
			// Zipcode
			'overseas_zip' => '',
			// m_country FK
			'overseas_country_id' => 0,
			// 電話番号
			'tel1' => '',
			// 電話番号
			'tel2' => '',
			// 電話番号
			'tel3' => '',
			// Password
			'password' => '',
			// 取引責任者苗字
			'pre_name' => '',
			// 取引責任者苗字（フリガナ）
			'pre_name_kana' => '',
			// 取引責任者名前
			'pre_first_name' => '',
			// 取引責任者名前（フリガナ）
			'pre_first_name_kana' => '',
			// 取引責任者郵便番号
			'pre_post1' => '',
			// 取引責任者郵便番号
			'pre_post2' => '',
			// 取引責任者m_pref FK
			'pre_pref_id' => 0,
			// 取引責任者市区町村
			'pre_city' => '',
			// 取引責任者住所（番地）
			'pre_address' => '',
			// 取引責任者建物
			'pre_building' => '',
			// 取引責任者電話番号
			'pre_tel1' => '',
			// 取引責任者電話番号
			'pre_tel2' => '',
			// 取引責任者電話番号
			'pre_tel3' => '',
			// 前期売上高
			'amount_sales' => '',
			// 前期純利益
			'net_income' => '',
			// 純資産
			'net_worth' => '',
			// 設立年月日　年
			'year' => '',
			// 設立年月日　月
			'month' => '',
			// 設立年月日　日
			'day' => '',
			// 主な事業内容
			'business' => '',
			// 取引目的 仮想通貨を購入して、国内外への送金、決済のため
			'purpose1' => 0,
			// 取引目的 仮想通貨の価格変動による売買益のため
			'purpose2' => 0,
			// 取引目的 中・長期投資のため
			'purpose3' => 0,
			// 取引目的 分散投資を行うため
			'purpose4' => 0,
			// 申込の経緯をご選択ください。
			'subscription' => '',
			// 申込の経緯をご選択ください。
			'subscription_text' => '',
			// 収益移転防止法に関する項目1
			'agree_1' => '',
			// 収益移転防止法に関する項目2
			'agree_2' => '',
			
			// // 実質的な支配者1苗字
			// 'ruler1_name' => '',
			// // 実質的な支配者1苗字（フリガナ）
			// 'ruler1_name_kana' => '',
			// // 実質的な支配者1名前
			// 'ruler1_first_name' => '',
			// // 実質的な支配者1名前（フリガナ）
			// 'ruler1_first_name_kana' => '',
			// // 実質的な支配者1郵便番号
			// 'ruler1_post1' => '',
			// // 実質的な支配者1郵便番号
			// 'ruler1_post2' => '',
			// // 実質的な支配者1住所
			// 'ruler1_address' => '',
			// // 外国PEPｓに該当しますか？
			// 'peps_1' => '',
			// // 実質的な支配者2苗字
			// 'ruler2_name' => '',
			// // 実質的な支配者2苗字（フリガナ）
			// 'ruler2_name_kana' => '',
			// // 実質的な支配者2名前
			// 'ruler2_first_name' => '',
			// // 実質的な支配者2名前（フリガナ）
			// 'ruler2_first_name_kana' => '',
			// // 実質的な支配者2郵便番号
			// 'ruler2_post1' => '',
			// // 実質的な支配者2郵便番号
			// 'ruler2_post2' => '',
			// // 実質的な支配者2住所
			// 'ruler2_address' => '',
			// // 外国PEPｓに該当しますか？
			// 'peps_2' => '',
			// // 実質的な支配者3苗字
			// 'ruler3_name' => '',
			// // 実質的な支配者3苗字（フリガナ）
			// 'ruler3_name_kana' => '',
			// // 実質的な支配者3名前
			// 'ruler3_first_name' => '',
			// // 実質的な支配者3名前（フリガナ）
			// 'ruler3_first_name_kana' => '',
			// // 実質的な支配者3郵便番号
			// 'ruler3_post1' => '',
			// // 実質的な支配者3郵便番号
			// 'ruler3_post2' => '',
			// // 実質的な支配者3住所
			// 'ruler3_address' => '',
			// // 外国PEPｓに該当しますか？
			// 'peps_3' => '',
			// // 実質的な支配者4苗字
			// 'ruler4_name' => '',
			// // 実質的な支配者4苗字（フリガナ）
			// 'ruler4_name_kana' => '',
			// // 実質的な支配者4名前
			// 'ruler4_first_name' => '',
			// // 実質的な支配者4名前（フリガナ）
			// 'ruler4_first_name_kana' => '',
			// // 実質的な支配者4郵便番号
			// 'ruler4_post1' => '',
			// // 実質的な支配者4郵便番号
			// 'ruler4_post2' => '',
			// // 実質的な支配者4住所
			// 'ruler4_address' => '',
			// // 外国PEPｓに該当しますか？
			// 'peps_4' => '',
			// // 実質的な支配者5苗字
			// 'ruler5_name' => '',
			// // 実質的な支配者5苗字（フリガナ）
			// 'ruler5_name_kana' => '',
			// // 実質的な支配者5名前
			// 'ruler5_first_name' => '',
			// // 実質的な支配者5名前（フリガナ）
			// 'ruler5_first_name_kana' => '',
			// // 実質的な支配者5郵便番号
			// 'ruler5_post1' => '',
			// // 実質的な支配者5郵便番号
			// 'ruler5_post2' => '',
			// // 実質的な支配者5住所
			// 'ruler5_address' => '',
			// // 外国PEPｓに該当しますか？
			// 'peps_5' => '',

			// 会員登録登録完了=1,身分確認完了=2,郵送物確認完了=3
			'status' => 1,
			// 事前登録者=1
			'advance_flag' => 1,
		);
	}

	/**
	 * Default html use for user
	 */
	public function defaultHtmlUser() {
		/**
		 * Data use for view in html
		 */
		$data = array();

		// 都道府県マスタ
		$this->load->model('m_pref');
		$data['pref_list'] = $this->m_pref->selectAll();

		// 国別マスタ
		$this->load->model('m_country');
		$data['overseas_country_list'] = $this->m_country->selectAll();

		// libraryから情報を取得
		$data['year'] = $this->date->yearList(0, 120);
		$data['month'] = $this->date->monthList();
		$data['day'] = $this->date->dateList();

		// Financial
		$data['residentialForm'] = $this->financial->residentialForm();
		$data['residenceYears'] = $this->financial->residenceYears();
		$data['employmentSystem'] = $this->financial->employmentSystem();
		$data['serviceLength'] = $this->financial->serviceLength();
		$data['annualIncome'] = $this->financial->annualIncome();
		$data['borrowing'] = $this->financial->borrowing();
		$data['paymentOverdue'] = $this->financial->paymentOverdue();
		$data['familyStructure'] = $this->financial->familyStructure();
		$data['investableAssets'] = $this->financial->investableAssets();
		$data['investableAssetsRadio'] = $this->financial->investableAssetsRadio();
		$data['select01'] = $this->financial->select01();
		$data['checkbox'] = $this->financial->checkbox();
		$data['select02'] = $this->financial->select02();
		$data['select03'] = $this->financial->select03();
		$data['select04'] = $this->financial->select04();
		$data['select05'] = $this->financial->select05();
		$data['select06'] = $this->financial->select06();
		$data['select07'] = $this->financial->select07();

		// Prevention Law
		$data['radio'] = $this->prevention_law->radio();

		return $data;
	}

	/**
	 * Default html use for corp
	 */
	public function defaultHtmlCorp() {
		/**
		 * Data use for view in html
		 */
		$data = array();

		// 都道府県マスタ
		$this->load->model('m_pref');
		$data['pref_list'] = $this->m_pref->selectAll();

		// 国別マスタ
		$this->load->model('m_country');
		$data['overseas_country_list'] = $this->m_country->selectAll();

		// libraryから情報を取得
		$data['year'] = $this->date->yearList(0, 120);
		$data['month'] = $this->date->monthList();
		$data['day'] = $this->date->dateList();

		// Financial
		$data['amountSales'] = $this->financial->amountSales();
		$data['netIncome'] = $this->financial->netIncome();
		$data['netWorth'] = $this->financial->netWorth();
		$data['subscription'] = $this->financial->subscription();
		$data['checkbox'] = $this->financial->checkbox();
		$data['radio'] = $this->prevention_law->radio();

		return $data;
	}

	/**
	 * Default data view in html
	 * $screen: user | corp
	 */
	private static function defaultDataView($screen) {
		$data = array();
		if ($screen == 'user') {
			// 事前登録（個人）管理テーブル
			$data = self::defaultDataUser();
		} else if ($screen == 'corp') {
			// 法人管理テーブル
			$data = self::defaultDataCorp();
		}
		return $data;
	}

	/**
	 * Default html view
	 * $screen: user | corp
	 */
	public function defaultHtmlView($screen) {
		$data = array();
		if ($screen == 'user') {
			// 事前登録（個人）管理テーブル
			$data = $this->defaultHtmlUser();
		} else if ($screen == 'corp') {
			// 法人管理テーブル
			$data = $this->defaultHtmlCorp();
		}
		return $data;
	}

	/**
	 * Add data to session when post form
	 * $screen: user | corp
	 */
	public function addDataSession($screen = 'user') {
		// Default html view
		$data = $this->defaultHtmlView($screen);

		// Default data view
		$dataInsert = self::defaultDataView($screen);

		$data['dataInsert'] = $dataInsert;
		
		if ($this->input->post()) {
			if ($screen == 'user') {
				// 苗字
				$dataInsert['family_name'] = $this->input->post('name_sei');
				// 苗字（フリガナ）
				$dataInsert['family_name_kana'] = $this->input->post('name_sei_kana');
				// 名前
				$dataInsert['first_name'] = $this->input->post('name_mei');
				// 名前（フリガナ）
				$dataInsert['first_name_kana'] = $this->input->post('name_mei_kana');
				// 生年月日　年
				$dataInsert['year'] = $this->input->post('birthday_y');
				// 生年月日　月
				$dataInsert['month'] = $this->input->post('birthday_m');
				// 生年月日　日
				$dataInsert['day'] = $this->input->post('birthday_d');
				// 電話番号
				$dataInsert['tel1'] = $this->input->post('tel1');
				// 電話番号
				$dataInsert['tel2'] = $this->input->post('tel2');
				// 電話番号
				$dataInsert['tel3'] = $this->input->post('tel3');
				// メールアドレス
				$dataInsert['mail'] = $this->input->post('mail');
				// 郵便番号
				$dataInsert['post1'] = $this->input->post('zip1');
				// 郵便番号
				$dataInsert['post2'] = $this->input->post('zip2');
				// Prefecture: m_pref FK
				$dataInsert['pref_id'] = $this->input->post('adr1');
				// 市区町村
				$dataInsert['city'] = $this->input->post('adr2');
				// 住所（番地）
				$dataInsert['address'] = $this->input->post('adr3');
				// 建物
				$dataInsert['building'] = $this->input->post('adr4');
				
				// 海外居住者=1
				$overseas_address_flag = 0;
				if ($this->input->post('overseas_address_flag')) {
					$overseas_address_flag = $this->input->post('overseas_address_flag');
				}
				$dataInsert['overseas_address_flag'] = $overseas_address_flag;
				
				// AddressLine1
				$dataInsert['overseas_adr1'] = $this->input->post('overseas_adr1');
				// AddressLine2
				$dataInsert['overseas_adr2'] = $this->input->post('overseas_adr2');
				// City
				$dataInsert['overseas_city'] = $this->input->post('overseas_city');
				// State/Region
				$dataInsert['overseas_state'] = $this->input->post('overseas_state');
				// Zipcode
				$dataInsert['overseas_zip'] = $this->input->post('overseas_zip');
				// m_country FK
				$dataInsert['overseas_country_id'] = $this->input->post('overseas_country_id');
				
				// Password
				$password = '';
				if ($this->input->post('password')) {
					// Encryption password
					$password = $this->common->encrypt($this->input->post('password'));
				}
				$dataInsert['password'] = $password;
				
				// 自宅形態
				$dataInsert['home_type'] = $this->input->post('residentialForm');
				// 居住年数
				$dataInsert['stay_year'] = $this->input->post('residenceYears');
				// 雇用体系
				$dataInsert['job'] = $this->input->post('employmentSystem');
				
				// 雇用体系 職無しflag
				$job_flag = true;
				$arrayJobExclusion = array("10","11","12","13");
				if (in_array($dataInsert['job'], $arrayJobExclusion)) {
					// 勤務先名
					$dataInsert['job_name'] = "";
					// 勤務先の郵便番号3桁
					$dataInsert['job_post1'] = 0;
					// 勤務先の郵便番号7桁
					$dataInsert['job_post2'] = 0;
					// 勤務先の住所
					$dataInsert['job_address'] = "";
					// 勤務先電話番号
					$dataInsert['job_tel1'] = 0;
					// 勤務先電話番号
					$dataInsert['job_tel2'] = 0;
					// 勤務先電話番号
					$dataInsert['job_tel3'] = 0;
					// 勤続年数
					$dataInsert['job_year'] = 0;
					// ご年収(昨年度)
					$dataInsert['guarantee'] = 0;
					
					$job_flag = false;
				} else {
					// 勤務先名
					$dataInsert['job_name'] = $this->input->post('officeName');
					// 勤務先の郵便番号3桁
					$dataInsert['job_post1'] = $this->input->post('officeZip1');
					// 勤務先の郵便番号7桁
					$dataInsert['job_post2'] = $this->input->post('officeZip2');
					// 勤務先の住所
					$dataInsert['job_address'] = $this->input->post('officeAddress');
					// 勤務先電話番号
					$dataInsert['job_tel1'] = $this->input->post('officeTel1');
					// 勤務先電話番号
					$dataInsert['job_tel2'] = $this->input->post('officeTel2');
					// 勤務先電話番号
					$dataInsert['job_tel3'] = $this->input->post('officeTel3');
					// 勤続年数
					$dataInsert['job_year'] = $this->input->post('serviceLength');
					// ご年収(昨年度)
					$dataInsert['guarantee'] = $this->input->post('annualIncome');
				}
				$data['job_flag'] = $job_flag;
				
				// 既存のお借り入れ
				$dataInsert['debt1'] = $this->input->post('borrowing');
				// お支払い延滞の有無
				$dataInsert['debt2'] = $this->input->post('paymentOverdue');
				// 家族構成 (独身or既婚)
				$dataInsert['famiry'] = $this->input->post('familyStructure');
				// 投資可能資産を ご選択ください。
				$dataInsert['investment_asset'] = $this->input->post('investableAssets');
				// 投資可能資産はご自身の資産でお間違えありませんか？ はい=1,いいえ=2
				$dataInsert['investment_asset_flag'] = $this->input->post('investableAssets_radio');
				// 主な収入源をご選択ください。
				$dataInsert['income'] = $this->input->post('select_01');

				// Default value checkbox
				$purpose1 = 0;
				$purpose2 = 0;
				$purpose3 = 0;
				$purpose4 = 0;
				if ($this->input->post('purpose1') == 'on') {
					$purpose1 = 1;
				}
				if ($this->input->post('purpose2') == 'on') {
					$purpose2 = 1;
				}
				if ($this->input->post('purpose3') == 'on') {
					$purpose3 = 1;
				}
				if ($this->input->post('purpose4') == 'on') {
					$purpose4 = 1;
				}
				// 取引目的 仮想通貨を購入して、国内外への送金、決済のため
				$dataInsert['purpose1'] = $purpose1;
				// 取引目的 仮想通貨の価格変動による売買益のため
				$dataInsert['purpose2'] = $purpose2;
				// 取引目的 中・長期投資のため
				$dataInsert['purpose3'] = $purpose3;
				// 取引目的 分散投資を行うため
				$dataInsert['purpose4'] = $purpose4;

				// 申込の経緯をご選択ください。
				$dataInsert['subscription'] = $this->input->post('select_02');
				// その他をご選択された方は具体的な申込経緯をご記入ください。
				$dataInsert['subscription_text'] = $this->input->post('select_02_other');
				// FX・CFD取引のご経験をご選択ください。
				$dataInsert['fx_trade'] = $this->input->post('select_03');
				// 現物株式取引のご経験をご選択ください。
				$dataInsert['cash_trade'] = $this->input->post('select_04');
				// 信用株式取引のご経験をご選択ください。
				$dataInsert['credit_trade'] = $this->input->post('select_05');
				// 先物オプション取引のご経験をご選択ください。
				$dataInsert['option_trade'] = $this->input->post('select_06');
				// 商品先物取引のご経験をご選択ください。
				$dataInsert['item_trade'] = $this->input->post('select_07');
				// 収益移転防止法に関する項目1
				$dataInsert['agree_1'] = $this->input->post('agree_1');
				// 収益移転防止法に関する項目2
				$dataInsert['agree_2'] = $this->input->post('agree_2');
				// 収益移転防止法に関する項目3
				$dataInsert['agree_3'] = $this->input->post('agree_3');

				// Prefecture
				$data['prefectureValue'] = '';
				if (!empty($dataInsert['pref_id'])) {
					$data['prefectureValue'] = $data['pref_list'][$dataInsert['pref_id']];
				}

				// Overseas Country
				$data['overseasCountryValue'] = '';
				if (!empty($dataInsert['overseas_country_id'])) {
					$data['overseasCountryValue'] = $data['overseas_country_list'][$dataInsert['overseas_country_id']];
				}

				// residentialForm
				$data['residentialFormValue'] = $data['residentialForm'][$dataInsert['home_type']];

				// residenceYears
				$data['residenceYearsValue'] = $data['residenceYears'][$dataInsert['stay_year']];

				// employmentSystem
				$data['employmentSystemValue'] = $data['employmentSystem'][$dataInsert['job']];

				// serviceLength
				$data['serviceLengthValue'] = isset($dataInsert['job_year']) && $dataInsert['job_year'] !== 0 ? $data['serviceLength'][$dataInsert['job_year']] : null;

				// annualIncome
				$data['annualIncomeValue'] =  isset($dataInsert['guarantee']) && $dataInsert['guarantee'] !== 0 ? $data['annualIncome'][$dataInsert['guarantee']] : null;

				// borrowing
				$data['borrowingValue'] = $data['borrowing'][$dataInsert['debt1']];

				// paymentOverdue
				$data['paymentOverdueValue'] = $data['paymentOverdue'][$dataInsert['debt2']];

				// familyStructure
				$data['familyStructureValue'] = $data['familyStructure'][$dataInsert['famiry']];

				// investableAssets
				$data['investableAssetsValue'] = $data['investableAssets'][$dataInsert['investment_asset']];

				// investableAssetsRadio
				$data['investableAssetsRadioValue'] = $data['investableAssetsRadio'][$dataInsert['investment_asset_flag']];

				// select_01
				$data['select01Value'] = $data['select01'][$dataInsert['income']];

				// select_02
				$data['select02Value'] = $data['select02'][$dataInsert['subscription']];

				// select_02_other
				$data['select02OtherValue'] = $dataInsert['subscription_text'];

				// select_03
				$data['select03Value'] = $data['select03'][$dataInsert['fx_trade']];

				// select_04
				$data['select04Value'] = $data['select04'][$dataInsert['cash_trade']];

				// select_05
				$data['select05Value'] = $data['select05'][$dataInsert['credit_trade']];

				// select_06
				$data['select06Value'] = $data['select06'][$dataInsert['option_trade']];

				// select_07
				$data['select07Value'] = $data['select07'][$dataInsert['item_trade']];
			} else if ($screen == 'corp') {
				// 法人名（漢字）
				$dataInsert['corp_name'] = $this->input->post('corp_name');
				// 法人名（フリガナ）
				$dataInsert['corp_name_kana'] = $this->input->post('corp_name_kana');
				// 代表者名（漢字）
				$dataInsert['ceo_name'] = $this->input->post('ceo_name');
				// 代表者名（フリガナ）
				$dataInsert['ceo_name_kana'] = $this->input->post('ceo_name_kana');
				// 代表者名名前
				$dataInsert['ceo_first_name'] = $this->input->post('ceo_first_name');
				// 代表者名名前（フリガナ）
				$dataInsert['ceo_first_name_kana'] = $this->input->post('ceo_first_name_kana');
				
				// メールアドレス
				$mail = '';
				if ($this->input->post('mail')) {
					$mail = $this->input->post('mail');
				}
				$dataInsert['mail'] = $mail;
				
				// 郵便番号
				$dataInsert['post1'] = $this->input->post('post1');
				// 郵便番号
				$dataInsert['post2'] = $this->input->post('post2');
				// m_pref FK
				$dataInsert['pref_id'] = $this->input->post('pref_id');
				// 市区町村
				$dataInsert['city'] = $this->input->post('city');
				// 住所（番地）
				$dataInsert['address'] = $this->input->post('address');
				// 建物
				$dataInsert['building'] = $this->input->post('building');
				
				// 海外居住者=1
				$overseas_address_flag = 0;
				if ($this->input->post('overseas_address_flag')) {
					$overseas_address_flag = $this->input->post('overseas_address_flag');
				}
				$dataInsert['overseas_address_flag'] = $overseas_address_flag;
				
				// AddressLine1
				$dataInsert['overseas_adr1'] = $this->input->post('overseas_adr1');
				// AddressLine2
				$dataInsert['overseas_adr2'] = $this->input->post('overseas_adr2');
				// City
				$dataInsert['overseas_city'] = $this->input->post('overseas_city');
				// State/Region
				$dataInsert['overseas_state'] = $this->input->post('overseas_state');
				// Zipcode
				$dataInsert['overseas_zip'] = $this->input->post('overseas_zip');
				// m_country FK
				$dataInsert['overseas_country_id'] = $this->input->post('overseas_country_id');
				// 電話番号
				$dataInsert['tel1'] = $this->input->post('tel1');
				// 電話番号
				$dataInsert['tel2'] = $this->input->post('tel2');
				// 電話番号
				$dataInsert['tel3'] = $this->input->post('tel3');
				
				// Password
				$password = '';
				if ($this->input->post('password')) {
					// Encryption password
					$password = $this->common->encrypt($this->input->post('password'));
				}
				$dataInsert['password'] = $password;
				
				// 取引責任者苗字
				$dataInsert['pre_name'] = $this->input->post('pre_name');
				// 取引責任者苗字（フリガナ）
				$dataInsert['pre_name_kana'] = $this->input->post('pre_name_kana');
				// 取引責任者名前
				$dataInsert['pre_first_name'] = $this->input->post('pre_first_name');
				// 取引責任者名前（フリガナ）
				$dataInsert['pre_first_name_kana'] = $this->input->post('pre_first_name_kana');
				// 取引責任者郵便番号
				$dataInsert['pre_post1'] = $this->input->post('pre_post1');
				// 取引責任者郵便番号
				$dataInsert['pre_post2'] = $this->input->post('pre_post2');
				// 取引責任者m_pref FK
				$dataInsert['pre_pref_id'] = $this->input->post('pre_pref_id');
				// 取引責任者市区町村
				$dataInsert['pre_city'] = $this->input->post('pre_city');
				// 取引責任者住所（番地）
				$dataInsert['pre_address'] = $this->input->post('pre_address');
				// 取引責任者建物
				$dataInsert['pre_building'] = $this->input->post('pre_building');
				// 取引責任者電話番号
				$dataInsert['pre_tel1'] = $this->input->post('pre_tel1');
				// 取引責任者電話番号
				$dataInsert['pre_tel2'] = $this->input->post('pre_tel2');
				// 取引責任者電話番号
				$dataInsert['pre_tel3'] = $this->input->post('pre_tel3');
				// 前期売上高
				$dataInsert['amount_sales'] = $this->input->post('amount_sales');
				// 前期純利益
				$dataInsert['net_income'] = $this->input->post('net_income');
				// 純資産
				$dataInsert['net_worth'] = $this->input->post('net_worth');
				// 設立年月日　年
				$dataInsert['year'] = $this->input->post('year');
				// 設立年月日　月
				$dataInsert['month'] = $this->input->post('month');
				// 設立年月日　日
				$dataInsert['day'] = $this->input->post('day');
				// 主な事業内容
				$dataInsert['business'] = $this->input->post('business');
				
				// Default value checkbox
				$purpose1 = 0;
				$purpose2 = 0;
				$purpose3 = 0;
				$purpose4 = 0;
				if ($this->input->post('purpose1') == 'on') {
					$purpose1 = 1;
				}
				if ($this->input->post('purpose2') == 'on') {
					$purpose2 = 1;
				}
				if ($this->input->post('purpose3') == 'on') {
					$purpose3 = 1;
				}
				if ($this->input->post('purpose4') == 'on') {
					$purpose4 = 1;
				}
				// 取引目的 仮想通貨を購入して、国内外への送金、決済のため
				$dataInsert['purpose1'] = $purpose1;
				// 取引目的 仮想通貨の価格変動による売買益のため
				$dataInsert['purpose2'] = $purpose2;
				// 取引目的 中・長期投資のため
				$dataInsert['purpose3'] = $purpose3;
				// 取引目的 分散投資を行うため
				$dataInsert['purpose4'] = $purpose4;
				
				// 申込の経緯をご選択ください。
				$dataInsert['subscription'] = $this->input->post('subscription');
				// 申込の経緯をご選択ください。
				$dataInsert['subscription_text'] = $this->input->post('subscription_text');
				// 収益移転防止法に関する項目1
				$dataInsert['agree_1'] = $this->input->post('agree_1');
				// 収益移転防止法に関する項目2
				$dataInsert['agree_2'] = $this->input->post('agree_2');
				
				// m_pref FK
				$data['prefectureValue'] = '';
				if (!empty($dataInsert['pref_id'])) {
					$data['prefectureValue'] = $data['pref_list'][$dataInsert['pref_id']];
				}

				// 取引責任者m_pref FK
				$data['prePrefectureValue'] = '';
				if (!empty($dataInsert['pre_pref_id'])) {
					$data['prePrefectureValue'] = $data['pref_list'][$dataInsert['pre_pref_id']];
				}

				// 国別マスタ
				$data['overseasCountryValue'] = '';
				if (!empty($dataInsert['overseas_country_id'])) {
					$data['overseasCountryValue'] = $data['overseas_country_list'][$dataInsert['overseas_country_id']];
				}

				// 前期売上高
				$data['amountSalesValue'] = '';
				if (!empty($dataInsert['amount_sales'])) {
					$data['amountSalesValue'] = $data['amountSales'][$dataInsert['amount_sales']];
				}

				// 前期純利益
				$data['netIncomeValue'] = '';
				if (!empty($dataInsert['net_income'])) {
					$data['netIncomeValue'] = $data['netIncome'][$dataInsert['net_income']];
				}

				// 純資産
				$data['netWorthValue'] = '';
				if (!empty($dataInsert['net_worth'])) {
					$data['netWorthValue'] = $data['netWorth'][$dataInsert['net_worth']];
				}

				// 申込の経緯をご選択ください。
				$data['subscriptionValue'] = '';
				if (!empty($dataInsert['subscription'])) {
					$data['subscriptionValue'] = $data['subscription'][$dataInsert['subscription']];
				}
			}

			if ($this->input->post('overseas_address_flag') == 1) {
				// 郵便番号
				$dataInsert['post1'] = 0;
				// 郵便番号
				$dataInsert['post2'] = 0;
				// m_pref FK
				$dataInsert['pref_id'] = 0;
				// 市区町村
				$dataInsert['city'] = '';
				// 住所（番地）
				$dataInsert['address'] = '';
				// 建物
				$dataInsert['building'] = '';
			}

			$data['dataInsert'] = $dataInsert;

			/**
			 * Load library session
			 */
			$this->load->library('session');
			// Add data user/corp to session
			$this->session->set_userdata('data_' . $screen, $data);
		}

		$this->assign('data', $data);
	}

	/**
	 * Return page register new user/corp when session data have not exists
	 * $screen: user | corp
	 */
	public function isAddDataSession($screen = 'user') {
		/**
		 * Load library session
		 */
		$this->load->library('session');
		if (!$this->session->has_userdata('data_' . $screen)) {
			$this->load->helper('url');
			redirect('/pre-registered/register/' . $screen);
		}
	}

	/**
	 * Screen register
	 * $screen: user | corp
	 */
	public function register($screen) {
		// Check session data mail temp
		if (!$this->session->has_userdata('data_mail_temp')) {
			redirect(base_url());
		}

		// Check screen
		$this->common->isValidScreen($screen);

		$data = $this->defaultHtmlView($screen);
		$data['dataInsert'] = self::defaultDataView($screen);

		if ($this->session->has_userdata('data_' . $screen)) {
			$data = $this->session->userdata('data_' . $screen);
		}

		$this->assign('data', $data);
		$this->assign('screen', $screen);
		$this->tpl('register_' . $screen . '.tpl');
	}

	/**
	 * Screen confirm register
	 * $screen: user | corp
	 */
	public function confirm_register($screen) {
		// Check screen
		$this->common->isValidScreen($screen);

		if ($this->input->post('btnRegister')) {
			$this->addDataSession($screen);
		} else {
			// Return page register new user/corp when session data have not exists
			$this->isAddDataSession($screen);
		}	

		// Assign data from session
		$data = $this->session->userdata('data_' . $screen);
		if ($this->session->has_userdata('data_mail_temp')) {
			$data['dataInsert']['mail'] = $this->session->userdata('data_mail_temp');
			$this->session->set_userdata('data_' . $screen, $data);
		}

		$this->assign('data', $data);
		$this->assign('screen', $screen);
		$this->tpl('confirm_register_' . $screen . '.tpl');
	}

	/**
	 * Screen password register
	 * $screen: user | corp
	 */
	public function password_register($screen) {
		// Check screen
		$this->common->isValidScreen($screen);

		// Return page register new user/corp when session data have not exists
		$this->isAddDataSession($screen);

		// Assign data from session
		$data = $this->session->userdata('data_' . $screen);

		$this->assign('data', $data);
		
		// Submit form in screen password
		if ($this->input->post('btnPassword')) {
			$data['dataInsert']['password'] = $this->common->encrypt($this->input->post('password'));


			// 追加コード
			// 代理店ID情報追加
			$email_temp = $this->t_email_temp->checkDuplicate(array('mail' => $data['dataInsert']['mail']), true);
			if (isset($email_temp[0]['agency_id'])) {
				$data['dataInsert']['agency_id'] = $email_temp[0]['agency_id'];
			}
			// 追加コード

			// Load library model
			if ($screen == 'user') {
				$this->load->model('t_user');

				// Email of this user registered in database
				if ($this->t_user->isRegistered($data['dataInsert']['mail'])) {
					if ($this->session->has_userdata('data_' . $screen)) {
						$this->session->unset_userdata('data_' . $screen);
					}
					redirect(base_url());
				}

				// 追加コード
				$this->lib_user_function->userTrycatch(
					function($tryArg){ // try
						$this->result_register_data = $this->t_user->insert($tryArg['dataInsert']);

						// 追加コード
						// 残高初期登録
						$this->lib_t_balance->insertFirst(1, $this->result_register_data);
						// ステータス情報初期登録
						$this->lib_t_user_status->insertFirst(1, $this->result_register_data);
						// 名義ID登録(更新)
						$payment_id = $this->lib_user_function->makePaymentId(1, $this->result_register_data);
						$update_params = array('payment_id' => $payment_id);
						$where = array('id' => $this->result_register_data);
						$this->t_user->update($update_params, $where);
					},
					function($tryCatch){ // catch
						$this->lib_error->error_general();
						exit();
					},
					array(
						'try'   => $data,
						'catch' => null
					)
				);

			} else if ($screen == 'corp') {
				$this->load->model('t_corp');
				
				// Email of this corp registered in database
				if ($this->t_corp->isRegistered($data['dataInsert']['mail'])) {
					if ($this->session->has_userdata('data_' . $screen)) {
						$this->session->unset_userdata('data_' . $screen);
					}
					redirect(base_url());
				}
				
				$this->lib_user_function->userTrycatch(
					function($tryArg){ // try
						$this->result_register_data = $this->t_corp->insert($tryArg['dataInsert']);

						// 追加コード
						// 残高初期登録
						$this->lib_t_balance->insertFirst(2, $this->result_register_data);
						// ステータス情報初期登録
						$this->lib_t_user_status->insertFirst(2, $this->result_register_data);
						// 名義ID登録(更新)
						$payment_id = $this->lib_user_function->makePaymentId(2, $this->result_register_data);
						$update_params = array('payment_id' => $payment_id);
						$where = array('id' => $this->result_register_data);
						$this->t_corp->update($update_params, $where);
					},
					function($tryCatch){ // catch
						$this->lib_error->error_general();
						exit();
					},
					array(
						'try'   => $data,
						'catch' => null
					)
				);

			}
			// Send email
			if ($screen == 'user') {
				$name = $data['dataInsert']['family_name'] . ' ' . $data['dataInsert']['first_name'];
			} else if ($screen == 'corp') {
				$name = $data['dataInsert']['corp_name'] . PHP_EOL . $data['dataInsert']['ceo_name'] . ' ' . $data['dataInsert']['ceo_first_name'];
			} else {
				$name = $data['dataInsert']['mail'];
			}

			$email = $data['dataInsert']['mail'];
			$options = array(
				'to' => $email,
				'data' => array(
					'name' => $name,
					'link_login' => base_url() . 'login',
					'link_contact' => base_url() . 'contact'
				)
			);

			// Template mail use for register corp
			if ($screen == 'corp') {
				$options['subject'] = 'CryptoPieへのご登録ありがとうございます';
				$options['template'] = 'mail_register_corp.tpl';
			}

			$result_send_email = $this->mail->sendEmail($options);

			// Redirect page when register new user/corp and send email successfully
			if ($this->result_register_data && $result_send_email) {
				// Remove session data when finish register new user/corp
				$this->session->unset_userdata('data_' . $screen);
				if ($this->session->has_userdata('data_mail_temp')) {
					$this->session->unset_userdata('data_mail_temp');
				}
				$this->t_email_temp->delete(array('mail' => $email));
				// Redirect page
				$this->load->helper('url');
				redirect('/pre-registered/complete-register/' . $screen);
			} else {
				redirect(base_url());
			}
		}
		$this->assign('screen', $screen);
		$this->tpl('password_register_' . $screen . '.tpl');
	}

	/**
	 * Complete register
	 * $screen: user | corp
	 */
	public function complete_register($screen) {
		// Check screen
		$this->common->isValidScreen($screen);

		$this->assign('screen', $screen);
		$this->tpl('complete_register_' . $screen . '.tpl');
	}

	/**
	 * Validate email in rules
	 */
	public function check_email_reset_password() {
		$mail = $this->input->post('mail');
		if (!empty($mail)) {
			$mailUser = $this->t_user->isRegistered($mail);
			$mailCorp = $this->t_corp->isRegistered($mail);
			
			if (empty($mailUser) && empty($mailCorp)) {
				$this->form_validation->set_message('check_email_reset_password', '入力されたメールアドレスは存在しません');
				return false;
			}
		}
		return true;
	}

	/**
	 * Reset password
	 */
	public function reset_password() {
		// Validate
    	$email = $this->input->post('mail');
    	$this->form_validation->set_error_delimiters('<p class="error_text">', '</p>');

    	// Validate require, duplicate email
    	$this->form_validation->set_rules('mail', 'メールアドレス', 'required|callback_check_email_reset_password', array(
    		'required' => '「メールアドレス」を入力してください',
    	));

    	if ($this->form_validation->run()) {
    		$token = $this->common->generateToken($email);
			$dataUpdate = array('token' => $token, 'token_expired' => $this->common->add2Day());
			$where = array('mail' => $email);
			if (!empty($this->t_user->isRegistered($email))) {
				// Update token and token expired
				$this->t_user->update($dataUpdate, $where);
			} else if (!empty($this->t_corp->isRegistered($email))) {
				// Update token and token expired
				$this->t_corp->update($dataUpdate, $where);
			}
			// Send email
			$options = array(
				'to' => $email,
				'data' => array(
					'link' => base_url() . 'pre-registered/reset-password-input/token/' . $token
				),
				'subject' => '【Cryptopie】パスワード再設定手続きを開始します',
				'template' => 'mail_reset_password.tpl'
			);
			$isSend = $this->mail->sendEmail($options);
			// Redirect page
			if (!$isSend) {
				redirect(base_url() . 'login');
			} else {
				redirect('/pre-registered/reset-password-sendmail');
			}
    	}

    	$this->tpl('reset_password.tpl');
	}

	/**
	 * Reset password send mail
	 */
	public function reset_password_sendmail() {
		$this->tpl('reset_password_sendmail.tpl');
	}

	/**
	 * Reset password reset
	 */
	public function reset_password_input() {
		$uri = $this->uri->uri_to_assoc();
		$token = isset($uri['token']) ? $uri['token'] : '';
		
		if (!$this->common->isValidToken('user', $token) && 
			!$this->common->isValidToken('corp', $token)) {
			redirect('/pre-registered/reset-password');
		}

		// Validate
    	$this->form_validation->set_error_delimiters('<p class="error_text">', '</p>');
    	$this->form_validation->set_rules('mail', 'メールアドレス', 'required|callback_check_email_reset_password', array(
    		'required' => '「メールアドレス」を入力してください',
    	));

    	$data = array();
    	// libraryから情報を取得
		$dataDate = $this->yearMonthDay();
		$data['year'] = $dataDate['year'];
		$data['month'] = $dataDate['month'];
		$data['day'] = $dataDate['day'];

		if ($this->session->has_userdata('data_reset_password')) {
			$data = $this->session->userdata('data_reset_password');
		}

		$data['data'] = $this->input->post();
		$email = $this->input->post('mail');
		
		$error = '';
		if ($this->form_validation->run()) {
			$isDuplicate = false;
			if ($this->common->isValidToken('user', $token)) {
				$dataCheck = array(
					'mail' => $email,
					'year' => $this->input->post('year'),
					'month' => $this->input->post('month'),
					'day' => $this->input->post('day'),
					'tel1' => $this->input->post('tel1'),
					'tel2' => $this->input->post('tel2'),
					'tel3' => $this->input->post('tel3'),
				);
				
				if (!empty($this->t_user->checkDuplicate($dataCheck))) {
					$isDuplicate = true;
				}
			} else if ($this->common->isValidToken('corp', $token)) {
				$dataCheck = array(
					'mail'  => $email,
					'year'  => $this->input->post('year'),
					'month' => $this->input->post('month'),
					'day'   => $this->input->post('day'),
					'tel1'  => $this->input->post('tel1'),
					'tel2'  => $this->input->post('tel2'),
					'tel3'  => $this->input->post('tel3'),
				);
				
				if (!empty($this->t_corp->checkDuplicate($dataCheck))) {
					$isDuplicate = true;
				}
			}

			if ($isDuplicate == true) {
				// Add data user/corp to session
				$this->session->set_userdata('data_reset_password', $data);
		
				// Redirect page
				redirect('/pre-registered/reset-password-reset');
			} else {
				$error = 'いずれかの項目に誤りがあります。';
			}
		}

		$this->assign('error', $error);
		$this->assign('data', $data);
		$this->tpl('reset_password_input.tpl');
	}

	/**
	 * Reset password reset
	 */
	public function reset_password_reset() {
		// Redirect page when end user access directly link
		if (!$this->session->has_userdata('data_reset_password')) {
			// Redirect page
			redirect('/pre-registered/reset-password');
		}

		// Validate
    	$this->form_validation->set_error_delimiters('<p class="error_text">', '</p>');
    	$this->form_validation->set_rules('password', '新しいパスワード', 'required|min_length[6]|max_length[12]', array(
    		'require' => '「新しいパスワード」を入力してください。',
    		'min_length' => '6文字以上12文字以内で入力してください。',
    		'max_length' => '6文字以上12文字以内で入力してください。',
    	));
    	$this->form_validation->set_rules('password_again', '新しいパスワードの確認', 'required|min_length[6]|max_length[12]|matches[password]', array(
    		'require' => '「確認パスワード」が正しくありません。',
    		'min_length' => '6文字以上12文字以内で入力してください。',
    		'max_length' => '6文字以上12文字以内で入力してください。',
    		'matches' => '「確認パスワード」が正しくありません。',
    	));

    	$data = $this->session->userdata('data_reset_password');
    	$password = $this->input->post('password');
		$password_again = $this->input->post('password_again');
		$email = $data['data']['mail'];

		if ($this->form_validation->run()) {
			$dataUpdate = array('password' => $this->common->encrypt($password));
			$where = array('mail' => $email);

			$userOrCorpId = null;
			if (!empty($this->t_user->getIdByEmail($email))) {
				$this->t_user->update($dataUpdate, $where);
				$userOrCorpId = $this->t_user->getIdByEmail($email);
			} else if (!empty($this->t_corp->getIdByEmail($email))) {
				$this->t_corp->update($dataUpdate, $where);
				$userOrCorpId = $this->t_corp->getIdByEmail($email);
			}

			if (!empty($userOrCorpId)) {
				// Send email
				$options = array(
					'to' => $email,
					'data' => array(
						'password' => $password
					),
					'subject' => '【Cryptopie】パスワードの設定が完了しました',
					'template' => 'mail_reset_password_complete.tpl'
				);
				$isSend = $this->mail->sendEmail($options);

				// Send email successfully
				if ($isSend) {
					// Log pass
					$dataInsert = array(
						'mail' => $email,
						'status' => 1,
						'log_time' => $this->common->currentTime(),
						'user_id' => $userOrCorpId
					);
					$this->load->model('log_pass');
					$this->log_pass->insert($dataInsert);

					// Remove data session when submit fail
					if ($this->session->has_userdata('data_reset_password')) {
						$this->session->unset_userdata('data_reset_password');
					}
					redirect('/pre-registered/reset-password-complete');
				} else {
					redirect(base_url());
				}
			}
		}

		$this->tpl('reset_password_reset.tpl');
	}

	/**
	 * Reset password complete
	 */
	public function reset_password_complete() {
		if ($this->input->post('btnResetPasswordComplete')) {
			/**
			 * Load library helper
			 */
			$this->load->helper('url');
			redirect(base_url()."login/");
		}
		$this->tpl('reset_password_complete.tpl');
	}
}
