<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Lingkup extends RestController
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('LingkupKegiatanModel');
    }


    public function index_get()
    {
        $lingkup = $this->LingkupKegiatanModel->get();
        if ($lingkup != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $lingkup], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
}

/* End of file Lingkup.php */
