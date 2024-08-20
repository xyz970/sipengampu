<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
  protected $table = '';

  public function create($data)
  {
    return $this->db->insert($this->table, $data); 
  }

  public function read($where = NULL, $like = NULl)
  {
    if($where != NULL) $this->db->where($where);
    if($like != NULL) {
      foreach ($like as $key => $value) {
        $this->db->like($key, $value, 'both'); 
      }
    }
    return $this->db->get_where($this->table);
  }

  public function update($where, $data)
  {
    $this->db->where($where);
    return $this->db->update($this->table, $data);
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete($this->table);
  }
}