<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_bch_ticker {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_bch_ticker');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_bch_ticker->getList($params);
	}

	// SELECT
	public function getDataNew($limit=2, $start=0) {
		// 残高取得
		$params = array(
			'limit'    => "{$limit}, {$start}",
			'order_by' => 'id DESC'
		);
		return $this->CI->t_bch_ticker->getList($params);
	}

	// INSERT
	public function insert($params) {
		// DB登録実行
		if($params['currency'] == 'bch'){
			unset($params['currency']);
			return $this->CI->t_bch_ticker->insert($params);
		}elseif($params['currency'] == 'bch'){
			$this->CI->load->model('t_bch_ticker');
			unset($params['currency']);
			return $this->CI->t_bch_ticker->insert($params);
		}
		
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_bch_ticker->update($params, $where);
	}


}