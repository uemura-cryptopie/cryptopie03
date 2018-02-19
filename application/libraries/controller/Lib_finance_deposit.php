<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_finance_deposit {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_jpy_deposit_history');
		$this->CI->load->library('controller/lib_mypage');
	}

	// INDEXに必要な情報を取得
	public function indexData() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$this->params['history'] = $this->CI->lib_t_jpy_deposit_history->getHistoryView();
				$this->params['payment']    = $this->getPaymentIdView();
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => null,
				'catch' => null
			)
		);
		return $this->params;
	}

	public function getPaymentIdView() {
		$user = $this->CI->lib_mypage->getUserData();
		if (isset($user['family_name_kana'])) {
			$payment['name'] = mb_convert_kana($user['family_name_kana'].$user['first_name_kana'], 'k');
		} else {
			$payment['name'] = mb_convert_kana($user['corp_name_kana'], 'k');
		}
		
		$payment['payment_id'] = $user['payment_id'];
		return $payment;
	}

}
