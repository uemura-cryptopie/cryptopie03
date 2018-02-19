<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load library
        $this->load->helper(array('form', 'url'));
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->library('basic/common');
        $this->load->library('basic/mail');
        $this->load->library('support/lib_security');
        $this->load->model('t_user');
        $this->load->model('t_corp');
        $this->load->model('t_email_temp');
        $this->load->model('log_login');
        $this->load->library('session');
    }

    public function validate_email_register()
    {
        $mail = $this->input->post('mail');

        if (!empty($mail)) {
            $mailUser = $this->t_user->isRegistered($mail);
            $mailCorp = $this->t_corp->isRegistered($mail);

            if (!empty($mailUser) || !empty($mailCorp)) {
                $this->form_validation->set_message('validate_email_register', '入力されたメールアドレスは既に登録済です');
                return false;
            }
            $this->t_email_temp->delete(array('mail' => $mail));
        } else {
            $this->form_validation->set_message('validate_email_register', '「メールアドレス」を入力してください');
            return false;
        }
        return true;
    }

    // google Recaptcha Check
    public function validate_googleRecaptchaCheck()
    {
        $response = $this->input->post('g-recaptcha-response');
        if (!$this->lib_security->googleRecaptchaCheck($response)) {
            $this->form_validation->set_error_delimiters('<p id="recaptcha-error" class="error_text">', '</p>');
            $this->form_validation->set_message('validate_googleRecaptchaCheck', 'チェックを入れてください。');
            return false;
        } else {
            return true;
        }
    }

    // 新規登録ボタン押下時
    public function index()
    {
        $agency_id = null;
        $get = $this->input->get();
        if (isset($get['id'])) {
            // アフェリエイトリンクから来た場合はagency_idを取得
            $agency_id = $get['id'];
        }
        // Data post from form
        $email = $this->input->post('mail');

        // Validate email
        $this->form_validation->set_error_delimiters('<p id="mail-error" class="error_text">', '</p>');

        // Validate require, duplicate email
        $this->form_validation->set_rules('mail', 'メールアドレス', 'callback_validate_email_register');

        // google Recaptcha Check
        // $this->form_validation->set_rules('g-recaptcha-response', 'チェック', 'required|callback_validate_googleRecaptchaCheck', array(
        //     'required' => 'チェックを入れてください。'
        // ));

        if ($this->form_validation->run()) {

            if ($this->session->has_userdata('data_user')) {
                $this->session->unset_userdata('data_user');
            }
            if ($this->session->has_userdata('data_corp')) {
                $this->session->unset_userdata('data_corp');
            }

            $token = $this->common->generateToken($email);
            $tokenExpired = $this->common->add2Day();
            $passwordGenerate = $this->common->randomString();

            // Insert data to table t_email_temp
            $dataInsert = array(
                'mail' => $email,
                'password' => $this->common->encrypt($passwordGenerate),
                'agency_id' => $agency_id,
                'token' => $token,
                'token_expired' => $tokenExpired,
            );
            $isInsert = $this->t_email_temp->insert($dataInsert);

            if ($isInsert) {
                // Send email
                $options = array(
                    'to' => $email,
                    'data' => array(
                        'email' => $email,
                        'password' => $passwordGenerate,
                        'link' => base_url() . 'front/login',
                    ),
                    'subject' => '【Cryptopie】ご登録を受け付けました',
                    'template' => 'mail_login_registration.tpl',
                );
                $isSend = $this->mail->sendEmail($options);
<<<<<<< HEAD
                
=======

>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
                // Redirect page when send email successfully
                if ($isSend) {
                    redirect('/send-initial-mail');
                }
            }
        }

        $this->tpl('index.tpl');
    }

    // ログイン情報のバリデーション
    public function validate_info_login()
    {
        // Data post from form
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');

        if (empty($mail) || empty($password)) {
            $this->form_validation->set_message('validate_info_login', '「メールアドレスまたはパスワードの入力をしてください。」');
            return false;
        }

        if (!empty($mail) && !empty($password)) {
            $password = $this->common->encrypt($password);
            $mailUser = $this->t_user->checkDuplicate(array('mail' => $mail, 'password' => $password), true);
            $mailCorp = $this->t_corp->checkDuplicate(array('mail' => $mail, 'password' => $password), true);

            if (empty($mailUser) && empty($mailCorp)) {
                $this->form_validation->set_message('validate_info_login', '「ユーザー登録がありません。」');
                return false;
            }

            // Insert information of user or corp onto log_login table
            $dataInsert = array();

            $type = '';
            if (!empty($mailUser[0])) {
                $dataInsert = $mailUser[0];
                $type = 'user';
            } else if (!empty($mailCorp[0])) {
                $dataInsert = $mailCorp[0];
                $type = 'corp';
            }

            if (!empty($dataInsert)) {
                // Create google auth code
                $dataInsert['type'] = $type;
                if (!empty($dataInsert['setting_login'])) {
                    if ($this->log_login->checkDataIsLocked($dataInsert)) {
                        if ($this->session->has_userdata('login_id')) {
                            // Update status1 fail
                            $login_id = $this->session->userdata('login_id');
                            $this->log_login->updateStatusLogLogin($login_id, 2, 1);
                        }
                        // Data is locked
                        $this->form_validation->set_message('validate_info_login', '「一定数認証を間違えたため30分経ってから再度ログインしてください。」');
                        return false;
                    } else {
                        // Insert information log login
                        $login_id = $this->log_login->insertData($dataInsert);
                        // Add session data
                        $this->log_login->sessionInfoLogLogin($login_id);
                        // Update status1 success
                        $this->log_login->updateStatusLogLogin($login_id, 1, 1);
                    }
                } else {
                    // Insert information log login
                    $login_id = $this->log_login->insertData($dataInsert);
                    // Add session data
                    $this->log_login->sessionInfoLogLogin($login_id);
                }
            }
        }

        return true;
    }

    public function login()
    {
        // Redirect to my page if exists session info of log login
        // $this->log_login->redirectToMyPage();

        // Data post from form
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');

        // Validate
        $this->form_validation->set_error_delimiters('<p class="error_textBox">', '</p>');
        $this->form_validation->set_rules('mail', 'メールアドレス', 'callback_validate_info_login');

        if ($this->form_validation->run()) {
            if (empty($this->session->userdata('setting_login'))) {
                // Redirect to my page if exists session setting login
                $this->log_login->redirectToMyPage();
            }
            redirect('/two-factor-auth');
        }

        $this->tpl('login.tpl');
    }

    public function validate_google_two_factor_code()
    {
        $login_id = $this->session->userdata('login_id');
        $log_time = $this->log_login->getLogTime($login_id);

        $login_info = $this->session->userdata;

        $condition = array('mail' => $login_info['email']);
        if ($login_info['type'] == 'user') {
            $data = $this->t_user->checkDuplicate($condition, true);
        } else {
            $data = $this->t_corp->checkDuplicate($condition, true);
        }

        $secret_key = $data[0]['google_auth_code'];

        // Data post from form
        $google_code = $this->input->post('google_code');

        if (empty($google_code)) {
            $this->form_validation->set_message('validate_google_two_factor_code', '「認証コード」を入力してください。');
            return false;
        }

        if (!empty($log_time) && (time() < strtotime($log_time))) {
            $this->form_validation->set_message('validate_google_two_factor_code', '「一定数認証を間違えたため30分経ってから再度ログインしてください。」');
            return false;
        } else {
            $this->log_login->unlockLogTimeData($login_id);
            $this->log_login->sessionInfoLogLogin($login_id);
            $this->log_login->resetNumberAccessGoogleAuth();
        }

        $verifyCode = $this->lib_security->verifyCode($secret_key, $google_code);

        if (!$verifyCode) {
            $this->log_login->numberAccessGoogleAuth();
            // Update status2 fail
            $this->log_login->updateStatusLogLogin($login_id, 2, 2);
            if ($this->session->has_userdata('google_number_auth') && $this->session->userdata('google_number_auth') >= 5) {
                // Update infor log login
                $this->log_login->logTimeLogLogin($login_id);
                $this->log_login->resetNumberAccessGoogleAuth();
                $this->form_validation->set_message('validate_google_two_factor_code', '「一定数認証を間違えたため30分経ってから再度ログインしてください。」');
                return false;
            } else {
                $this->form_validation->set_message('validate_google_two_factor_code', '「確認コードが無効です。」');
                return false;
            }
        } else {
            $this->log_login->unlockLogTimeData($login_id);
            $this->log_login->sessionInfoLogLogin($login_id);
            $this->log_login->resetNumberAccessGoogleAuth(true);
            // Update status2 success
            $this->log_login->updateStatusLogLogin($login_id, 1, 2);
            // Update information log login
            $this->log_login->updateInfoWhenSuccessAuthCode();
        }

        return true;
    }

    public function two_factor_auth()
    {
        // Redirect to my page if exists session info of log login
        // $this->log_login->redirectToMyPage();

        if (!$this->session->has_userdata('login_id')) {
            redirect(base_url());
        }

        // Check is success status1
        $login_id = $this->session->userdata('login_id');
        $log_time = $this->session->userdata('log_time');
        if (
            empty($this->log_login->getStatus1($login_id)) ||
            ($this->log_login->getStatus1($login_id) == 2 && !empty($log_time))
        ) {
            redirect(base_url());
        }

        $type = $this->session->userdata('type');

        // Data post from form
        $google_code = $this->input->post('google_code');

        $this->form_validation->set_error_delimiters('<p class="error_text">', '</p>');

        // Validate require, duplicate email
        $this->form_validation->set_rules('google_code', '認証コード', 'callback_validate_google_two_factor_code');

        if ($this->form_validation->run()) {
            redirect('/mypage');
        }

        $this->tpl('two_factor_auth.tpl');
    }

    /**
     * Notification message in template for end user when enter email in system
     */
    public function send_initial_mail()
    {
        // Redirect to my page if exists session info of log login
        // $this->log_login->redirectToMyPage();

        $this->tpl('send_initial_mail.tpl');
    }

    /**
     * Validate email in rules
     */
    public function check_email_login_registration()
    {
        $mail = $this->input->post('mail');

        if (!empty($mail)) {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $this->form_validation->set_message('check_email_login_registration', 'アルファベット、数字、特殊文字の一部以外は入力できません');
                return false;
            }

            $mailUser = $this->t_user->isRegistered($mail);
            $mailCorp = $this->t_corp->isRegistered($mail);

            if (!empty($mailUser) || !empty($mailCorp)) {
                $this->form_validation->set_message('check_email_login_registration', '入力されたメールアドレスは既に登録済です');
                return false;
            }
            $isValidEmail = $this->t_email_temp->checkDuplicate(array('mail' => $mail), true);

            if (empty($isValidEmail)) {
                $this->form_validation->set_message('check_email_login_registration', '入力されたメールアドレスは存在しません');
                return false;
            }
        }
        return true;
    }

    /**
     * Validate password in rules
     */
    public function check_password_login_registration()
    {
        $password = $this->input->post('password');
        if (!empty($password)) {
            $password = $this->common->encrypt($password);
            $isValidPassword = $this->t_email_temp->checkDuplicate(array('password' => $password), true);

            if (empty($isValidPassword)) {
                $this->form_validation->set_message('check_password_login_registration', 'パスワードが正しくありません');
                return false;
            }

            if (!$this->common->isValidIn24h($isValidPassword[0]['token_expired'])) {
                $this->form_validation->set_message('check_password_login_registration', 'パスワードの有効期限が切れています');
                return false;
            }
        }
        return true;
    }

    /**
     * Login registration email and password temp
     */
    public function login_registration()
    {
        // Redirect to my page if exists session info of log login
        // $this->log_login->redirectToMyPage();

        // Remove session data mail temp if exists
        if ($this->session->has_userdata('data_mail_temp')) {
            $this->session->unset_userdata('data_mail_temp');
        }

        // Data post from form
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $btnLoginRegistration = $this->input->post('btnLoginRegistration');

        // Validate
        $this->form_validation->set_error_delimiters('<p class="error_text">', '</p>');

        $this->form_validation->set_rules('mail', 'メールアドレス', 'required|callback_check_email_login_registration', array(
            'required' => '「メールアドレス」を入力してください',
        ));

        $this->form_validation->set_rules('password', 'パスワード', 'required|callback_check_password_login_registration', array(
            'required' => '「パスワード」を入力してください。',
        ));

        // $this->form_validation->set_rules('g-recaptcha-response', 'チェック', 'required|callback_validate_googleRecaptchaCheck', array(
        //     'required' => 'チェックを入れてください。'
        // ));

        // Redirect to page register information of user or corp
        if ($this->form_validation->run()) {
            $this->session->set_userdata('data_mail_temp', $mail);
            redirect('/pre-registered/register/' . $btnLoginRegistration);
        }

        $this->tpl('login_registration.tpl');
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->log_login->resetSessionInfoLogLogin();
        redirect(base_url());
    }
}
