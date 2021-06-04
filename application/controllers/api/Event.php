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
    
    public function eventUser_get()
    {
        $param = $this->get();
        
        $dataStore = array(
            'EMAIL'     => $param['email']
        );
        
        $data = $this->DaftarEventModel->getEventUser($dataStore['EMAIL']);
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

        require $_SERVER['DOCUMENT_ROOT'] . '/poinku/vendor/autoload.php';

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'e6c40e4a096f5b8864c8',
            '56ec36eebb15bd0a9669',
            '1200741',
            $options
        );

        $data['notif'] = 'event';
        $pusher->trigger('my-channel', 'my-event', $data);

        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);

    }

    public function batal_post()
    {
        $param = $this->post();

        $dataStore = array(
            'EMAIL'         => $param['email'],
            'ID_EVENT'     => $param['id']
        );

        $this->PresensiModel->delete($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil dihapus'], 200);
    }

    public function presensi_get()
    {
        $param = $this->get();
        
        $dataStore = array(
            'EMAIL'         => $param['email'],
            'ID_EVENT'     => $param['id']
        );
        
        $data = $this->PresensiModel->getPresensi($dataStore);
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
    
    public function detailEvent_get()
    {
        $param = $this->get();
        
        $dataStore = array(
            'ID_EVENT'     => $param['id']
        );
        
        $data = $this->DaftarEventModel->getDetail($dataStore['ID_EVENT']);
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
    
    public function absen_put()
    {
        $param = $this->put();
        
        $dataStore = array(
            'STATUS'             => 1
        );

        $where = array(
            'EMAIL' => $param['email'],
            'ID_EVENT' => $param['id'],
        );

        $data = $this->PresensiModel->update($where, $dataStore);
        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil Absen'], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal Absen'], 200);
        }
    }
}

/* End of file Event.php */

?>