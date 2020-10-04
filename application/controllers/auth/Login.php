<?php

class Login extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        $this->load->library(array('form_validation', 'Recaptcha'));
		//load model admin
        $this->load->model('admin');
	}

	public function index()
	{
		if($this->admin->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("admin/overview");

            }else{

                //jika session belum terdaftar
                $recaptcha = $this->input->post('g-recaptcha-response');

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required');

                $response = $this->recaptcha->verifyResponse($recaptcha);

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {


                    $data['captcha'] = $this->recaptcha->getWidget();
                    $data['script_captcha'] = $this->recaptcha->getScriptTag();

                    $this->load->view('auth/login',$data);
                

                }else{

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->admin->check_login('users', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_users,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'user_nama' => $apps->nama_user,
                            'role'      => $apps->role
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "superadmin"){
                            $this->session->set_flashdata('login_success', 'Login Berhasil, Selamat datang di Dashboard!');
                            redirect('admin/overview/');
                        } else if($this->session->userdata("role") == "pustakawan"){
                            $this->session->set_flashdata('login_success', 'Login Berhasil, Selamat datang di Dashboard!');
                            redirect('pustakawan/overview/');
                        } else {
                            $this->session->set_flashdata('login_success', 'Login Berhasil, Selamat datang di Dashboard!');
                            redirect('kasi/overview/');
                        }

                    }
                }else{
                    $data['captcha'] = $this->recaptcha->getWidget();
                    $data['script_captcha'] = $this->recaptcha->getScriptTag();

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('auth/login', $data);
                }

            }

        }
	}
}
