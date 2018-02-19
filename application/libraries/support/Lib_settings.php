<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_settings {
	function __construct()
	{
		$this->CI =& get_instance();
	}


	public function set_url()
	{
		// 実行中のcontroller&action取得
		$this->CI->controller = str_replace('_', '-', $this->CI->router->class);
		$this->CI->action     = str_replace('_', '-', $this->CI->router->method);
		$this->CI->smarty->assign('controller', $this->CI->controller);
		$this->CI->smarty->assign('action', $this->CI->action);

		$this->CI->smarty->assign('common', 'common/');
		$this->CI->smarty->assign('base_url' , base_url());
		$this->CI->smarty->assign('uri_string' , uri_string());

		// JS,CSS URL
		$this->CI->smarty->assign('css_url' , base_url() . 'css/');
		$this->CI->smarty->assign('js_url'  , base_url() . 'js/');
		// IMAGE URL
		$this->CI->imgUrl = base_url() . 'img/';
		$this->CI->smarty->assign('img_url' , $this->CI->imgUrl);
		// IMAGE PATH
		$this->imgPath = FCPATH . 'img/';

		// trade_type
		$this->CI->trade_type   = array(1 => 'ask', 2 => 'bid');
		// 承認状態
		$this->CI->approve_type = array('未承認', '承認');
		// 口座区分
		$this->CI->accountsubtype = array(1 => '普通', 2 => '当座');
		$this->CI->smarty->assign('accountsubtype' , $this->CI->accountsubtype);
		// 承認状態
		$this->CI->withdrawal_type = array('手続中', '手続完了', '失敗');
		// 承認状態
		$this->CI->deposit_type = array('手続中', '手続完了', '失敗');
		// ROOT URL
		$this->basePath = FCPATH;

	}


}
