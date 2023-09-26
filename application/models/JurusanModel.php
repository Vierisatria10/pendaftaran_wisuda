<?php
class JurusanModel extends CI_Model{
 
  var $table = 'tbl_jurusan';

  public function get_data()
  {
     $this->db->select('*');
     $this->db->from($this->table);
     return $this->db->get()->result_array();   
  }

  public function insert_jurusan($jurusan)
  {
    return $this->db->insert($this->table, $jurusan);
  }

  public function update_jurusan($id_jurusan, $data)
  {
    $this->db->where('id_jurusan', $id_jurusan);
    return $this->db->update($this->table, $data);
  }

  public function delete_jurusan($id_del, $data)
  {
    $this->db->where('id_jurusan', $id_del);
    return $this->db->delete($this->table, $data);
  }

}