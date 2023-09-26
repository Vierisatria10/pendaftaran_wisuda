<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('UserModel', 'user');
    }

	public function index()
	{
        $data['title'] = 'Login - Wisuda';
        $data['data_setting'] = $this->user->get_data_setting();
		$this->load->view('auth/v_login', $data);
	}

    public function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $validate = $this->LoginModel->validate($username, $password);

        if ($validate->num_rows() > 0) {
            $data = $validate->row_array();
            $nama = $data['nama'];
            $username = $data['username'];
            $level = $data['level'];
            $password = $data['password'];

            $session_data = array(
                'nama' => $nama,
                'username' => $username,
                'level' => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            // acces login for admin
            if ($level === '1') {
                echo $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil</h4>
                    Selamat Datang di Website Pendaftaran Wisuda Anda Berhasil Login Sebagai <b>'. $nama .'</b>
                </div>');
                redirect('dashboard');
            }else if($level === '2') {
                echo $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil</h4>
                    Selamat Datang di Website Pendaftaran Wisuda Anda Berhasil Login Sebagai <b>'. $nama .'</b>
                </div>');
                redirect('user');
            }
        }else{
            echo $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Username atau Password Salah
            </div>');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo $this->session->set_flashdata('msg', '
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Terimakasih Anda Sudah Logout.
        </div>
        ');
        redirect('login');
    }
}
