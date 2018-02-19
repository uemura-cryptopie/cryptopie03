<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;

require_once('Lib_coinbase.php');

class Lib_transaction extends Lib_coinbase {

  public function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->library('model/lib_t_error_log');
    $this->client = self::setClient();
  }

  /*
   * 送信トランザクション作成
   * return object
   */
  public function sendFunds($address="", $amount=0, $fee=0.0005) {
    $account = self::getWallet();
    // $address = '3Hk8waZkiYAKJK67wxWMX14AeK5Xwhxrp6';
    $address = $address;
    try {
      $transaction = Transaction::send([
          'toBitcoinAddress' => $address,
          'amount'           => new Money($amount, CurrencyCode::BTC),
          'description'      => 'テスト送信',
          // 'fee'              => $fee
      ]);
      $result = $this->client->createAccountTransaction($account, $transaction);
      return $result->getRawData();
    } catch (Exception $e) {
      $massage = (object)['errorMessage'=>'sendFunds: '.$e->getMessage()];
      $this->CI->lib_t_error_log->insert($massage, 1);
      return false;
    }
  }
  
  /*
   * アカウントのトランザクションを取得
   * return array
   */
  public function getAccountTransactions() {
    $responseData = array();
    $account = self::getWallet();
    try {
      $transactions = $this->client->getAccountTransactions($account);
      // $transactions = $this->client->decodeLastResponse();
      foreach ($transactions->all() as $value) {
        $responseData[] = $value->getRawData();
      }
      return $responseData;
    } catch (Exception $e) {
      return false;
    }
  }
  
  /*
   * アカウントのトランザクションを取得
   * return array
   */
  public function getAccountTransaction($transactionId) {
    $responseData = array();
    $account = self::getWallet();
    try {
      $transactions = $this->client->getAccountTransaction($account, $transactionId);
      return $transactions->getRawData();
    } catch (Exception $e) {
      return false;
    }
  }
  
  /*
   * アドレスのトランザクションを取得
   * return array
   */
  public function getAddressTransactions($address_id) {
    $responseData = array();
    $account = self::getWallet();
    try {
      $address = $this->client->getAccountAddress($account, $address_id);
      $transactions = $this->client->getAddressTransactions($address);
      // $transactions = $this->client->decodeLastResponse();
      foreach ($transactions->all() as $value) {
        $responseData[] = $value->getRawData();
      }
      return $responseData;
    } catch (Exception $e) {
      return false;
    }
  }

}
