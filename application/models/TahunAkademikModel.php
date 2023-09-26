<?php
class TahunAkademikModel extends CI_Model{
 
  var $table = 'tbl_tahun_akademik';

  public function get_data()
  {
     $this->db->select('*');
     $this->db->from($this->table);
     return $this->db->get()->result_array();   
  }

  public function get_status()
  {
    $this->db->select('keterangan, status');
    $this->db->from($this->table);
    $this->db->where('status', 'Aktif');
    return $this->db->get()->result();
  }

  public function get_periode()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('status', 'Aktif');
    return $this->db->get()->result();
  }

  public function insert_akademik($data)
  {
    return $this->db->insert('tbl_tahun_akademik', $data);
  }

  public function update_akademik($id_tahun, $data)
  {
    $this->db->where('id_tahun', $id_tahun);
    return $this->db->update('tbl_tahun_akademik', $data);
  }

  public function delete_akademik($id_tahun_del, $data)
  {
      $this->db->where('id_tahun', $id_tahun_del);
      return $this->db->delete('tbl_tahun_akademik', $data);
  }
 
}