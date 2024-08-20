<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('Model.php');

class Pengampu_model extends Model
{
  public function __construct()
  {
    $this->table = 'pengampu';
  }

  public function getJoin($filter)
  {
    $q = "SELECT a.id as id,
    a.id_tahun_akademik,
    b.tahun_ajaran tahun_ajaran,
    b.keterangan keterangan,
    c.nama nama_prodi,
    a.id_prodi,
    a.kode_matkul,
    d.nama nama_matkul,
    d.semester,
    a.nip_dosen,
    e.nama nama_dosen,
    e.glr_depan,
    e.glr_belakang,
    a.status_dosen 
    FROM $this->table a
    INNER JOIN tahun_akademik b ON a.id_tahun_akademik=b.id
    INNER JOIN prodi c ON a.id_prodi=c.id
    INNER JOIN matkul d ON a.kode_matkul=d.kode
    INNER JOIN dosen e ON a.nip_dosen=e.nip
    WHERE 1 ";
    if($filter != NULL) {
      foreach ($filter as $key => $value) {
        $q .= " AND ".$key." = '".$value."' ";
      }
    }
    $q .=" GROUP BY a.id";
    return $this->db->query($q);
  }

  public function getSKS($prodi_matkul, $nip, $tahun_akdemik)
  {
    $q = "SELECT COUNT(*) total_mk, SUM(b.tot_teori) total_sks_teori, SUM(b.tot_praktik) total_sks_praktik,
    COUNT(IF(a.status_dosen=1, 1, null)) total_kordinator,
    COUNT(IF(a.status_dosen=2, 1, null)) total_teamteaching
    FROM $this->table a
    INNER JOIN matkul b ON a.kode_matkul=b.kode
    WHERE a.id_prodi=$prodi_matkul 
    AND a.nip_dosen='$nip' 
    AND a.id_tahun_akademik=$tahun_akdemik";
    return $this->db->query($q);
  }
}