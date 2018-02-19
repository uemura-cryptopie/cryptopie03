<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Coinbase\Wallet\Resource\Email;

require_once('Lib_coinbase.php');

class Lib_user extends Lib_coinbase {

  public function __construct()
  {
    $this->client = self::setClient();
    $this->user   = self::getCurrentUser();
  }

  /*
   * ユーザー情報取得
   * return object
   */
  public function getCurrentUser() {
    return $this->client->getCurrentUser();
  }

  /*
   * 名前取得
   * return string
   */
  public function getName() {
    return $this->user->getName();
  }
}
