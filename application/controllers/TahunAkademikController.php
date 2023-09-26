<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAkademikController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TahunAkademikModel', 'thakademik');
        $this->load->model('UserModel', 'user');
    }

	public function index()
	{
        $data['title'] = 'Tahun Akademik - Wisuda';
        $data['get_data'] = $this->thakademik->get_data();
        $data['data_setting'] = $this->user->get_data_setting();
        // $data['status']  = $this->thakademik->get_status()->row();
		$this->template->load('layouts/main', 'thakademik/v_thakademik', $data);
	}

    public function add_akademik()
    {
        $th_akademik = $this->input->post('th_akademik');
        $periode = $this->input->post('periode');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');

        $data = [
            'tahun_akademik' => $th_akademik,
            'periode'       => $periode,
            'keterangan'    => $keterangan,
            'status'        => $status
        ];

        $this->thakademik->insert_akademik($data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Tahun Akademik');
        redirect('th_akademik');
    }

    public function update_akademik()
    {
        $id_tahun = $this->input->post('id_tahun');
        $edit_th_akademik = $this->input->post('edit_th_akademik');
        $edit_periode = $this->input->post('edit_periode');
        $edit_keterangan = $this->input->post('edit_keterangan');
        $edit_status = $this->input->post('edit_status');

        $data = [
            'tahun_akademik' => $edit_th_akademik,
            'periode'       => $edit_periode,
            'keterangan'    => $edit_keterangan,
            'status'        => $edit_status
        ];
        $this->thakademik->update_akademik($id_tahun, $data);
        $this->session->set_flashdata('update', 'Berhasil Update Tahun Akademik');
        redirect('th_akademik');
    }

    public function hapus_akademik()
    {
        $id_tahun_del = $this->input->post('id_tahun_del');
        $data = [
            'id_tahun' => $id_tahun_del
        ];
        $this->thakademik->delete_akademik($id_tahun_del, $data);
        $this->session->set_flashdata('success', 'Berhasil Hapus Tahun Akademik');
        redirect('th_akademik');
    }
}
