<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function index()
  {
    if($this->session->has_userdata('nama')) {
      redirect('admin');
    }
    
    $this->load->view('login');
  }
}