<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('Model.php');

class Dosen_model extends Model
{
  public function __construct()
  {
    $this->table = 'dosen';
  }

  public function loginAdmin($nip, $password)
  {
    return $this->read(['nip' => $nip, 'password' => md5($password), "status_pegawai" => 1]);
  }

  public function loginUser($nip, $password)
  {
    return $this->read(['nip' => $nip, 'password' => md5($password)]);
  }

  public function getJoin($filter = NULL, $like = NULL)
  {
    $q = "SELECT a.*, b.nama as nama_prodi, c.nama as jabatan, c.id as id_jabatan FROM $this->table a
    LEFT JOIN prodi b ON a.id_prodi=b.id 
    LEFT JOIN jabatan c ON a.jabatan=c.id
    WHERE a.status_pegawai NOT IN (1)";
    if($filter != NULL) {
      foreach ($filter as $key => $value) {
        $q .= " AND ".$key." = '".$value."' ";
      }
    }

    if($like != NULL) {
      foreach ($like as $key => $value) {
        $q .= " AND ".$key." LIKE '%".$value."%' ";
      }
    }
    
    return $this->db->query($q);
  }

  public function getJoin2($prodi=NULL, $jabatan=NULL, $dosen=NULL)
  {
    $q = "SELECT a.*, b.nama nama_jabatan, b.nominal, c.nama nama_prodi 
    FROM dosen a 
    LEFT JOIN jabatan b ON a.jabatan=b.id 
    LEFT JOIN prodi c ON a.id_prodi=c.id 
    WHERE a.status_pegawai NOT IN (1)
    ";
    if($prodi != NULL) $q .= " AND a.id_prodi=$prodi ";
    if($jabatan != NULL) $q .= " AND a.jabatan=$jabatan ";
    if($dosen != NULL) $q .= " AND (a.nama LIKE '%$dosen%' OR a.nip LIKE '%$dosen%') ";
    return $this->db->query($q);
  }
}