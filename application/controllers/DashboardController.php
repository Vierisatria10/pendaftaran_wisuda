<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}

		$this->load->model('UserModel', 'user');
		$this->load->model('DashboardModel', 'dashboard');
	}

	public function index()
	{
		if($this->session->userdata('level')==='1'){
			$data['title'] = 'Dashboard - Wisuda';
			$data['data_setting'] = $this->user->get_data_setting();
			$data['total_mahasiswa'] = $this->dashboard->get_mahasiswa();
			$data['total_dospem'] = $this->dashboard->get_dospem();
			$data['total_jurusan'] = $this->dashboard->get_jurusan();
			$data['total_akademik'] = $this->dashboard->get_tglakademik();
			$this->template->load('layouts/main', 'dashboard/v_dashboard', $data);
		}else{
			$this->load->view('errors/404_notfound');
			// echo "Access Denied";
		}
		
	}
}
