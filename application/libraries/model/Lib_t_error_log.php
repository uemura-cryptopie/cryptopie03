<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_t_error_log {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('t_error_log');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->t_error_log->getList($params);
	}

	// INSERT
	public function insert($error, $benchmark) {
		$post    = json_encode($this->CI->input->post());
		$get     = json_encode($this->CI->input->get());
		$session = json_encode($this->CI->session->userdata());
		$queries = json_encode($error->queries);
		$login   = $this->CI->session->userdata();
		$params  = array(
			'user_type'      => (isset($login['user_type'])) ? $login['user_type'] : NULL,
			'user_id'        => (isset($login['user_type'])) ? $login['user_id'] : NULL,
			'url'            => current_url() . '/',
			'controller'     => $this->CI->controller,
			'action'         => $this->CI->action,
			'benchmark'      => $benchmark,
			'post_params'    => $post,
			'get_params'     => $get,
			'session_params' => $session,
			'queries'        => $queries,
			'error'          => $error->errorMessage
		);
		// DB登録実行
		return $this->CI->t_error_log->insert($params);
	}

	// UPDATE
	public function update($params, $where) {
		// DB登録実行
		return $this->CI->t_error_log->update($params, $where);
	}


}