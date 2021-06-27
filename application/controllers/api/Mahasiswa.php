<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MahasiswaModel');
    }

    public function index_get()
    {
        $param = $this->get();

        $dataStore = array(
            'NRP'         => $param['nrp']
        );
        $mahasiswa = $this->MahasiswaModel->get($dataStore);
        if ($mahasiswa != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $mahasiswa], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function insert_post()
    {
        $param = $this->post();

        $dataStore = array(
            'NRP'           => $param['nrp'],
            'EMAIL'         => $param['email'],
            'ID_ATURAN'     => $param['aturan'],
            'NAMA'         => $param['nama'],
            'PRODI'         => $param['prodi'],
            'ANGKATAN'      => $param['angkatan'],
            'TOKEN'      => $param['token']
        );

        $data = $this->MahasiswaModel->insert($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan', 'data' => $data], 200);
    }

    public function updateToken_post()
    {
        $param = $this->post();

        $dataStore = array(
            'NRP'           => $param['nrp'],
            'TOKEN'         => $param['token']
        );

        $this->MahasiswaModel->updateToken($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }

    public function pengajuan_put()
    {
        $param = $this->put();

        $dataStore = array(
            'NILAI'             => $param['nilai'],
            'TANGGAL_VALIDASI'  => date('Y-m-d H:i:s'),
            'STATUS'            => 0
        );

        $where = array(
            'NRP' => $param['nrp']
        );

        require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

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

        $data['notif'] = 'pengajuan';
        $pusher->trigger('my-channel', 'my-event', $data);

        $this->MahasiswaModel->pengajuan($dataStore, $where);
        $this->response(['status' => true, 'message' => 'Tugas khusus berhasil diajukan'], 200);
    }
    
    public function removeToken_put()
    {
        $param = $this->put();

        $this->MahasiswaModel->removeToken($param['nrp']);
        $this->response(['status' => true, 'message' => 'Berhasil logout'], 200);
    }
}
