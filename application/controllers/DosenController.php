<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DosenController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}

        $this->load->model('DosenModel', 'dosen');
        $this->load->model('UserModel', 'user');
	}

	public function index()
	{
		if($this->session->userdata('level')==='1'){
			$data['title'] = 'Dosen Pembimbing - Wisuda';
            $data['data_dosen'] = $this->dosen->get_data();
            $data['data_setting'] = $this->user->get_data_setting();
			$this->template->load('layouts/main', 'dosen/v_dosen', $data);
		}else{
			echo "Access Denied";
		}
		
	}

    public function add_dosen()
    {
        $dosbing_1 = $this->input->post('dosbing_1');
        $dosbing_2 = $this->input->post('dosbing_2');
        $created_by = $this->session->userdata('nama');

        $data = array(
            'dosbing_1' => $dosbing_1,
            'dosbing_2' => $dosbing_2,
            'created_by' => $created_by
        );

        $this->dosen->insert_dosen($data);
        $this->session->set_Flashdata('success', 'Berhasil Tambah Dosen Pembimbing');
        redirect('dosbing');
    }

    public function update_dosen()
    {
        $id_dosbing = $this->input->post('id_dosbing');
        $edit_dosbing_1 = $this->input->post('edit_dosbing_1');
        $edit_dosbing_2 = $this->input->post('edit_dosbing_2');
        $created_by = $this->session->userdata('nama');

        $data = array(
            'dosbing_1' => $edit_dosbing_1,
            'dosbing_2' => $edit_dosbing_2,
            'created_by' => $created_by
        );

        $this->dosen->update_dosen($id_dosbing, $data);
        $this->session->set_flashdata('update', 'Berhasil Update Dosen Pembimbing');
        redirect('dosbing');
    }

    public function hapus_dosen()
    {
        $id_del = $this->input->post('id_del');
        $data = [
            'id_dosbing' => $id_del
        ];
        $this->dosen->delete_dosen($id_del, $data);
        $this->session->set_flashdata('success', 'Berhasil Hapus Tahun Akademik');
        redirect('dosbing');
    }
}