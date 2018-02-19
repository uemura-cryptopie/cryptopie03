<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_balance {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_balance');
		$this->CI->load->library('model/lib_m_currency');
		$this->CI->load->library('basic/lib_string');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_balance->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		return $this->CI->t_balance->insert($params);
	}

	// INSERT
	public function insertFirst($user_type, $user_id) {
		// DB登録実行
		$params = array(
			'user_type'     => $user_type,
			'user_id'       => $user_id,
			'm_currency_id' => 1,
			'amount'        => 0,
		);
		$this->CI->t_balance->insert($params);
		$params = array(
			'user_type'     => $user_type,
			'user_id'       => $user_id,
			'm_currency_id' => 2,
			'amount'        => 0,
		);
		$this->CI->t_balance->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$balance = $this->getBalance($int_key=true, $tryArg[1]);
				// 通貨数量の+-チェック
				$tryArg[0]['amount'] = bcadd($balance[$tryArg[0]['m_currency_id']], $tryArg[0]['amount']);
				unset($tryArg[0]['type'], $tryArg[0]['price'], $tryArg[0]['row_price'], $tryArg[0]['m_currency_id']);
				// DB登録実行
				$this->CI->t_balance->update($tryArg[0], $tryArg[1]);
			},
			function($tryCatch){ // catch
			},
			array(
				'try'   => array($params, $where),
				'catch' => null
			)
		);
	}

	/**
	 * 残高取得
	 */
	public function getBalance($int_key=false, $params=array()) {
		$balance  = array();
		if (empty($params)) {
			$user = $this->CI->session->userdata();
		} else {
			$user = $params;
		}
		
		if (empty($user['user_id']) || empty($user['user_type'])) return array();
		$currency = $this->CI->lib_m_currency->getData();
		// 残高情報取得
		$params = array('where' => 'user_id = '.$user['user_id'].' AND user_type = '.$user['user_type']);
		$result = $this->getData($params);
		if (empty($result)) return array();

		// 通貨ごとに格納
		foreach ($result as $value) {
			$currency_id = $value['m_currency_id'];
			if ($int_key) {
				$balance[$currency_id] = (float) $value['amount'];
			} else {
				$balance[$currency[$currency_id]] = (float) $value['amount'];
			}
		}

		return $balance;
	}

	/**
	 * 残高取得（出力用）
	 */
	public function getBalanceView() {
		$balance = $this->getBalance();
		foreach ($balance as $currency => $amount) {
			if ($currency == 'JPY') $balance[$currency] = floor($amount);
			if ($currency == 'BTC') $balance[$currency] = $this->CI->lib_string->btcFormatView($amount);
		}
		return $balance;
	}

}