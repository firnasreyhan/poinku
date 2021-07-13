<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JenisKegiatanModel');
    }

    public function index_get()
    {
        $jenis = $this->JenisKegiatanModel->get();
        if ($jenis != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $jenis], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function data_get()
    {
        $param = $this->get();
        $lingkup = $this->JenisKegiatanModel->getNew($param['idAturan']);
        if ($lingkup != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $lingkup], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
}
