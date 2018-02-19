<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_user {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_user');
		$this->CI->load->library('model/lib_t_corp');
		$this->CI->load->library('basic/date');
		$this->CI->load->library('basic/financial');
		$this->CI->load->library('basic/prevention_law');
	}
	
	/**
	 * Default html view
	 * $screen: user | corp
	 */
	public function defaultHtmlView($screen) {
		$data = array();
		if ($screen == 'user') {
			// 事前登録（個人）管理テーブル
			$data = self::defaultHtmlUser();
		} else if ($screen == 'corp') {
			// 法人管理テーブル
			$data = self::defaultHtmlCorp();
		}
		return $data;
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
		$this->CI->load->model('m_pref');
		$data['pref_list'] = $this->CI->m_pref->selectAll();

		// 国別マスタ
		$this->CI->load->model('m_country');
		$data['overseas_country_list'] = $this->CI->m_country->selectAll();
		
		// libraryから情報を取得
		$data['year'] = $this->CI->date->yearList(0, 120);
		$data['month'] = $this->CI->date->monthList();
		$data['day'] = $this->CI->date->dateList();

		// Financial
		$data['residentialForm'] = $this->CI->financial->residentialForm();
		$data['residenceYears'] = $this->CI->financial->residenceYears();
		$data['employmentSystem'] = $this->CI->financial->employmentSystem();
		$data['serviceLength'] = $this->CI->financial->serviceLength();
		$data['annualIncome'] = $this->CI->financial->annualIncome();
		$data['borrowing'] = $this->CI->financial->borrowing();
		$data['paymentOverdue'] = $this->CI->financial->paymentOverdue();
		$data['familyStructure'] = $this->CI->financial->familyStructure();
		$data['investableAssets'] = $this->CI->financial->investableAssets();
		$data['investableAssetsRadio'] = $this->CI->financial->investableAssetsRadio();
		$data['select01'] = $this->CI->financial->select01();
		$data['checkbox'] = $this->CI->financial->checkbox();
		$data['select02'] = $this->CI->financial->select02();
		$data['select03'] = $this->CI->financial->select03();
		$data['select04'] = $this->CI->financial->select04();
		$data['select05'] = $this->CI->financial->select05();
		$data['select06'] = $this->CI->financial->select06();
		$data['select07'] = $this->CI->financial->select07();

		// Prevention Law
		$data['radio'] = $this->CI->prevention_law->radio();

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
		$this->CI->load->model('m_pref');
		$data['pref_list'] = $this->CI->m_pref->selectAll();

		// 国別マスタ
		$this->CI->load->model('m_country');
		$data['overseas_country_list'] = $this->CI->m_country->selectAll();

		// libraryから情報を取得
		$data['year'] = $this->CI->date->yearList(0, 120);
		$data['month'] = $this->CI->date->monthList();
		$data['day'] = $this->CI->date->dateList();

		// Financial
		$data['amountSales'] = $this->CI->financial->amountSales();
		$data['netIncome'] = $this->CI->financial->netIncome();
		$data['netWorth'] = $this->CI->financial->netWorth();
		$data['subscription'] = $this->CI->financial->subscription();
		$data['checkbox'] = $this->CI->financial->checkbox();
		$data['radio'] = $this->CI->prevention_law->radio();

		return $data;
	}
	




	
}
