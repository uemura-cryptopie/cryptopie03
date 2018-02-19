<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('model/lib_t_shop_history');
		$this->load->library('controller/lib_mypage');
		$this->load->library('controller/lib_shop');
		$this->load->library('basic/lib_ticker');
		$this->load->model('t_user');
		$this->load->model('t_corp');
	}

	/**
	 * トップ
	 */
	public function index()
	{
		$this->is_login();
		
		// Get data user
		$id = $this->session->userdata('user_id');
		$loginId = $this->session->userdata('login_id');
		$email = $this->session->userdata('email');
		
		if (empty($id) || empty($loginId)) {
				redirect(base_url());
		}
		
		// check security
		$check = null;
		if ($this->session->userdata('user_type') === 1) {
				$check = $this->t_user->checkSecurity($loginId, $id);
		} else if ($this->session->userdata('user_type') === 2) {
				$check = $this->t_corp->checkSecurity($loginId, $id);
		}
		
		if(empty($check)) {
				redirect(base_url());
		}
		// ticker取得
		$tickers = $this->tickerCron();

		//$this->balance();

		// ticker保存機能
		$data = $this->lib_mypage->indexData();
		$this->assign('sidebarActive', 'home');
		$this->assign('history', $data['history']);
		$this->assign('currency', $data['currency']);
		$this->assign('is_upload', $this->lib_mypage->is_upload());
		$this->assign('bid', number_format($tickers[0]['bid']));
		$this->assign('ask', number_format($tickers[0]['ask']));
		$this->assign('bid_bch', $tickers[1]['bid']);
		$this->assign('ask_bch', $tickers[1]['ask']);
		$this->assign('bid_eth', $tickers[2]['bid']);
		$this->assign('ask_eth', $tickers[2]['ask']);

=======
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
		$this->tpl('mypage/index.tpl');
	}

	/**
	 * トップ（datatable）
	 */
	public function ajax()
	{
		$this->is_login();
		echo $this->lib_t_shop_history->getDataAjax();
	}
	
	/**
	 * ticker
	 */
	public function ticker()
	{
		$this->is_login();
		echo json_encode($this->lib_ticker->getDataDb());
	}
	
	/**
	 * ticker
	 */
	public function tickerCron()
	{
<<<<<<< HEAD
		return $this->lib_ticker->save();
=======
		$this->lib_ticker->save();
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
	}
	
	
}
