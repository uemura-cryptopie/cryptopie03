<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('coinbase/lib_wallet');
		$this->load->library('controller/lib_finance');	
		$this->load->library('controller/lib_finance_send');
		$this->load->library('controller/lib_finance_reception');
		$this->load->library('controller/lib_finance_withdrawal');
		$this->load->library('controller/lib_finance_deposit');
		$this->load->library('controller/lib_bank');
		$this->load->library('model/lib_t_virtual_wallet');
		$this->load->library('support/lib_validation');
	}

	/**
	 * Index
	 */
	public function index()
	{
		// インデックスにアクセスされたらリダイレクト
		redirect(base_url() . "mypage/{$this->controller}/reception/");
	}

	/**************************************
	 * ------------日本円入金---------------
	 **************************************/
	/**
	 * 日本円入金
	 */
	public function jpy_deposit()
	{
		$this::is_login('id_check');
		$data = $this->lib_finance_deposit->indexData();
		$this->assign('history', $data['history']);
		$this->assign('payment', $data['payment']);
		$this->assign('error', $this->session->flashdata());
		$this->tpl('mypage/jpy_deposit.tpl');
	}
	
	/**************************************
	 * ------------日本円出金---------------
	 **************************************/
	/**
	 * 出金・口座一覧
	 */
	public function jpy_withdrawal()
	{
		$this::is_login('usable');
		$flashdata = $this->session->flashdata();
		$data = $this->lib_finance_withdrawal->indexData();
		$this->assign('history', $data['history']);
		$this->assign('bank', $this->lib_bank->getBankList());
		$this->assign('params', $this->input->post());
		$this->assign('flashdata', $flashdata);
		$this->tpl('mypage/jpy_withdrawal.tpl');
	}
	
	// 出金依頼登録実行
	public function jpy_Withdrawal_request()
	{
		$this::is_login('usable');
		$this->lib_finance_withdrawal->insert_exec();
		$this->lib_finance_withdrawal->sendMail();
		redirect(base_url() . 'mypage/finance/jpy-withdrawal/');
	}

	// 残高チェック
	public function jpy_Withdrawal_check()
	{
		$this->lib_finance_withdrawal->checkAmount();
	}
	/**************************************
	 * ------------コイン受信----------------
	 **************************************/
	/**
	 * 各種一覧
	 */
	public function reception()
	{
		$this::is_login('id_check');
		$this->assign('wallet', $this->lib_t_virtual_wallet->getWallet(true));
		$this->assign('history', $this->lib_finance->getHistory(2)); // 1=send, 2=receive
		$this->tpl('mypage/reception.tpl');
	}
	

	/**
	 * 受信アドレス作成
	 */
	public function create_reception()
	{
		$this::is_login('id_check');
		$this->lib_finance_reception->createAddress();
		redirect(base_url() . 'mypage/finance/reception');
	}


	/**
	 * 受信トランザクション更新
	 * クーロン用
	 */
	public function cron_reception()
	{
		$this->lib_finance->saveTransactionReceived();
	}



	/**************************************
	 * ------------コイン送金----------------
	 **************************************/
	/**
	 * 各種一覧
	 */
	public function send()
	{
		$this::is_login('usable');
		$flashdata = $this->session->flashdata();
		$user_data = $this->lib_mypage->getUserData();
		$this->assign('addresses', $this->lib_finance_send->addresses());
		$this->assign('history', $this->lib_finance->getHistory(1)); // 1=send, 2=receive
		$this->assign('flashdata', $flashdata);
		$this->assign('transfer_coin', $user_data['setting_transfer_coin']);
		$this->tpl('mypage/send.tpl');
	}

	/**
	 * 送信実行
	 */
	public function send_exec()
	{
		$this::is_login('usable');
		$this->lib_finance_send->sendFunds();
		redirect(base_url() . 'mypage/finance/send/');
	}

	/**
	 * 送信アドレス登録
	 */
	public function add_address()
	{
		$this::is_login('id_check');
		$rules = $this->lib_finance_send->sendAddressRules;
		if ($this->lib_validation->validateInputs($rules)) {
			$this->lib_finance_send->add_exec();
			redirect(base_url() . 'mypage/finance/send#reception_address');
		} else {
			// トランザクションを取得
			$this->assign('params', $this->input->post());
			$this->assign('addresses', $this->lib_finance_send->addresses());
			$this->assign('history', $this->lib_finance->getHistory(1)); // 1=send, 2=receive
			$this->assign('error', $this->session->flashdata());
			$this->tpl('mypage/send.tpl');
		}
	}


	/**
	 * 送信アドレス変更
	 */
	public function update_address()
	{
		$this::is_login('usable');
		$this->lib_finance_send->update_exec();
		redirect(base_url() . 'mypage/finance/send#reception_address');
	}

	/**
	 * 送信トランザクション更新
	 * クーロン用
	 */
	public function cron_send()
	{
		$this->lib_finance->saveTransactionSend();
	}

}
