<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Coinbase\Wallet\Enum\Param;

use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
require_once('Lib_coinbase.php');

class Lib_wallet extends Lib_coinbase {

  public function __construct()
  {
    // $this->CI =& get_instance();
    $this->client = self::setClient();
  }
  
  /*
  * ウォレット作成
  * return object
  */
  public function createNewWallet($label='New BTC Wallet') {
    $account = new Account([
      'name' => $label
    ]);
    return $this->client->createAccount($account);
  }
  
  /*
   * 受取アドレス作成
   * return object
   */
  public function createNewAddress($label='Test Address') {
    $account = self::getWallet();
    // アカウント情報取得
    $address = new Address([
        'name' => $label
    ]);
    
    try {
      $result = $this->client->createAccountAddress($account, $address);
      return $result->getRawData();
    } catch (Exception $e) {
      return false;
    }
    
  }

  /*
   * ウォレット一覧取得
   * return object
   */
  public function getWalletList() {
    $accounts = array();
    // アカウント情報取得
    $accountResponse = $this->client->getAccounts();
    foreach ($accountResponse->all() as $account) {
      $responseData = $account->getRawData(); // 配列に変換
      // アドレス情報取得
      $responseData['address'] = self::getAddressList($account);
      // 通貨ごとに格納
      $accounts[$responseData['currency']][] = $responseData;
    }
    return $accounts;
  }
  
  
  /*
   * ウォレットのアドレス一覧取得
   * return array
   */
  public function getAddressList($account = null) {
    // アドレス情報取得
    $account = ($account) ? $account : self::getWallet();
    $addresses = array();
    
    try {
      $address = $this->client->getAccountAddresses($account, array(
        "limit" => 100
      ));
    } catch (Exception $e) {
      return false;
    }
    while ($address->hasNextPage()) {
      $this->client->loadNextAddresses($address);
    }
    foreach ($address->all() as $value) {
      $addresses[] = $value->getRawdata();
    }
    return $addresses;
  }
  
  /*
   * アドレスの詳細取得
   * return array
   */
  public function getAddressesInfo($addressId) {
    $account = self::getWallet();
    $address = "";
    try {
      $address = $this->client->getAccountAddress($account, $addressId);
    } catch (Exception $e) {
      echo "<pre>";var_dump("失敗");echo __LINE__.'行目';echo "</pre><br>";
    }
    return $address;
  }
  



}
