<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function login()
  {
    if($this->session->has_userdata('nama')) {
      redirect('admin');
    }

    $this->load->model('dosen_model');
    $data = $this->dosen_model->{@$this->input->post('status_pegawai') != '' ? 'loginAdmin' : 'loginUser'}
    ($this->input->post('nip'), $this->input->post('password'));
    if($data->num_rows() > 0) {
      // login berhasil
      $this->session->set_userdata($data->row_array());
      redirect('admin');
    } else {
      // login gagal
      redirect('login?gagal');
    }
  }
}