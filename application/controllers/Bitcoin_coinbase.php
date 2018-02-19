<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bitcoin_coinbase extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('coinbase/lib_user');
		$this->load->library('coinbase/lib_wallet');
		$this->load->library('coinbase/lib_transaction');
	}

	public function index()
	{
		for ($i=0; $i < 1000; $i++) { 
			$name = $this->lib_user->getName();
			echo "<pre>";var_dump($name);echo __LINE__.'行目';echo "</pre><br>";
		}
		echo "<pre>";var_dump($i);echo __LINE__.'行目';echo "</pre><br>";
	}

	/*
	* ウォレット作成
	* return object
	*/
	// public function createNewWallet() {
	// 	$result = $this->lib_wallet->createNewWallet('BTC Wallet TEST3');
	// 	echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	// }
	
	// ウォレット情報一覧取得
	public function getWalletList()
	{
		$result = $this->lib_wallet->getWalletList();
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
		// echo "<pre>";var_dump(json_decode(json_encode($result), true));echo __LINE__.'行目';echo "</pre><br>";
	}

	// ウォレット情報取得
	public function getWallet()
	{
		$result = $this->lib_wallet->getWallet();
		echo "<pre>";var_dump($result->getRawData());echo __LINE__.'行目';echo "</pre><br>";
	}

	// アドレス作成
	public function createAddress()
	{
		$result = $this->lib_wallet->createNewAddress();
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// アカウントの全トランザクションを取得する
	public function getTransactions()
	{
		$result = $this->lib_transaction->getAccountTransactions();
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// アカウントの全アドレス一覧
	public function getAddressList()
	{
		$result = $this->lib_wallet->getAddressList();
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// アドレスの全トランザクション一覧取得
	public function getAddressTransactions()
	{
		$result = $this->lib_transaction->getAddressTransactions("35f44e7b-8aba-5f6c-8240-8866e6fb286f");
		
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// アドレスの詳細
	public function getAddressesInfo()
	{
		$result = $this->lib_wallet->getAddressesInfo("c2c773c9-cec4-51dc-bc09-013f3f4431f9");
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// blockChain.info hashの情報取得
	public function getBlockChainHash()
	{
		$url = "https://blockchain.info/ja/rawtx/88b3f866e830cc7d1eeeb52fa75515005f70863d4488afc007c79599259c0e88";
		$result = file_get_contents($url);
		
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// bitFlyer hashの情報取得
	public function getChainFlyerHash()
	{
		$url = "https://chainflyer.bitflyer.jp/v1/tx/88b3f866e830cc7d1eeeb52fa75515005f70863d4488afc007c79599259c0e88";
		$result = file_get_contents($url);
		
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	// ウォレット情報一覧取得
	public function sendFunds()
	{
		$result = $this->lib_transaction->sendFunds(
				"3Hk8waZkiYAKJK67wxWMX14AeK5Xwhxrp6",
				0.001
			);
		echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";
	}
	
	
}
