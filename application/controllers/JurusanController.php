<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JurusanController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}

        $this->load->model('JurusanModel', 'jurusan');
        $this->load->model('UserModel', 'user');
	}

	public function index()
	{
		if($this->session->userdata('level')==='1'){
			$data['title'] = 'Jurusan - Wisuda';
            $data['data_jurusan'] = $this->jurusan->get_data();
            $data['data_setting'] = $this->user->get_data_setting();
			$this->template->load('layouts/main', 'jurusan/v_jurusan', $data);
		}else{
			echo "Access Denied";
		}
		
	}

    public function add_jurusan()
    {
        $nama_jenjang = $this->input->post('nama_jenjang');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $nama_fakultass = $this->input->post('nama_fakultas');

        $jurusan = array(
            'nama_jenjang' => $nama_jenjang,
            'nama_jurusan' => $nama_jurusan,
            'nama_fakultas' => $nama_fakultass
        );

        $this->jurusan->insert_jurusan($jurusan);
        $this->session->set_flashdata('success', 'Berhasil Tambah Data Jurusan');
        redirect('jurusan');
    }

    public function update_jurusan()
    {
        $id_jurusan = $this->input->post('id_jurusan');
        $edit_nama_jenjang = $this->input->post('edit_nama_jenjang');
        $edit_nama_jurusan = $this->input->post('edit_nama_jurusan');
        $edit_nama_fakultas = $this->input->post('edit_nama_fakultas');

        $data = array(
            'nama_jenjang' => $edit_nama_jenjang,
            'nama_jurusan' => $edit_nama_jurusan,
            'nama_fakultas' => $edit_nama_fakultas
        );

        $this->jurusan->update_jurusan($id_jurusan, $data);
        $this->session->set_flashdata('update', 'Berhasil Update Data Jurusan');
        redirect('jurusan');
    }

    public function hapus_jurusan()
    {
        $id_del = $this->input->post('id_del');
        $data = [
            'id_jurusan' => $id_del
        ];
        $this->jurusan->delete_jurusan($id_del, $data);
        $this->session->set_flashdata('success', 'Berhasil Hapus Data Jurusan');
        redirect('jurusan');
    }
}