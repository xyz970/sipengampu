<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('Model.php');

class Admin_model extends Model
{
  public function __construct()
  {
    $this->table = 'dosen';
  }

  public function getJoin($filter = NULL)
  {
    $q = "SELECT a.*, b.nama as nama_prodi, c.nama as jabatan 
    FROM $this->table a
    LEFT JOIN prodi b ON a.id_prodi=b.id 
    LEFT JOIN jabatan c ON a.jabatan=c.id
    WHERE a.status_pegawai IN (1) ";
    if($filter != NULL) {
      foreach ($filter as $key => $value) {
        $q .= " AND ".$key." = '".$value."' ";
      }
    }
    return $this->db->query($q);
  }
}