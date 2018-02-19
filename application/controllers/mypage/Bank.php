<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_login('usable');
		$this->load->library('support/lib_validation');
		$this->load->library('model/lib_m_bank');
		$this->load->library('model/lib_t_bank');
	}
	
	private static $bankInputRules = array(
		array(
			'field' => 'bankcode',
			'label' => '銀行コード',
			'rules' => array(
				'required',
				'integer',
			),
		),
		array(
			'field' => 'bankname',
			'label' => '銀行名',
			'rules' => array(
				'required',
			),
		),
		array(
			'field' => 'branchcode',
			'label' => '支店コード',
			'rules' => array(
				'required',
				'integer',
			),
		),
		array(
			'field' => 'branchname',
			'label' => '支店名',
			'rules' => array(
				'required',
			),
		),
		array(
			'field' => 'accountsubtype',
			'label' => '口座区分',
			'rules' => array(
				'required',
			),
		),
		array(
			'field' => 'acnumber',
			'label' => '口座番号',
			'rules' => array(
				'required',
				'integer',
			),
		),
		array(
			'field' => 'ackana',
			'label' => '口座名義',
			'rules' => array(
				'required',
				'all_katakana'
			),
		)
	);
	
	/**
	 * Index
	 */
	public function index()
	{
		$this->tpl('mypage/bank_input.tpl');
	}
	
	/**
	 * conf
	 */
	public function conf()
	{
		if (!$this->input->post()) redirect(base_url() . "mypage/");
		
		$this->assign('params', $this->input->post());
		
		if ($this->lib_validation->validateInputs(self::$bankInputRules)) {
			// 登録実行
			$this->tpl('mypage/bank_conf.tpl');
		} else {
			// 再入力
			$this->assign('error', $this->form_validation->error_array());
			$this->tpl('mypage/bank_input.tpl');
		}
		
	}
	
	/**
	 * 登録実行
	 */
	public function register()
	{
		if ($this->lib_validation->validateInputs(self::$bankInputRules)) {
			// 登録実行
			$this->load->model('t_bank');
			$this->lib_t_bank->insert($this->input->post()); // 登録実行
			redirect(base_url() . "mypage/finance/jpy-withdrawal/");
		} else {
			redirect(base_url() . "mypage/");
		}
	}
	
	
	
	
/*------------------------------------------------------------------------------------------*
 * 銀行関連データ取得 ※Ajax用
 *------------------------------------------------------------------------------------------*/
		/**
		 * 銀行名のJsonファイル取得
		 */
		public function bankname()
		{
				$bankList = $this->lib_m_bank->getBankName();
				echo json_encode($bankList);
		}

		/**
		 * 支店名のJsonファイル取得
		 */
		public function branchname()
		{
			if (!$this->input->post()) {
				echo "NG";
				return false;
			}
			$post = $this->input->post();
			
			$bankId = $post['bank_id'];
			$branchList = $this->lib_m_bank->getBranchName($bankId);
			echo json_encode($branchList);
		}

	
}
