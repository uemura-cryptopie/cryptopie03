<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_bank {


	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('model/lib_t_error_log');
		$this->CI->load->library('model/lib_m_bank');
		$this->CI->load->library('model/lib_t_bank');
	}


	public function getBankList() {
		$this->CI->lib_user_function->userTrycatch(
			function($tryArg){ // try
				$login = $this->CI->session->userdata();
				$query_params = array('where' => 'user_id = '.$login['user_id'].' AND user_type = '.$login['user_type']);
				$this->result = $this->CI->lib_t_bank->getData($query_params);
			},
			function($tryCatch){ // catch
				
			},
			array(
				'try'   => null,
				'catch' => null
			)
		);
		return $this->result;
	}
}
