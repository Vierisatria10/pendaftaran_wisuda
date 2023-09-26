<?php
class UserModel extends CI_Model{
 
  var $table = 'user';
  var $table_setting = 'tbl_setting';

  public function get_data()
  {
     $this->db->select('*');
     $this->db->from('user');
     $this->db->join('tbl_setting', 'user.id_setting = tbl_setting.id_setting', 'left');
     return $this->db->get()->result_array();   
  }

  public function get_data_setting()
  {
    $this->db->select('*');
    $this->db->from($this->table_setting);
    return $this->db->get()->result();
  }

  public function get_cetak()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('level', '2');
    return $this->db->get()->result();
  }

  public function get_data_dashboard()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('user.level', '2');
    $this->db->join('tbl_setting', 'user.id_setting = tbl_setting.id_setting', 'left');
    return $this->db->get()->result();
  }

  public function update_setting($id_pengaturan, $pengaturan)
  {
    $this->db->where('id_setting', $id_pengaturan);
    return $this->db->update($this->table_setting, $pengaturan);
  }

  public function insert_user($data)
  {
    return $this->db->insert('user', $data);
  }

  public function update_user($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('user', $data);
  }

  public function cetak_user($id_cetak, $query)
  {
    $this->db->select('*');
    $this->db->where('id', $id_cetak);
    $this->db->from('user', $query);
    return $this->db->get();
  }

  public function cetak_blanko($username, $query){
    $this->db->select('*');
    $this->db->where('nim', $username);
    $this->db->from('tbl_formulir');
    $this->db->join('tbl_tahun_akademik', 'tbl_formulir.id_tahun = tbl_tahun_akademik.id_tahun', 'left', $query);
    $this->db->join('tbl_jurusan', 'tbl_formulir.id_jurusan = tbl_jurusan.id_jurusan', 'left', $query);
    return $this->db->get();
  }

  public function cetak_setting($data)
  {
    $this->db->select('*');
    $this->db->from('tbl_setting', $data);
    return $this->db->get();
  }

  public function delete_user($id_del, $data)
  {
    $this->db->where('id', $id_del);
    return $this->db->delete($this->table, $data);
  }

  public function simpan_formulir($formulir)
  {
    return $this->db->insert('tbl_formulir', $formulir);
  }
}
