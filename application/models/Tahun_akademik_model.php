<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('Model.php');

class Tahun_akademik_model extends Model
{
  public function __construct()
  {
    $this->table = 'tahun_akademik';
  }

}