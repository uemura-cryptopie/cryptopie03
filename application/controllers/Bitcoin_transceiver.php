<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitcoin_transceiver extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // $address    = '1DezcALMum9GtuUKLfXZUvw3QLwMJ5eWS6';
    // $address    = '33pWuxGDbXk2DpQStQkG5k6WmHxbPQPew1';
    $guid          = '8d75ad62-59d4-4f96-b4e0-847d24246725';
    $password      = 'trainsystem1192';
    $label         = urlencode('テストHDofTOSHIYA'); // スペースあるとバグる
    // $url           = 'http://192.168.33.11:3000/merchant/'.$guid.'/accounts/create?password='.$password.'&label='.$label;
    $url           = 'http://192.168.33.11:3000/merchant/'.$guid.'/accounts?password='.$password;


    // 金額の指定はsatoshi
    $to     = '3Hk8waZkiYAKJK67wxWMX14AeK5Xwhxrp6'; // bitFlyer 法人
    $from   = '1Cxub6kdzuwhoE6r9Xb2DdHWJfJTUSYLnx'; // 送り元
    $amount = 0; // 送信金額
    $fee    = 0; // 手数料
    // $url    = 'http://192.168.33.11:3000/merchant/'.$guid.'/payment?to='.$to.'&amount='.$amount.'&password='.$password.'&from='.$from.'&fee='.$fee;

    // $Blockchain = new \Blockchain\Blockchain();
    // $Blockchain->setServiceUrl('http://192.168.33.11:3000');
    // $Blockchain->Wallet->credentials($guid, $password);
    // $active_id = $Blockchain->Wallet->getIdentifier();
    // $balance   = $Blockchain->Wallet->getBalance();
    // $addresses = $Blockchain->Wallet->getAddresses();
    $result = file_get_contents($url);
    // $balance = $Blockchain->Wallet->getAddressBalance($address);
    // echo "<pre>";var_dump($balance * 0.00000001);echo __LINE__.'行目';echo "</pre><br>";
    // $this->tpl('bitcoin_price.tpl');
    // $btc_amount = $Blockchain->Rates->toBTC(300000, 'JPY');
    // echo "<pre>";var_dump($btc_amount);echo __LINE__.'行目';echo "</pre><br>";
    // echo "<pre>";var_dump($balance);echo __LINE__.'行目';echo "</pre><br>";
    // echo "<pre>";var_dump($active_id);echo __LINE__.'行目';echo "</pre><br>";
    echo "<pre>";var_dump($result);echo __LINE__.'行目';echo "</pre><br>";

  }

}
