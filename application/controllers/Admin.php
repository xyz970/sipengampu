<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->has_userdata('nama')) {
      redirect('login');
    }
  }

  public function index()
  {
    redirect('admin/dashboard');
  }
  
  public function dashboard()
  {
    $this->load->model('pengampu_model');
    $data['total_dosen'] = @$this->db->query("SELECT COUNT(*) total FROM dosen WHERE status_pegawai NOT IN (1)")->row()->total;
    $data['total_matkul'] = @$this->db->query("SELECT COUNT(*) total FROM matkul")->row()->total;
    $data['total_prodi'] = @$this->db->query("SELECT COUNT(*) total FROM prodi")->row()->total;
    // $data['total_pengampu'] = @$this->pengampu_model->getJoin([])->num_rows();
    $this->load->model(['dosen_model', 'prodi_model','pengampu_model']);
    $dosens = $this->dosen_model->getJoin2()->result();
    $prodis = $this->prodi_model->read()->result();
    $tahun_akademik_aktif = @$this->db->query("SELECT id FROM tahun_akademik WHERE status=1")->row()->id;
    $out = [];
    $no = 1;
    foreach ($dosens as $kdosen => $dosen) {
      $total_mk = 0;
      $total_sks_teori = 0;
      $total_sks_praktik = 0;
      $total_kordinator = 0;
      $total_teamteaching = 0;
      foreach ($prodis as $kprodi => $prodi) {
        $matkul = $this->pengampu_model->getSKS($prodi->id, $dosen->nip, ($tahun_akademik_aktif == NULL ? 0 : $tahun_akademik_aktif))->row();
        $total_mk = $total_mk + floatval($matkul->total_mk);
        $total_sks_teori = $total_sks_teori + floatval($matkul->total_sks_teori);
        $total_sks_praktik = $total_sks_praktik + floatval($matkul->total_sks_praktik);
        $total_kjm_sks_teori = ($total_sks_teori <= 4 ? 0 : ($total_sks_teori > 4 && $total_sks_teori <= 8 ? $total_sks_teori - 4 : 4));
        $total_kjm_sks_praktik = ($total_sks_praktik <= 8 ? 0 : ($total_sks_praktik > 8 && $total_sks_praktik <= 12 ? $total_sks_praktik - 8 : 4));
        $total_kordinator += $matkul->total_kordinator;
        $total_teamteaching += $matkul->total_teamteaching;
      }
      $out[] = [
        'no' => $no++,
        'nip' => $dosen->nip,
        'nama' => $dosen->glr_depan . " " . $dosen->nama . ($dosen->glr_belakang != '' ? ', ' : '') . $dosen->glr_belakang, 
        'id_jabatan' => $dosen->jabatan,
        'jabatan' => $dosen->nama_jabatan,
        'total_mk' => $total_mk,
        'total_sks_teori' => $total_sks_teori,
        'total_sks_praktik' => $total_sks_praktik,
        'total_sks' => $total_sks_teori + $total_sks_praktik,
        'total_kordinator' => $total_kordinator,
        'total_teamteaching' => $total_teamteaching,
        'total_kjm_sks_teori' => @$total_kjm_sks_teori,
        'total_kjm_sks_praktik' => @$total_kjm_sks_praktik,
        'total_kjm' => @$total_kjm_sks_teori + @$total_kjm_sks_praktik
      ];
    }
    // echo '<pre>';
    // var_dump($out);
    // echo '</pre>';
    // exit();
    $data['jabatan'] = array_unique(array_map(function($data) {
      return $data['id_jabatan'];
    }, $out));
    $data['jabatan_title'] = array_unique(array_map(function($data) {
      return $data['jabatan'];
    }, $out));
    $data['statistik'] = $out;
    // echo '<pre>';
    // var_dump($ujabatan);
    // echo '</pre>';
    // exit();
    $this->load->view('admin/dashboard', $data);
  }

  public function master_admin()
  {
    $this->load->view('admin/master_admin');
  }

  public function master_tahun_akademik()
  {
    $this->load->view('admin/master_tahun_akademik');
  }

  public function master_jabatan()
  {
    $this->load->view('admin/master_jabatan');
  }

  public function master_dosen()
  {
    $this->load->view('admin/master_dosen');
  }

  public function master_prodi()
  {
    $this->load->view('admin/master_prodi');
  }

  public function master_matkul()
  {
    $this->load->view('admin/master_mata_kuliah');
  }

  public function master_pengampu()
  {
    $this->load->view('admin/master_pengampu');
  }

  public function rekap()
  {
    $this->load->model(['dosen_model', 'prodi_model','pengampu_model']);
    $dosen = $this->dosen_model->getJoin2(
      $this->input->get('prodi'),
      $this->input->get('jabatan'),
      $this->input->get('dosen')
    )->result();
    $prodi = $this->prodi_model->read()->result();
    $this->load->view('admin/rekap', compact('dosen', 'prodi'));
  }

  public function export()
  {
    $this->load->model(['dosen_model', 'prodi_model','pengampu_model']);
    $dosen = $this->dosen_model->getJoin2(
      $this->input->get('prodi'),
      $this->input->get('jabatan'),
      $this->input->get('dosen')
    )->result();
    $prodi = $this->prodi_model->read()->result();
    $this->load->view('admin/export', compact('dosen', 'prodi'));
  }

  public function rasio()
  {
    $this->load->view('admin/rasio');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}
