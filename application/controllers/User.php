<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH. 'vendor/autoload.php';

class User extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}
        $this->load->model('UserModel', 'user');
        $this->load->model('TahunAkademikModel', 'thakademik');
        $this->load->model('JurusanModel', 'jurusan');
        $this->usernim = $this->session->userdata('username');
        $this->load->model('DosenModel', 'dosen');
	}

    private $path_foto='./upload/foto/';
    private $path_pembayaran='./upload/buktibayar/';
    private $path_logo = './upload/logo/';
    private $master_table_setting = 'tbl_setting';

    public function index()
    {
        if($this->session->userdata('level')==='2'){
			$data['title'] = 'Dashboard User - Wisuda';
            $data['data_user'] = $this->user->get_data();
            $data['data_setting'] = $this->user->get_data_setting();
            // $data['data_dashboard'] = $this->user->get_data_dashboard();
			$this->template->load('layouts/main', 'user/dashboard_user', $data);
		}else{
			echo "Access Denied";
		}
    }

	public function user_data()
	{
		if($this->session->userdata('level')==='1'){
			$data['title'] = 'Data User - Wisuda';
            $data['data_setting'] = $this->user->get_data_setting();
            $data['data_user'] = $this->user->get_data();
			$this->template->load('layouts/main', 'user/v_user', $data);
		}else{
            $this->load->view('errors/404_notfound');
			// echo "Access Denied";
		}
	}

    public function pengaturan()
    {
        if($this->session->userdata('level')==='1'){
			$data['title'] = 'Pengaturan Website - Wisuda';
            $data['data_setting'] = $this->user->get_data_setting();
			$this->template->load('layouts/main', 'user/v_pengaturan', $data);
		}else{
            $this->load->view('errors/404_notfound');
			// echo "Access Denied";
		}
    }

    public function update_pengaturan()
    {
        $id_pengaturan = $this->input->post('id_pengaturan');
        $nama_website = $this->input->post('nama_website');
        $nama_univ = $this->input->post('nama_univ');
        $alamat_univ = $this->input->post('alamat_univ');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $icon = $this->input->post('icon');

        $logo = 'logo';
        if ($_FILES[$logo]['name']) {
            if ($this->fileupload($this->path_logo, $logo)) {
                $datalogo = $this->$logo->data('file_name');
                $uploadlogo = $datalogo;
            }else{
                $this->session->set_flashdata('error',$this->$logo->display_errors());
				redirect(site_url('user/pengaturan'));
            }
        }

        $pengaturan = array(
            'nama_website' => $nama_website,
            'nama_univ' => $nama_univ,
            'alamat_univ' => $alamat_univ,
            'no_telp' => $no_telp,
            'email' => $email,
            'icon' => $icon,
            'logo' => $uploadlogo
        );

        $this->user->update_setting($id_pengaturan, $pengaturan);
        $this->session->set_flashdata('update', 'Berhasil Update data Pengaturan');
        redirect(site_url('user/pengaturan'));
    }

    public function add_user()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $level = $this->input->post('level');

        $data = array(
            'nama'  => $nama,
            'username' => $username,
            'password' => $password,
            'level'    => $level
        );

        $this->user->insert_user($data);
        $this->session->set_flashdata('success', 'Berhasil Tambah User Pengguna');
        redirect('user/user_data');
    }

    public function update_user()
    {
        $id = $this->input->post('id');
        $edit_nama = $this->input->post('edit_nama');
        $edit_username = $this->input->post('edit_username');
        $edit_password = $this->input->post('edit_password');
        $edit_level    = $this->input->post('edit_level');

        $data = array(
            'nama'  => $edit_nama,
            'username' => $edit_username,
            'password' => $edit_password,
            'level'    => $edit_level
        );

        $this->user->update_user($id, $data);
        $this->session->set_flashdata('update', 'Berhasil Update User Pengguna');
        redirect('user/user_data');
    }

    public function hapus_user()
    {
        $id_del = $this->input->post('id_del');
        $data = [
            'id' => $id_del
        ];
        $this->user->delete_user($id_del, $data);
        $this->session->set_flashdata('success', 'Berhasil Hapus User Pengguna');
        redirect('user/user_data');
    }

    public function cetak_user()
    {
        $id_cetak = $this->input->post('id_cetak');
        $password_cetak = $this->input->post('password_cetak');
        $nama_univ = $this->input->post('nama_univ');
        $alamat_univ = $this->input->post('alamat_univ');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $username_cetak = $this->input->post('username_cetak');

        $query = array(
            'id' => $id_cetak,
            'username' => $username_cetak,
            'password' => $password_cetak,
        );

        $data = array(
            'nama_univ' => $nama_univ,
            'alamat_univ' => $alamat_univ,
            'no_telp' => $no_telp,
            'email' => $email,
        );
        
        // $user = $this->user->cetak_user($id_cetak, $query)->row();
        // $user_data = $this->user->cetak_setting($data)->result();
        $response = [
            'user' => $this->user->cetak_user($id_cetak, $query)->row(),
            'user_data' => $this->user->cetak_setting($data)->result_array()
        ];
        
        // print_r($response);die;
        // exit;
        
        $nama_dokumen['title'] = 'Cetak User';

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
        $html = $this->load->view('user/cetak_user', $response, true);
        $mpdf->WriteHTML($html);
        ob_clean();
		$mpdf->Output('Cetak User'.".pdf",'I');
    }

    // formulir user
    public function formulir()
    {
        if ($this->input->post('submit')) {
            $foto = 'foto';
            if ($_FILES[$foto]['name']) {
                if ($this->fileupload($this->path_foto, $foto)) {
                    $datafoto = $this->$foto->data('file_name');
                    $uploadfoto = $datafoto;
                }else{
                    $this->session->set_flashdata('error', $this->$foto->display_errors());
                    redirect(site_url('user/formulir'));
                }
            }
            $berkaspembayaran = 'bukti_bayar';
            if ($_FILES[$berkaspembayaran]['name']) {
                if ($this->fileupload($this->path_pembayaran, $berkaspembayaran)) {
                    $databerkaspembayaran = $this->$berkaspembayaran->data('file_name');
                    $uploadbuktibayar = $databerkaspembayaran;
                }else{
					$this->session->set_flashdata('error',$this->$berkaspembayaran->display_errors());
					redirect(site_url('user/formulir'));
				}
            }

            $id_tahun = $this->input->post('id_tahun');
            $ipk      = $this->input->post('ipk');
            $username      = $this->session->userdata('username');
            $dosbing_1 = $this->input->post('dosbing_1');
            $id_jurusan = $this->input->post('id_jurusan');
            $dosbing_2 = $this->input->post('dosbing_2');
            $agama =  $this->input->post('agama');
            $tahun_masuk = $this->input->post('tahun_masuk');
            $tahun_lulus = $this->input->post('tahun_lulus');
            $judul_skripsi = $this->input->post('judul_skripsi');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $nama_ortu = $this->input->post('nama_ortu');
            $alamat_tinggal = $this->input->post('alamat_tinggal');
            $alamat_asal = $this->input->post('alamat_asal');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $bekerja = $this->input->post('bekerja');
            $alamat_bekerja = $this->input->post('alamat_bekerja');


            $formulir = array(
                'id_tahun' => $id_tahun,
                'id_jurusan' => $id_jurusan,
                'ipk'     => $ipk,
                'nim'     => $username,
                'dosbing_1' => $dosbing_1,
                'dosbing_2' => $dosbing_2,
                'agama'    => $agama,
                'tahun_masuk' => $tahun_masuk,
                'tahun_lulus' => $tahun_lulus,
                'judul_skripsi' => $judul_skripsi,
                'nama'      => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'nama_ortu' => $nama_ortu,
                'alamat_tinggal' => $alamat_tinggal,
                'alamat_asal' => $alamat_asal,
                'email' => $email,
                'no_hp' => $no_hp,
                'bekerja' => $bekerja,
                'alamat_bekerja' => $alamat_bekerja,
                'foto' => $uploadfoto,
                'bukti_bayar' => $uploadbuktibayar,
            );
            $this->user->simpan_formulir($formulir);
            $this->session->set_flashdata('success', 'Berhasil Anda telah melakukan isi formulir Wisuda');
            redirect('user/berhasil_formulir');
        }else{
            if($this->session->userdata('level')==='2'){
                $data['title'] = 'Formulir User - Wisuda';
                $data['get_data'] = $this->thakademik->get_status();
                $data['get_periode'] = $this->thakademik->get_periode();
                $data['get_dosen'] = $this->dosen->get_dosen();
                $data['data_jurusan'] = $this->jurusan->get_data();
                $data['data_setting'] = $this->user->get_data_setting();
                // $data['data_formulir'] = $this->user->get_formulir();
                $this->template->load('layouts/main', 'user/data_formulir', $data);
            }else{
                $this->load->view('errors/404_notfound');
                // echo "Access Denied";
            }
        }
        
    }

    // simpan formulir user
    public function berhasil_formulir()
    {
       $data['title'] = 'Success - Wisuda';
       $data['data_setting'] = $this->user->get_data_setting();
       $data['get_cetak'] = $this->user->get_cetak();
       $this->template->load('layouts/main', 'user/berhasil_formulir', $data);
    }

    public function cetakblanko()
    {
        
        $username = $this->session->userdata('username');
        $nama = $this->input->post('nama');
        $query = array(
            'nim' => $username,
            
        );
        // print_r($query);die();
        // exit;
        $formulir = $this->user->cetak_blanko($username, $query)->row();
        $data = array(
            'judul' => 'Blanko Wisuda', 
        );

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
        $mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">{DATE j-m-Y}</td>
		        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right;">'.$data['judul'].'</td>
		    </tr>
		</table>');		
        $html = $this->load->view('user/cetak_formulir', $formulir, true);
        $mpdf->WriteHTML($html);
        ob_clean();
		$mpdf->Output($data['judul'].".pdf",'I');
    }

    public function fileupload($path,$file){
		$config=array(
			'upload_path'=>$path,
			'allowed_types'=>'JPG|jpeg|jpg|png',
			'max_size'=>5000, //5MN
			'encrypt_name'=>false, //ENCTYPT
		);
		$this->load->library('upload',$config,$file);
		return $this->$file->do_upload($file);
	}
}
