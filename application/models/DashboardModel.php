<?php
class DashboardModel extends CI_Model{

  public function get_mahasiswa()
  {
     return $this->db->get('tbl_formulir')->num_rows();
  }

  public function get_dospem()
  {
     return $this->db->get('tbl_dosbing')->num_rows();
  }

  public function get_jurusan()
  {
     return $this->db->get('tbl_jurusan')->num_rows();
  }

  public function get_tglakademik()
  {
     $this->db->where('status', 'Aktif');
     return $this->db->get('tbl_tahun_akademik')->num_rows();
  }
}