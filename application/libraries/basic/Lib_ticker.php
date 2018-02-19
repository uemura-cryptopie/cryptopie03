<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_ticker {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_btc_ticker');
<<<<<<< HEAD
		$this->CI->load->library('model/lib_t_bch_ticker');
		$this->CI->load->library('model/lib_t_eth_ticker');
=======
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
		$this->CI->load->library('model/lib_m_ticker_adjustment');
		$this->api_id = array('coincheck' => 1, 'bitflyer' => 2);
	}

	/**
	 * ticker取得
	 */
	public function getData() {
		// ticker取得
<<<<<<< HEAD
		$ticker_btc = $this->bitflyer();
		$ticker_bch = $this->bitflyer_bch();
		$ticker_eth = $this->bitflyer_eth();

		// bitflyerで取得出来なかった場合coincheckで取得
		if (!isset($ticker_btc) && !isset($ticker_bch)) {
			$ticker = $this->coincheck();
		}

		$btc = $this->adjustment($ticker_btc);
		$bch = $this->adjustment($ticker_bch);
		$eth = $this->adjustment($ticker_eth);

		return array($btc, $bch, $eth);
=======
		$ticker = $this->bitflyer();

		// bitflyerで取得出来なかった場合coincheckで取得
		if (!isset($ticker['bid'])) {
			$ticker = $this->coincheck();
		}
		return $this->adjustment($ticker);
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
	}

	/**
	 * ticker取得
	 */
	public function getDataDb() {
		$this->CI->session->keep_flashdata(array('type', 'price', 'amount', 'row_price'));
		
		// ticker取得
		$params = array(
			'limit' => 1,
			'order_by' => 'id DESC'
		);
		$ticker = $this->CI->lib_t_btc_ticker->getData($params);

		if (!$ticker) return array();
		// 不要な情報を削除
		unset($ticker[0]['exchange']);
		return $ticker[0];
	}

	/**
	 * ticker取得
	 */
	public function save() {
		// ticker取得
<<<<<<< HEAD
		$tickers = $this->getData();
=======
		$ticker = $this->getData();
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba

		// 実行時間計測
		$this->CI->benchmark->mark('code_start');
		try {
			// トランザクションの実行
			$this->CI->db->trans_start();
<<<<<<< HEAD
			// BTC登録実行
			$this->CI->lib_t_btc_ticker->insert($tickers[0]);
			// BCH登録実行
			$this->CI->lib_t_bch_ticker->insert($tickers[1]);
			// ETH登録実行
			$this->CI->lib_t_eth_ticker->insert($tickers[2]);
=======
			// 登録実行
			$this->CI->lib_t_btc_ticker->insert($ticker);
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba

			$this->CI->db->trans_complete();
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$result = $this->CI->lib_t_error_log->insert($e, $benchmark);
		}


<<<<<<< HEAD
		return $tickers;
=======
		return $ticker;
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
	}

	/*
	 * Ticker取得
	 */
	public function coincheck($pair='btc_jpy') {
		$path = '/api/ticker';
		$query = '?pair='.$pair;
		$url = 'https://coincheck.com' . $path . $query;
		$json  = json_decode(file_get_contents($url));
		$return = array(
			'exchange'   => 'coincheck',
			'bid'        => round($json->bid),
			'ask'        => round($json->ask),
			'day_volume' => round($json->volume)
		);
		
		return $return;
	}


	/*
	 * Ticker情報取得
	 */
	public function bitflyer($pair='BTC_JPY') {
		$path   = '/v1/ticker';
		$query = '?product_code='.$pair;
		$url = 'https://api.bitflyer.jp' . $path . $query;
		$json  = json_decode(file_get_contents($url));
		if (!$json) return false;
		$return = array(
			'exchange'   => 'bitflyer',
<<<<<<< HEAD
			'currency'	=> 'btc',
=======
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
			'bid'        => round($json->best_bid),
			'ask'        => round($json->best_ask),
			'volume'     => round($json->volume_by_product),
			'day_volume' => round($json->volume)
		);
		return $return;
	}
<<<<<<< HEAD
	
	public function bitflyer_bch($pair='BCH_BTC') {
		$path   = '/v1/ticker';
		$query = '?product_code='.$pair;
		$url = 'https://api.bitflyer.jp' . $path . $query;
		$json  = json_decode(file_get_contents($url));
		if (!$json) return false;
		$return = array(
			'exchange'   => 'bitflyer',
			'currency'	=> 'bch',
			'bid'        => $json->best_bid,
			'ask'        => $json->best_ask,
			'volume'     => round($json->volume_by_product),
			'day_volume' => round($json->volume)
		);
		return $return;
	}

	public function bitflyer_eth($pair='ETH_BTC') {
		$path   = '/v1/ticker';
		$query = '?product_code='.$pair;
		$url = 'https://api.bitflyer.jp' . $path . $query;
		$json  = json_decode(file_get_contents($url));
		if (!$json) return false;
		$return = array(
			'exchange'   => 'bitflyer',
			'currency'	=> 'eth',
			'bid'        => $json->best_bid,
			'ask'        => $json->best_ask,
			'volume'     => round($json->volume_by_product),
			'day_volume' => round($json->volume)
		);
		return $return;
	}
=======
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba

	/**
	 * 販売価格調整
	 * 購入時：￥300,000 ＋ 2%(￥6,000) ＝ ￥306,000
	 * 売却時：￥300,000 － 2%(￥6,000) ＝ ￥294,000
	 */
	public function adjustment($params) {
		$api_id = $this->api_id[$params['exchange']];
		$sql    = array('where' => 'm_currency_id = 2 AND ticker_api_id = '.$api_id);
		$data   = $this->CI->lib_m_ticker_adjustment->getData($sql);

		$percent = bcdiv($data[0]['adjustment'], 100);
		$bid_add = bcmul($params['bid'], $percent);
		$ask_add = bcmul($params['ask'], $percent);
		$params['adj_bid'] = floor(bcsub($params['bid'], $bid_add));
		$params['adj_ask'] = floor(bcadd($params['ask'], $ask_add));

		return $params;
	}


}
