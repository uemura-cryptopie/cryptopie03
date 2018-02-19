<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitcoin_price extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->tpl('bitcoin_price.tpl');
  }

  public function register()
  {
    echo self::_summaryPrice();
  }

  public function registerETH()
  {
    echo self::_summaryPriceETH();
  }

  private function _summaryPrice()
  {
    $price['data'] = array(
      self::_bitflyer(),
      self::_zaif(),
      self::_coincheck(),
      self::_kraken('XBTJPY')
    );
    return json_encode($price);
  }

  private function _summaryPriceETH()
  {
    $price['data'] = array(
      self::_kraken('ETHXBT')
    );
    return json_encode($price);
  }


  private function _bitflyer()
  {
    $path  = '/v1/ticker';
    $query = '';
    $url   = 'https://api.bitflyer.jp' . $path . $query;
    $json  = json_decode(file_get_contents(
      $url,
      false,
      stream_context_create(
        array(
          'http' => array(
            'method' => 'GET',
            'header' => implode(
              "\r\n",
              array(
                'Content-Type: application/x-www-form-urlencoded'
              )
            ),
            'content' => http_build_query(
              array(
                'product_code' => 'BTC_JPY'
              )
            )
          )
        )
      )
    ));
    $return = array(
      'bitFlyer',
      number_format($json->best_bid),
      number_format($json->best_ask)
    );
    return $return;
  }

  private function _zaif()
  {
    $path  = '/api/1/ticker/';
    $query = 'btc_jpy';
    $url   = 'https://api.zaif.jp' . $path . $query;
    $json  = json_decode(file_get_contents($url));
    
    $return = array(
      'zaif',
      number_format($json->bid),
      number_format($json->ask)
    );
    
    return $return;
  }

  private function _coincheck()
  {
    $path = '/api/ticker';
    $query = '';
    $url = 'https://coincheck.com' . $path . $query;
    $json = json_decode(file_get_contents(
      $url,
      false,
      stream_context_create(
        array(
          'http' => array(
            'method' => 'GET',
            'header' => implode(
              "\r\n",
              array(
                'Content-Type: application/x-www-form-urlencoded'
              )
            ),
            'content' => http_build_query(
              array(
                'pair' => 'btc_jpy'
              )
            )
          )
        )
      )
    ));
    
    $return = array(
      'coincheck',
      number_format($json->bid),
      number_format($json->ask)
    );
    
    return $return;
  }


  private function _kraken($pair)
  {
    // https://api.kraken.com/0/public/Ticker?pair=ETHXBT,XBTJPY,ETHJPY

    $path = '/0/public/Ticker';
    $query = '';
    $url = 'https://api.kraken.com/0/public/Ticker?pair='.$pair;
    $json = json_decode(file_get_contents(
      $url
    ));
    
    if ($pair == 'ETHXBT') {
      # code...
      $return = array(
        'kraken',
        number_format($json->result->XETHXXBT->b[0], 6),
        number_format($json->result->XETHXXBT->a[0], 6)
      );
    } else if($pair == 'XBTJPY'){
      # code...
      $return = array(
        'kraken',
        number_format($json->result->XXBTZJPY->b[0], 6),
        number_format($json->result->XXBTZJPY->a[0], 6)
      );
    }
    
    return $return;
  }

}
