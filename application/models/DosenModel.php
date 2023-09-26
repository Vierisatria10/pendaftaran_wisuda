<?php
class DosenModel extends CI_Model{
 
  var $table = 'tbl_dosbing';

  public function get_data()
  {
     $this->db->select('*');
     $this->db->from($this->table);
     return $this->db->get()->result_array();   
  }

  public function get_dosen()
  {
     $this->db->select('*');
     $this->db->from($this->table);
     return $this->db->get()->result_array();   
  }

  public function insert_dosen($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function update_dosen($id_dosbing, $data)
  {
    $this->db->where('id_dosbing', $id_dosbing);
    return $this->db->update($this->table, $data);
  }

  public function delete_dosen($id_del, $data)
  {
    $this->db->where('id_dosbing', $id_del);
    return $this->db->delete($this->table, $data);
  }

}