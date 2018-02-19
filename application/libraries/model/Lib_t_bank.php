<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_bank {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_bank');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_bank->getList($params);
	}

	
	// INSERT
	public function insert($params) {
		$this->CI->load->library('form_validation');
		
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$login = $this->CI->session->userdata();
				$query_params = array(
					'user_type'      => $login['user_type'],
					'user_id'        => $login['user_id'],
					'bankcode'       => $tryArg['bankcode'],
					'bankname'       => $tryArg['bankname'],
					'branchcode'     => $tryArg['branchcode'],
					'branchname'     => $tryArg['branchname'],
					'accountsubtype' => $tryArg['accountsubtype'],
					'acnumber'       => $tryArg['acnumber'],
					'ackana'         => $this->CI->form_validation->convert($tryArg['ackana'], 'single_katakana')
				);
				$this->CI->t_bank->insert($query_params);
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => $params,
				'catch' => null
			)
		);
		
	}
	
	
	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_bank->update($params, $where);
	}


}