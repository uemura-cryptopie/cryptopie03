<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_login('usable');
		$this->load->library('controller/lib_shop');
	}

	/**
	 * Index
	 */
	public function index()
	{
		// インデックスにアクセスされたらリダイレクト
		redirect(base_url() . "mypage/");
	}

	/**
	 * 売買実行
	 */
	public function trade()
	{
		// POST情報がない場合はリダイレクト
		$session = $this->session->flashdata();
		if (empty($session)) redirect(base_url() . "mypage/");
		// 価格操作されていないかチェック
		$check  = $this->lib_shop->checkPrice($session);
		$amount = $this->lib_shop->checkAmount($session);
		if (!$check['result'] || !$amount['result']){
			$result = (!$check['result']) ? $check : $amount;
			// エラー画面表示
			redirect(base_url() . "errors/error_general/");
		}
		// 取引実行
		$params = $this->lib_shop->trade_exec($session);
		// TOPへリダイレクト
		redirect(base_url() . "mypage/");
	}


	/**
	 * 価格・残高 チェック
	 */
	public function check()
	{
		// POST情報がない場合はリダイレクト
		if (!$this->input->post()) redirect(base_url() . "mypage/");
		$post = $this->input->post();
		// 価格操作されていないかチェック
		$price  = $this->lib_shop->checkPrice($post);
		$amount = $this->lib_shop->checkAmount($post);
		if (!$price['result'] || !$amount['result']){
			$result = (!$price['result']) ? $price : $amount;
		} else {
			$result = $price;
			// POST情報をSESSIONにセット
			$this->lib_shop->set_params();
		}
		echo json_encode($result);
	}

	/**
	 * 価格・残高 チェック
	 */
	public function balance()
	{
		// 残高取得
		$balance = $this->lib_t_balance->getBalance();
		echo json_encode($balance);
	}


}
