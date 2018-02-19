<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->library('model/lib_t_user_status');
		$this->load->library('basic/mail');
		$this->load->library('basic/common');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('session');
		$this->load->model('log_login');
	}

	/**
	 * Index
	 */
	public function index()
	{
		// インデックスにアクセスされたらリダイレクト
		redirect(base_url() . "mypage/");
	}

	/**
	 * 本人確認書類のアップロード
	 */
	public function document_upload()
	{
		$this->uploadImage();
	}

	/**
	 * 本人確認書類のアップロード
	 */
	public function document_upload_corp()
	{
		$this->uploadImage();
	}

	/**
	 * Upload image of user or corp
	 */
	private function uploadImage() {
		$screen = $this->session->userdata('type');
		if ($screen == 'user') {
			$this->load->model('t_user');
			$path_folder_upload = PATH_UPLOAD_USER;
			$template = 'mail_document_upload_complete.tpl';
		} else if ($screen == 'corp') {
			$this->load->model('t_corp');
			$path_folder_upload = PATH_UPLOAD_CORP;
			$template = 'mail_document_upload_corp_complete.tpl';
		}

		// Get data user
		$id = $this->session->userdata('user_id');
		$loginId = $this->session->userdata('login_id');
		$email = $this->session->userdata('email');

		if (empty($id) || empty($loginId)) {
			redirect(base_url());
		}

		// check security
		$check = null;
		if ($screen == 'user') {
			$check = $this->t_user->checkSecurity($loginId, $id);
		} else if ($screen == 'corp') {
			$check = $this->t_corp->checkSecurity($loginId, $id);
		}
		
		if(empty($check)) {
			redirect(base_url());
		}

		// Validate
		$this->form_validation->set_error_delimiters('<div class="error_textBox">', '</div>');
		$this->form_validation->set_rules('totalfile', '', 'callback_checkTotalSizeImages');
		if ($screen == 'corp') {
			$this->form_validation->set_rules('file_certificate', '登記事項証明書', 'callback_validate_image[file_certificate]');
		}
		$this->form_validation->set_rules('image_id', 'IDセルフィー', 'callback_validate_image[image_id]');
		$this->form_validation->set_rules('image_front', '本人確認書類 表面', 'callback_validate_image[image_front]');
		$this->form_validation->set_rules('image_back', '本人確認書類 裏面', 'callback_validate_image[image_back]');

		// Validate array file1 , file2 ...
		if(!empty($this->_getImageArr())){
			foreach ($this->_getImageArr() as $nameField) {
				$this->form_validation->set_rules($nameField, '本人確認書類', 'callback_validate_image['.$nameField.']');
			}
		}

		if ($this->form_validation->run()) {
			// Create foder upload image by ID 
			$path = $path_folder_upload.$id;
			$this->_createFoderUploadByID($path);
			
			// Set config up load
			$config = array();
			$config['upload_path']   = $path;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = SIZE_IMAGE;

			$dataUpdate = array();
			// File certificate
			if ($screen == 'corp' && !empty($_FILES['file_certificate']['name'])) {
				$file_certificate = $this->_uploadImage($config, 'file_certificate');
				$dataUpdate['file_certificate'] = is_array($file_certificate) ? $file_certificate['file_name'] : '';
			}
			
			// Image id
			if (!empty($_FILES['image_id']['name'])) {
				$image_id = $this->_uploadImage($config, 'image_id');
				$dataUpdate['image_id'] = is_array($image_id) ? $image_id['file_name'] : '';
			}
			
			// Image front
			if (!empty($_FILES['image_front']['name'])) {
				$image_front = $this->_uploadImage($config, 'image_front');
				$dataUpdate['image_front'] = is_array($image_front) ? $image_front['file_name'] : '';
			}

			// Image back            
			if (!empty($_FILES['image_back']['name'])) {
				$image_back  = $this->_uploadImage($config, 'image_back');
				$dataUpdate['image_back'] = is_array($image_back) ? $image_back['file_name'] : '';
			}

			$where = 'id = '.$id;
			$check = false;
			$dataCheck = array();
			if ($screen == 'user') {
				$dataCheck = $this->t_user->checkDuplicate($where, true);
			} else if ($screen == 'corp') {
				$dataCheck = $this->t_corp->checkDuplicate($where, true);
			}

			$dataListImage = isset($dataCheck[0]['list_image']) ? $dataCheck[0]['list_image'] : array();
			$buildListImage = array();
			if (!empty($dataListImage)) {
				$buildListImage = $this->buildListImage(explode(',', $dataListImage));
			}
			$listOldImage = array();

			if (empty($buildListImage)) {
				// List image
				$list_file = $this->_uploadListImage($config);
				if(is_array($list_file)) {
					$list_image = implode(',', $list_file);
				}

				// if have image 本人確認書類 
				if(!empty($list_image)) {
					$dataUpdate['list_image'] = $list_image;
				}
			} else {
				$files = $_FILES;
				if (isset($files['file_certificate'])) unset($files['file_certificate']);
				if (isset($files['image_id'])) unset($files['image_id']);
				if (isset($files['image_front'])) unset($files['image_front']);
				if (isset($files['image_back'])) unset($files['image_back']);

				foreach ($files as $key => $file) {
					if (!empty($file['name']) && !empty($file['size'])) {
						if (in_array($key, array_keys($buildListImage))) {
							$listOldImage[$key] = $buildListImage[$key];
						}
						$generateFilename = $this->_uploadImage($config, $key);
						$file_name = is_array($generateFilename) ? $generateFilename['file_name'] : '';
						$buildListImage[$key] = $file_name;
					}
				}

				$dataUpdate['list_image'] = implode(',', $buildListImage);
			}

			if ($screen == 'user' && !empty($dataUpdate)) {
				$this->t_user->update($dataUpdate, $where);
			} else if ($screen == 'corp' && !empty($dataUpdate)) {
				$this->t_corp->update($dataUpdate, $where);
			}

			// 追加コード
			// ステータスを更新(t_user_status)
			$this->lib_t_user_status->updateIdStatus();
				
			if (!empty($dataCheck[0]['id'])) {
				// Remove old file certificate
				if ($screen == 'corp' && !empty($_FILES['file_certificate']['name'])) {
					$this->_removeImage($path, $dataCheck[0]['file_certificate']);
				}
				
				// Remove old image id
				if (!empty($_FILES['image_id']['name'])) {
					$this->_removeImage($path, $dataCheck[0]['image_id']);
				}
				
				// Remove old image front
				if (!empty($_FILES['image_front']['name'])) {
					$this->_removeImage($path, $dataCheck[0]['image_front']);
				}

				// Remove old image back            
				if (!empty($_FILES['image_back']['name'])) {
					$this->_removeImage($path, $dataCheck[0]['image_back']);
				}

				// Remove list image old if have image 本人確認書類
				if (empty($buildListImage)) {
					if (!empty($dataCheck[0]['list_image'])) {
						$this->_removeListImage($path, $dataCheck[0]['list_image']);
					}
				} else if (!empty($listOldImage)) {
					$this->_removeListImage($path, $listOldImage);
				}

				$data_options = array('link' => base_url() . 'contact');
				if ($screen == 'user') {
					$template = 'mail_document_upload_complete.tpl';
					$data_options['family_name'] = $dataCheck[0]['family_name'];
					$data_options['first_name'] = $dataCheck[0]['first_name'];
				} else if ($screen == 'corp') {
					$template = 'mail_document_upload_corp_complete.tpl';
					$data_options['corp_name'] = $dataCheck[0]['corp_name'];
					$data_options['ceo_name'] = $dataCheck[0]['ceo_name'];
				}

				// Send email
				$options = array(
					'to'       => $dataCheck[0]['mail'],
					'data'     => $data_options,
					'subject'  => '【CryptoPie】本人確認書類を受け付けました',
					'template' => $template
				);

				$isSend = $this->mail->sendEmail($options);
				if($isSend){
					redirect(base_url() . "mypage/{$this->controller}/document_upload_complete/");
				}
			}
		}

		// Display image uploaded
		$this->assignInfoImage();

		$this->assign('sidebarActive', 'document_upload');
		$this->assign('screen', $screen);
		$this->tpl('mypage/document_upload.tpl');
	}

	private function processListImage($data) {
		$i = 1;
		$j = 0;
		while (isset($_FILES['file' . $i]['name'])) {
			if (!in_array($j, array_keys($data))) {
				$data[$j] = $_FILES['file' . $i]['name'];
			}
			$i++;
			$j++;
		}
		return $data;
	}

	/**
	 * Get image blank
	 */
	private function getImageBlank($isShowView = false) {
		$files = $_FILES;
		if (isset($files['file_certificate'])) unset($files['file_certificate']);
		if (isset($files['image_id'])) unset($files['image_id']);
		if (isset($files['image_front'])) unset($files['image_front']);
		if (isset($files['image_back'])) unset($files['image_back']);
		$arrayFile = array();
		foreach ($files as $key => $file) {
			$expl = explode('file', $key);
			if (!empty($isShowView)) {
				$arrayFile[$expl[1]] = '';
			} else {
				$arrayFile[$expl[1]] = $key;
			}
		}
		return $arrayFile;
	}

	/**
	 * Display image uploaded
	 */
	private function assignInfoImage() {
		$screen = $this->session->userdata('type');
		$email = $this->session->userdata('email');
		
		$data = $this->getSessionInfo($screen, $email);
		
		$userCorpId       = !empty($data['id']) ? $data['id'] : '';
		$file_certificate = !empty($data['file_certificate']) ? $data['file_certificate'] : '';
		$image_id         = !empty($data['image_id']) ? $data['image_id'] : '';
		$image_front      = !empty($data['image_front']) ? $data['image_front'] : '';
		$image_back       = !empty($data['image_back']) ? $data['image_back'] : '';
		$urlImageUploaded = base_url() . 'upload/data/image_auth/' . $screen . '/' . $userCorpId;

		$list_image = array();
		if (!empty($data['list_image'])) {
			$list_image = explode(',', $data['list_image']);
			$list_image = $this->processListImage($list_image);
		} else {
			$list_image = $this->getImageBlank(true);
		}

		$this->assign('urlImageUploaded', $urlImageUploaded);
		$this->assign('userCorpId', $userCorpId);
		$this->assign('file_certificate', $file_certificate);
		$this->assign('image_id', $image_id);
		$this->assign('image_front', $image_front);
		$this->assign('image_back', $image_back);
		$this->assign('list_image', $list_image);
	}

	/**
	 * Get session information of user or corp
	 */
	private function getSessionInfo($screen, $email) {
		if ($screen == 'user') {
			$data = $this->t_user->checkDuplicate(array('mail' => $email), true);
		} else if ($screen == 'corp') {
			$data = $this->t_corp->checkDuplicate(array('mail' => $email), true);
		}
		if (!empty($data[0])) {
			return $data[0];
		}
		return array();
	}

	/**
	 * Build list image data
	 */
	private function buildListImage($data = array()) {
		$file_more = array();
		if (!empty($data)) {
			$num = 0;
			for ($i= 1; $i <= count($data); $i++) { 
				$file_more['file' . $i] = $data[$num];
				if ($num < count($data)) {
					$num++;
				}
			}
		}
		return $file_more;
	}
	
	/**
	 * [_uploadImage support upload image]
	 * @return [type] [description]
	 */
	private function _uploadImage($config , $filedName) {

		$config['file_name'] = $this->common->randomString();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload($filedName)) {
			$data=$this->upload->data();
		} else {
			$data=$this->upload->display_errors();
		}
		
		return $data;
	}
	
	/**
	 * 確認画面
	 */
	public function document_upload_complete()
	{
		$this->assign('sidebarActive', 'document_upload');
		$this->tpl('mypage/document_upload_complete.tpl');
	}

	/**
	 * [_uploadListImage upload array image]
	 * @param  [type] $config [description]
	 * @return [type]         [description]
	 */
	private function _uploadListImage($config) {
		$data = array();
		$arrayFile = $this->getImageBlank();

		foreach ($arrayFile as $key => $fieldName) {
			$config['file_name'] = $this->common->randomString();
			$this->load->library('upload', $config);
			if($this->upload->do_upload($fieldName))
			{
				$file = $this->upload->data();
				$data[$key] = $file['file_name'];
			}
			else {
				$message = $this->upload->display_errors();
				return $message;
			}
		}
		return $data;
	}
	
	/**
	 * [_createFoderUploadByID create path upload]
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	private function _createFoderUploadByID($path){
		if(empty($path)){
			return false;
		};

		if (!is_dir($path)) {
			@mkdir($path, 0777, true);
			chmod($path, 0777);
		};
		return true;
	}
	
	/**
	 * [validate_image validate image upload]
	 * @param  [type] $field [description]
	 * @param  [type] $name  [description]
	 * @return [type]        [description]
	 */
	public function validate_image($field, $name) {
		$allowed_mime_type_arr = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
		$mime = get_mime_by_extension($_FILES[$name]['name']);

		if (!empty($_FILES[$name]['name'])) {
			if($_FILES[$name]['size'] > SIZE_IMAGE) { //10485760 = 10 mb
				$this->form_validation->set_message('validate_image', 'アップロードする画像は10M以内でお願い致します');
				return false;
			}
			
			if (!in_array($mime, $allowed_mime_type_arr)) {
				$this->form_validation->set_message('validate_image', 'png,jpg形式で画像をアップロードしてください');
				return false;
			}
		} else {
			$screen          = $this->session->userdata('type');
			$email           = $this->session->userdata('email');
			$data            = $this->getSessionInfo($screen, $email);
			$data_list_image = isset($data['list_image']) ? explode(',', $data['list_image']) : array();
			$file_more       = $this->buildListImage($data_list_image);

			$arrayPrimary = array('image_id', 'image_front', 'image_back');
			if ($screen == 'corp') {
				$arrayPrimary[] = 'file_certificate';
			}
			
			$inValid = false;
			if (in_array($name, $arrayPrimary)) {
				if (empty($data[$name])) {
					$inValid = true;
				}
			}

			if ($inValid) {
				$this->form_validation->set_message('validate_image', '%s がアップロードされていません');
				return false;
			}
		}
		return true;
	}

	/**
	 * [_getImageArr get array image file]
	 * @return [type] [description]
	 */
	private function _getImageArr(){
		$i = 1;
		$name = 'file';
		$arrayFile = array();
		while (isset($_FILES[$name.$i])) {
			$image = $name.$i;
			$arrayFile[$i] = $image;
			$i++;
		}
		return $arrayFile;
	}
	
	/**
	 * [checkTotalSizeImages callback check total size images]
	 * @return [type] [description]
	 */
	public function checkTotalSizeImages () {
		$total = 0;
		foreach ($_FILES as $key => $value) {
			$total = $total + $value['size'];
		}
		if($total > 31457280)//31457280 == 30mb
		{
			$this->form_validation->set_message('checkTotalSizeImages', 'アップロードする画像は 合計30MBまで対応しています。');
			return false;
		}
		return true;
	}
	
	/**
	 * [_removeImage remove image old ]
	 * @param  [type] $dir       [path ]
	 * @param  string $nameImage [name image]
	 * @return [type]            [description]
	 */
	private function _removeImage($dir, $nameImage = '') {
		if(empty($nameImage)) {
			return true;
		}
		$path = $dir.'/'.$nameImage;
		if(file_exists($path)) {
			unlink($path);
		}
		return true;
	}
	
	/**
	 * [_removeListImage remove list images old ]
	 * @param  [type] $dir       [path file image old]
	 * @param  string $listImage [name image]
	 * @return [type]            [description]
	 */
	private function _removeListImage($dir, $listImage = '') {
		if(empty($listImage)){
			return true;
		}

		if (!is_array($listImage)) {
			$arrayImages = explode(",", $listImage);
		} else {
			$arrayImages = $listImage;
		}
		
		foreach ($arrayImages as $key => $name) {
			$this->_removeImage($dir, $name);
		}
		return true;
	}
}
