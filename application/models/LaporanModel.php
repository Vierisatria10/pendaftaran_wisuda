<?php
class LaporanModel extends CI_Model{
 
  var $table = 'tbl_formulir';

  public function get_data()
  {
     $this->db->select('*');
     $this->db->from('tbl_formulir');
     $this->db->join('tbl_tahun_akademik', 'tbl_formulir.id_tahun = tbl_tahun_akademik.id_tahun', 'left');
     return $this->db->get()->result();   
  }

  public function read_excel()
  {
    $this->db->select('*');
    $this->db->from('tbl_formulir');
    $this->db->join('tbl_jurusan', 'tbl_formulir.id_jurusan = tbl_jurusan.id_jurusan', 'left');
    $this->db->join('tbl_tahun_akademik', 'tbl_formulir.id_tahun = tbl_tahun_akademik.id_tahun', 'left');
    return $this->db->get();   
  }

  public function cetak_laporan($id_formulir, $query)
  {
    $this->db->select('*');
    $this->db->where('id_formulir', $id_formulir);
    $this->db->from('tbl_formulir');
    $this->db->join('tbl_jurusan', 'tbl_formulir.id_jurusan = tbl_jurusan.id_jurusan', 'left');
    $this->db->join('tbl_tahun_akademik', 'tbl_formulir.id_tahun = tbl_tahun_akademik.id_tahun', 'left', $query);
    return $this->db->get();
  }
}