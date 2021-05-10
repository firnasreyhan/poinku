<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends RestController {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarEventModel');
        $this->load->model('PresensiModel');
    }
    
    public function index_get()
    {
        $data = $this->DaftarEventModel->getActiveEvent();
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function daftar_post()
    {
        $param = $this->post();

        $dataStore = array(
            'EMAIL'         => $param['email'],
            'ID_EVENT '     => $param['id']
        );

        $this->PresensiModel->insert($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }

    public function batal_post()
    {
        $param = $this->post();

        $dataStore = array(
            'EMAIL'         => $param['email'],
            'ID_EVENT '     => $param['id']
        );

        $this->PresensiModel->delete($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }

    public function presensi_get()
    {
        $param = $this->get();
        
        $dataStore = array(
            'EMAIL'         => $param['email'],
            'ID_EVENT '     => $param['id']
        );
        
        $data = $this->PresensiModel->getPresensi($dataStore);
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
}

/* End of file Event.php */

?>