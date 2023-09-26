<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH. 'vendor/autoload.php';
class LaporanController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}
		$this->load->model('TahunAkademikModel', 'thakademik');
        $this->load->model('UserModel', 'user');
		$this->load->model('LaporanModel', 'laporan');
	}

	public function index()
	{
        $data['title'] = 'Laporan - Wisuda';
		
		$periode = $this->input->post('periode');
		$data['get_data'] = $this->thakademik->get_data();
		$data['get_laporan'] = $this->laporan->get_data();
		$data['data_setting'] = $this->user->get_data_setting();
		
		$this->template->load('layouts/main', 'laporan/v_laporan', $data);
	}

	public function exportexcel()
	{
		$id_tahun  = $this->input->post('id_tahun');
		// $data = [
		// 	'id_tahun' => $id_tahun,
		// ];
		$query = [
			'nama_file' => 'formulir_wisuda_'.$id_tahun,
			'headline' => 'Laporan Formulir Wisuda',
			'data' => $this->laporan->read_excel()->result()
		];

		$this->load->view('laporan/export', $query);
	}

	public function cetak_laporan()
	{
		$id_formulir = $this->input->post('id_formulir');
		
		$query = array(
			'id_formulir' => $id_formulir
		);

		$response = [
			'laporan' => $this->laporan->cetak_laporan($id_formulir, $query)->row()
		];
		
		$nama_dokumen['title'] = 'Cetak Laporan';

		$mpdf = new \Mpdf\Mpdf(
            ['tempDir' => sys_get_temp_dir()]
        );
        $mpdf->AddPage(
            '', // L - landscape, P - portrait 
            '',
            '',
            '',
            '',
            10, // margin_left
            5, // margin right
            10, // margin top
            10, // margin bottom
            5, // margin header
            0
        );
        // $mpdf = new mPDF('c',array(100,110),'',0,10,10,10,10);
        $html = $this->load->view('laporan/cetak_laporan', $response, true);
        $mpdf->WriteHTML($html);
        ob_clean();
		$mpdf->Output('Cetak Laporan'.".pdf",'I');
	}
}
