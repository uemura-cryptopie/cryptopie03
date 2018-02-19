<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_shop_history {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_shop_history');
		$this->CI->load->library('basic/lib_string');
		$this->CI->load->library('support/datatables');
		$this->CI->load->library('model/lib_m_currency');
		$this->CI->load->library('model/lib_t_btc_ticker');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_shop_history->getList($params);
	}

	/*
	 * SELECT(ajax)
	 * https://github.com/IgnitedDatatables/Ignited-Datatables/wiki/Method-Chaining
	 */
	public function getDataAjax($params=array()) {
		$post = $this->CI->input->post();
		$user_info = $this->CI->session->userdata;
		$currency = $this->CI->lib_m_currency->getData();
		$this->CI->datatables
			->select(
					'DATE_FORMAT(t_shop_history.inserted_at, "%Y年%m月%d日 %H:%i:%s"),
					t_shop_history.type,
					t_shop_history.buy_jpy_price,
					t_shop_history.buy_currency_id,
					t_shop_history.buy_amount,
					t_shop_history.sell_currency_id,
					t_shop_history.sell_amount,
					t_shop_history.fee'
				)
			->from('t_shop_history')
			->where('t_shop_history.user_id', $user_info['user_id'])
			->where('t_shop_history.user_type', $user_info['user_type'])
			->order_by('t_shop_history.id', 'DESC')
			->join('m_currency AS m_currency1', 't_shop_history.buy_currency_id = m_currency1.id')
			->select('m_currency1.name AS buy_currency_id')
			->join('m_currency AS m_currency2', 't_shop_history.sell_currency_id = m_currency2.id')
			->select('m_currency2.name AS sell_currency_id')
			->join('m_trade_string', 't_shop_history.type = m_trade_string.id')
			->select('m_trade_string.name AS type');
			$result = json_decode($this->CI->datatables->generate(), true);
			// フォーマット
			$ajax = array();
			foreach ($result['data'] as $key => $value) {
				// echo "<pre>";var_dump($value);echo __LINE__.'行目';echo "</pre><br>";
				$ajax[$key][0] = $value[0]; // inserted_at
				$ajax[$key][1] = $value[1]; // type
				$ajax[$key][2] = $this->CI->lib_string->myNumberFormat($value[2]); // price
				if ($value[1] == '買い') {
					// 買い
					$ajax[$key][3] = $this->CI->lib_string->myNumberFormat($value[4]); // BTC数量
					$ajax[$key][4] = $this->CI->lib_string->myNumberFormat($value[6]); // JPY数量
				} else {
					$ajax[$key][3] = $this->CI->lib_string->myNumberFormat($value[6]); // BTC数量
					$ajax[$key][4] = $this->CI->lib_string->myNumberFormat($value[4]); // JPY数量
				}
				$ajax[$key][5] = $this->CI->lib_string->myNumberFormat($value[7]); // fee
			}
			$result['data'] = $ajax;
			return json_encode($result);
	}

	// INSERT
	// TODO
	// 現在は日本円 <=> BTCのみ対応
	// 仮想通貨どうしの売買の場合ロジック変更の必要あり
	public function insert($params) {
		$login  = $this->CI->session->userdata();

		$query_params = array(
			'order_id'         => '',
			'user_type'        => $login['user_type'],
			'user_id'          => $login['user_id'],
			'buy_currency_id'  => $params[0]['m_currency_id'],
			'sell_currency_id' => $params[1]['m_currency_id'],
			'type'             => $params[0]['type'],
			'price'            => $params[0]['row_price'],
			'buy_jpy_price'    => $params[0]['price'],
			'buy_amount'       => $params[0]['amount'],
			'sell_amount'      => $params[1]['amount'],
			'fee_currency'     => $params[1]['m_currency_id'],
			'fee'              => 0,
			'status'           => 1
		);
		// DB登録実行
		return $this->CI->t_shop_history->insert($query_params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_shop_history->update($params, $where);
	}

}