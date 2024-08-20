<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'libraries/rest/src/Format.php');
require_once(APPPATH . 'libraries/rest/src/RestController.php');

use RestServer\RestController;
use RestServer\Format;

class Api extends RestController
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(['admin_model','tahun_akademik_model','jabatan_model','dosen_model','prodi_model','matkul_model','pengampu_model']);
  }

  public function admin_get($id=NULL)
  {
    $filter = [];
    if($id != NULL) $filter['a.id'] = $id;
    $data = $this->admin_model->getJoin($filter);
    $this->response([
      'success' => true,
      'message' => '',
      'data' => $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  public function tahun_akademik_get($id=NULL)
  {
    $like = [];
    $filter = [];
    if(isset($_GET['term'])) $like['keterangan'] = $this->input->get('term');
    if($id != NULL) $filter['id'] = $id;
    $data = $this->tahun_akademik_model->read($filter, $like);
    $this->response([
      'success' => true,
      'message' => '',
      'data' =>  $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  public function jabatan_get($id=NULL)
  {
    $like = [];
    $filter = [];
    if(isset($_GET['term'])) $like['nama'] = $this->input->get('term');
    if($id != NULL) $filter['id'] = $id;
    $data = $this->jabatan_model->read($filter, $like);
    $this->response([
      'success' => true,
      'message' => '',
      'data' =>  $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  public function dosen_get($id=NULL)
  {
    $like = [];
    $filter = [];
    if(isset($_GET['term'])) $like['a.nama'] = $this->input->get('term');
    if($id != NULL) $filter['a.id'] = $id;
    $data = $this->dosen_model->getJoin($filter, $like);
    $this->response([
      'success' => true,
      'message' => '',
      'data' => $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  public function prodi_get($id=NULL)
  {
    $like = [];
    $filter = [];
    if(isset($_GET['term'])) $like['nama'] = $this->input->get('term');
    if($id != NULL) $filter['id'] = $id;
    $data = $this->prodi_model->read($filter, $like);
    $this->response([
      'success' => true,
      'message' => '',
      'data' =>  $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  public function matkul_get($id=NULL)
  {
    $like = [];
    $filter = [];
    if(isset($_GET['term'])) $like['nama'] = $this->input->get('term');
    if($id != NULL) $filter['id'] = $id;
    $data = $this->matkul_model->read($filter, $like);
    $this->response([
      'success' => true,
      'message' => '',
      'data' => $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  public function pengampu_get($id=NULL)
  {
    $filter = [];
    if($id != NULL) $filter['a.id'] = $id;
    $filter['b.status'] = 1;
    $data = $this->pengampu_model->getJoin($filter);
    $this->response([
      'success' => true,
      'message' => '',
      'data' => $data->{$id == NULL ? 'result' : 'row'}()
    ], 200);
  }

  /*********************************** END GET ********************************** */

  public function admin_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $data['password'] = md5($data['password']);
      $query = $this->admin_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data admin',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data admin'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      if($data['password'] != '') $data['password'] = md5($data['password']);
      else unset($data['password']);
      $query = $this->admin_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data admin',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data admin'
        ], 200);
      }
    }
  }

  public function admin_delete($id)
  {
    $query = $this->admin_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data admin',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data admin'
      ], 200);
    }
  }
  
  public function tahun_akademik_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $query = $this->tahun_akademik_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data tahun akademik',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data tahun akademik'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      $query = $this->tahun_akademik_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data tahun akademik',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data tahun akademik'
        ], 200);
      }
    }
  }

  public function tahun_akademik_delete($id)
  {
    $query = $this->tahun_akademik_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data tahun akademik',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data tahun akademik'
      ], 200);
    }
  }

  public function jabatan_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $query = $this->jabatan_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data jabatan',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data jabatan'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      $query = $this->jabatan_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data jabatan',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data jabatan'
        ], 200);
      }
    }
  }

  public function jabatan_delete($id)
  {
    $query = $this->jabatan_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data jabatan',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data jabatan'
      ], 200);
    }
  }

  public function dosen_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $data['password'] = md5($data['password']);
      $query = $this->dosen_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data dosen',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data dosen'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      if($data['password'] != '') $data['password'] = md5($data['password']);
      else unset($data['password']);
      $query = $this->dosen_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data dosen',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data dosen'
        ], 200);
      }
    }
  }

  public function dosen_delete($id)
  {
    $query = $this->dosen_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data dosen',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data dosen'
      ], 200);
    }
  }

  public function prodi_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $query = $this->prodi_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data prodi',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data prodi'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      $query = $this->prodi_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data prodi',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data prodi'
        ], 200);
      }
    }
  }

  public function prodi_delete($id)
  {
    $query = $this->prodi_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data prodi',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data prodi'
      ], 200);
    }
  }

  public function matkul_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $query = $this->matkul_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data matkul',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data matkul'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      $query = $this->matkul_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data matkul',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data matkul'
        ], 200);
      }
    }
    
  }

  public function matkul_delete($id)
  {
    $query = $this->matkul_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data matkul',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data matkul'
      ], 200);
    }
  }

  public function pengampu_post()
  {
    $data = $this->input->post();
    if($data['id'] == NULL) {
      unset($data['id']);
      $query = $this->pengampu_model->create($data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil menambahkan data pengampu',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal menambahkan data pengampu'
        ], 200);
      }
    } else {
      $id = $data['id'];
      unset($data['id']);
      $query = $this->pengampu_model->update(['id' => $id], $data);
      if($query) {
        $this->response([
          'success' => true,
          'message' => 'Berhasil memperbarui data pengampu',
          'data' => $data
        ], 200);
      } else {
        $this->response([
          'success' => false,
          'message' => 'Gagal memperbarui data pengampu'
        ], 200);
      }
    }
    
  }

  public function pengampu_delete($id)
  {
    $query = $this->pengampu_model->delete(['id' => $id]);
    if($query) {
      $this->response([
        'success' => true,
        'message' => 'Berhasil menghapus data pengampu',
      ], 200);
    } else {
      $this->response([
        'success' => false,
        'message' => 'Gagal menghapus data pengampu'
      ], 200);
    }
  }

}
