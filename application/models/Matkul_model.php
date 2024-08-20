<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('Model.php');

class Matkul_model extends Model
{
  public function __construct()
  {
    $this->table = 'matkul';
  }

  function join(array|string $where_condition=NULL,array|string $like=NULL, $relation_table, $join_condition) {
    $this->db->select('matkul.id,matkul.kode,matkul.nama,prodi.nama as nama_prodi,matkul.semester,matkul.tot_teori,matkul.tot_praktik,matkul.status');
    $this->db->join($relation_table,$join_condition);
    if($where_condition != NULL) $this->db->where($where_condition);
    if($like != NULL) {
      foreach ($like as $key => $value) {
        $this->db->like($key, $value, 'both'); 
      }
    }
    return $this->db->get_where($this->table);
    // return $this->db;
  }

  // ->join('data_barang', 'data_barang.id = transaksi.id_databarang')
  // public function join(string $relation_table, string $join_condition){
  //  return $this->db->join($relation_table,$join_condition);
  // }
}