<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_shop {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_balance');
		$this->CI->load->library('model/lib_t_shop_history');
		$this->CI->load->library('model/lib_t_btc_ticker');
		$this->CI->load->library('model/lib_t_error_log');
	}

	public function trade_exec($params) {
		// 実行時間計測
		$this->CI->benchmark->mark('code_start');

		// POST・LOGIN 情報取得
		$login  = $this->CI->session->userdata();

		try {
			// トランザクションの実行
			$this->CI->db->trans_start();

			$update_params = $this->make_params($params);
			// 販売所 取引履歴登録
			$result = $this->CI->lib_t_shop_history->insert($update_params);
			// 残高更新
			// 売買情報から通貨ごとの残高を更新
			foreach ($update_params as $balance) {
				$where = array(
					'user_id'       => $login['user_id'],
					'user_type'     => $login['user_type'],
					'm_currency_id' => $balance['m_currency_id']
				);
				$this->CI->lib_t_balance->update($balance, $where);
			}
			$this->CI->db->trans_complete();

			// 実行時間計測 終了
			$this->CI->benchmark->mark('code_end');
		} catch (UserException $e) {
			$this->CI->db->trans_complete();
			$benchmark = $this->CI->benchmark->elapsed_time('code_start', 'code_end');
			$this->CI->lib_t_error_log->insert($e, $benchmark);
		}
		return true;
	}

	/*
	 * 購入・売却価格が正しいかチェック
	 */
	public function checkPrice($params, $limit=2) {
		if ($params['price'] == 0) {
			return array('result' => false, 'code' => 501);
		}
		// 調整済み価格と比較
		$type = $this->CI->trade_type[$params['type']];  // asd or bid
		$price_list = $this->CI->lib_t_btc_ticker->getDataNew($limit);
		foreach ($price_list as $value) {
			if ($params['price'] == $value['adj_' . $type]) {
				$this->CI->session->set_flashdata(array('row_price' => $value[$type]));
				return array('result' => true, 'code' => NULL);
			}
		}
		return array('result' => false, 'code' => 201);
	}

	/*
	 * 残高が足りているかチェック
	 */
	public function checkAmount($params) {
		// 注文数が0
		if ($params['amount'] <= 0){
			return array('result' => false, 'code' => 101);
		}
		// 最低売買価格チェック（￥100）
		$trade = bcmul($params['price'], $params['amount']);
		if ($trade <= 100) {
			return array('result' => false, 'code' => 601);
		}
		// 残高取得
		$balance = $this->CI->lib_t_balance->getBalance(true);
		$update_params = $this->make_params($params);
		foreach ($update_params as $value) {
			$amount = bcadd($balance[$value['m_currency_id']], $value['amount']);
			if ($amount < 0) {
				// 残高不足
				return array('result' => false, 'code' => 301);
			}
		}
		return array('result' => true, 'code' => NULL);
	}

	/*
	 * 残高更新用 配列作成
	 */
	public function make_params($params) {
		// TODO
		// 現在は日本円 <=> BTCのみ対応
		// 仮想通貨どうしの売買の場合ロジック変更の必要あり

		// 数量計算
		if ($params['type'] == 1) {
			$buy_amount  = $params['amount'];
			$sell_amount = floor(bcmul($params['price'], $params['amount']));
		} else {
			$buy_amount  = floor(bcmul($params['price'], $params['amount']));
			$sell_amount = $params['amount'];
		}

		// パラメータ作成
		$balance[] = array(
			'type'          => $params['type'], // 受け取る通貨
			'm_currency_id' => ($params['type'] == 1) ? 2 : 1,
			'row_price'     => (isset($params['row_price'])) ? $params['row_price'] : NULL,
			'price'         => $params['price'],
			'amount'        => $buy_amount
		);

		$balance[] = array(
			'type'          => $params['type'], // 受け取る通貨
			'm_currency_id' => ($params['type'] == 1) ? 1 : 2,
			'row_price'     => (isset($params['row_price'])) ? $params['row_price'] : NULL,
			'price'         => $params['price'],
			'amount'        => bcmul($sell_amount, -1)
		);

		return $balance;
	}

	/*
	 * 売買価格をSESSIONにセット
	 */
	public function set_params() {
		$post = $this->CI->input->post();
		$this->CI->session->set_flashdata($post);
	}
}
