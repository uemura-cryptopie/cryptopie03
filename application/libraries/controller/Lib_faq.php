<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_faq {


	function __construct()
	{
		$this->CI =& get_instance();
	}


	/**
	 * 一覧取得
	 */
	public function getList() {
		$this->CI->load->model('t_faq');
		$params = array('where' => 'deleted_flag = 0');

		return $this->CI->t_faq->getDataList($params);
	}
}
