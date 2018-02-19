<?php
class Log_login extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	/**
	 * Check data exists in database
	 * 
	 */
	public function checkDuplicate($data, $isData = false) {
		return $this->get_record($data, $isData);
	}

	/**
	 * Insert
	 * 
	 */
	public function insert($data) {
		return $this->execute_insert($data);
	}

	/**
	 * Update
	 */
	public function update($data, $where) {
		return $this->execute_update($data, $where);
	}


	/**
	 * Insert data use for authentication 2 factor
	 */
	public function insertData($data) {
		$email = isset($data['mail']) ? $data['mail'] : null;
		$dataCheck = array(
			'email' => $email,
		);

		$isDuplicateData = $this->checkDuplicate($dataCheck);

		$name = null;
		if (isset($data['family_name']) && isset($data['first_name'])) {
			$name = $data['family_name'] . ' ' . $data['first_name'];
		} else if (isset($data['corp_name'])) {
			$name = $data['corp_name'];
		}
		
		$dataUpsert = array(
			'user_id' => isset($data['id']) ? $data['id'] : null,
			'email'   => $email,
			'name'    => $name,
		);
		
		$response = null;
		if (!empty($isDuplicateData)) {
			// Update data
			$dataUpsert['updated_at'] = date('Y-m-d H:i:s');
			$where = array('email' => $email);
			$this->update($dataUpsert, $where);
			$response = $this->getLoginId($email);
		} else {
			// Add new data
			$dataUpsert['login_id']         = $this->common->randomNumber();
			$dataUpsert['ng_flag']          = 0;
			$dataUpsert['log_time']         = null;
			$dataUpsert['login_time']       = date('Y-m-d H:i:s');
			$dataUpsert['created_at']       = date('Y-m-d H:i:s');
			$this->insert($dataUpsert);
			$response = $dataUpsert['login_id'];
		}

		return $response;
	}

	/**
	 * Check data is locked in 30 minutes
	 */
	public function checkDataIsLocked($data) {
		$dataCheck = array(
			'user_id' => isset($data['id']) ? $data['id'] : null,
			'email'   => isset($data['mail']) ? $data['mail'] : null,
			'ng_flag' => 1,
		);

		$getDataCheck = $this->checkDuplicate($dataCheck, true);
		if (!empty($getDataCheck[0]['log_time'])) {
			$log_time = $getDataCheck[0]['log_time'];
			if (time() < strtotime($log_time)) {
				return true;
			} else {
				$this->unlockLogTimeData($getDataCheck[0]['login_id']);
			}
		}
		
		return false;
	}

	/**
	 * Unlock log time data
	 */
	public function unlockLogTimeData($login_id) {
		$data = array(
			'log_time'   => null,
			'ng_flag'    => 0,
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		$where = array(
			'login_id' => $login_id
		);
		
		$this->update($data, $where);
	}

	/**
	 * Get google auth code by login id
	 */
	public function getGoogleAuthCode($login_id) {
		$data = $this->checkDuplicate(array('login_id' => $login_id), true);
		if (!empty($data[0]['google_auth_code'])) {
			return $data[0]['google_auth_code'];
		}
		return null;
	}

	/**
	 * Get log time by login id
	 */
	public function getLogTime($login_id) {
		$data = $this->checkDuplicate(array('login_id' => $login_id), true);
		if (!empty($data[0]['log_time'])) {
			return $data[0]['log_time'];
		}
		return null;
	}

	/**
	 * Get login id by email
	 */
	public function getLoginId($email) {
		$data = $this->checkDuplicate(array('email' => $email), true);
		if (!empty($data[0]['login_id'])) {
			return $data[0]['login_id'];
		}
		return null;
	}

	/**
	 * Check number access google auth
	 */
	public function numberAccessGoogleAuth() {
		$this->load->library('session');
		$google_number_auth = 0;
		
		if ($this->session->has_userdata('google_number_auth')) {
			if ($this->session->userdata('google_number_auth') <= 5) {
				$google_number_auth = $this->session->userdata('google_number_auth') + 1;
			} else {
				$google_number_auth = $this->session->userdata('google_number_auth');
			}
		} else {
			$google_number_auth = 1;
		}

		$this->session->set_userdata('google_number_auth', $google_number_auth);
	}

	/**
	 * Reset number access google auth
	 */
	public function resetNumberAccessGoogleAuth($flg = false) {
		$this->load->library('session');
		if (
			($this->session->has_userdata('google_number_auth') && $this->session->userdata('google_number_auth') >= 5) ||
			$flg == true
		) {
			$this->session->set_userdata('google_number_auth', 0);
		}
	}

	/**
	 * Log time of log login
	 */
	public function logTimeLogLogin($login_id) {
		$this->load->library('basic/common');
		
		$data = array(
			'log_time'   => $this->common->addMoreMinutes(),
			'ng_flag'    => 1,
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		$where = array(
			'login_id' => $login_id
		);
		
		$this->update($data, $where);
	}

	/**
	 * Add session information for log login
	 */
	public function sessionInfoLogLogin($login_id = null) {
		if (!empty($login_id)) {
			$data = $this->checkDuplicate(array('login_id' => $login_id), true);

			if (!empty($data[0])) {
				$this->load->library('basic/common');
				$this->load->library('session');
				
				$data       = $data[0];
				$login_time = isset($data['login_time']) ? $data['login_time'] : null;
				$user_id    = isset($data['user_id']) ? $data['user_id'] : null;
				$name       = isset($data['name']) ? $data['name'] : null;
				$status1    = isset($data['status1']) ? $data['status1'] : null;
				$status2    = isset($data['status2']) ? $data['status2'] : null;
				$email      = isset($data['email']) ? $data['email'] : null;
				
				$userOrCorp = $this->common->checkIsUserOrCorp($email);
				$type       = isset($userOrCorp['screen']) ? $userOrCorp['screen'] : '';

				// 追加コード
				$user_type  = ($userOrCorp['screen'] == 'user') ? 1 : 2;
				$this->session->set_userdata('user_type', $user_type);
				// ステータス取得
				$this->load->library('model/lib_t_user_status');
				$status_query = array('where' => 'user_type = '.$user_type.' AND user_id = '.$user_id);
				$user_status = $this->lib_t_user_status->getData($status_query);
				$this->session->set_userdata('status', $user_status[0]);
				$this->session->set_userdata('timestamp', time());


				// Add session information log login
				$this->session->set_userdata('login_id', $login_id);
				$this->session->set_userdata('login_time', $login_time);
				$this->session->set_userdata('user_id', $user_id);
				$this->session->set_userdata('name', $name);
				$this->session->set_userdata('status1', $status1);
				$this->session->set_userdata('status2', $status2);
				$this->session->set_userdata('email', $email);

				// type: user or corp
				$this->session->set_userdata('type', $type);
			}
		}
	}

	/**
	 * Update status1, status2 equal 1 or 2
	 * 成功=1, 失敗=2
	 * success=1, fail=2
	 */
	public function updateStatusLogLogin($login_id, $status_number, $status_position) {
		if (in_array($status_number, array(1, 2))) {
			// success
			$this->log_login->update(array('status' . $status_position => $status_number), array('login_id' => $login_id));
		}
	}

	/**
	 * Get status1 by login id
	 */
	public function getStatus1($login_id) {
		$data = $this->checkDuplicate(array('login_id' => $login_id), true);
		if (!empty($data[0]['status1'])) {
			return $data[0]['status1'];
		}
		return null;
	}

	/**
	 * Get status2 by login id
	 */
	public function getStatus2($login_id) {
		$data = $this->checkDuplicate(array('login_id' => $login_id), true);
		if (!empty($data[0]['status2'])) {
			return $data[0]['status2'];
		}
		return null;
	}

	/**
	 * Redirect to my page follow by status1 and status2
	 */
	public function redirectToMyPage() {
		$this->load->library('session');
		$login_id      = $this->session->userdata('login_id'); 
		$status1       = $this->getStatus1($login_id);
		$status2       = $this->getStatus2($login_id);
		$type          = $this->session->userdata('type');
		$email         = $this->session->userdata('email');
		$userOrCorp    = $this->common->checkIsUserOrCorp($email);
		$setting_login = isset($userOrCorp['setting_login']) ? $userOrCorp['setting_login'] : 0;
		if (($status1 == 1 && $status2 == 1) || empty($setting_login)) {
			if (!empty($type)) {
				redirect(base_url() . 'mypage/');
			}
		}
	}

	/**
	 * Update information log login
	 */
	public function updateInfomationLogLogin() {
		$this->load->library('session');
		$login_id = $this->session->userdata('login_id');
		$data = array(
			'status1' => null,
			'status2' => null,
			'log_time' => null,
			'updated_at' => date('Y-m-d H:i:s'),
			'ng_flag' => 0
		);
		
		$where = array(
			'login_id' => $login_id
		);
		$result = $this->log_login->update($data, $where);
		return $result;
	}

	/**
	 * Update infomation log login when success log auth code
	 */
	public function updateInfoWhenSuccessAuthCode() {
		$this->load->library('session');
		$login_id = $this->session->userdata('login_id');
		$data = array(
			'status1' => 1,
			'status2' => 1,
			'log_time' => null,
			'updated_at' => date('Y-m-d H:i:s'),
			'ng_flag' => 0
		);
		
		$where = array(
			'login_id' => $login_id
		);
		$result = $this->log_login->update($data, $where);
		return $result;
	}

	/**
	 * Destroy all session when logout
	 */
	public function resetSessionInfoLogLogin() {
		if ($this->updateInfomationLogLogin()) {
			$this->load->library('session');
			$this->session->sess_destroy();
		}
	}
}