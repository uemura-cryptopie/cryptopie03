<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;

require_once('Lib_coinbase.php');

class Lib_trade extends Lib_coinbase {

  public function __construct()
  {
    $this->CI =& get_instance();
    $this->client = self::setClient();
  }

  /*
   * ウォレット作成
   * return object
   */
  public function SendFunds() {
    $account = self::getWallet();
    $address = '3Hk8waZkiYAKJK67wxWMX14AeK5Xwhxrp6';
    $transaction = Transaction::send([
        'toBitcoinAddress' => $address,
        'amount'           => new Money(0.001, CurrencyCode::BTC)
    ]);

    $result = $this->client->createAccountTransaction($account, $transaction);

    return $result;
  }

}
