<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends RestController
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarEventModel');
        $this->load->model('PresensiModel');
        $this->load->model('TugasKhususModel');
        $this->load->model('KegiatanModel');
        
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
            'NAMA'         => $param['nama'],
            'ID_EVENT '     => $param['id']
        );

        $this->PresensiModel->insert($dataStore);

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

    public function kuesioner_post()
    {
        $param = $this->post();

        $kuesioner = array(
            'EMAIL'     => $param['email'],
            'ID_EVENT'  => $param['id'],
            'JAWAB_1'   => $param['jwb1'],
            'JAWAB_2'   => $param['jwb2'],
            'JAWAB_3'   => $param['jwb3'],
            'JAWAB_4'   => $param['jwb4'],
            'JAWAB_5'   => $param['jwb5'],
            'SARAN'     => $param['saran'],
        );

        $returnKuesioner =  $this->KuesionerModel->insert($kuesioner);
        if ($returnKuesioner) {
            $this->response(['status' => true, 'message' => 'Kuesioner berhasil ditambahkan'], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Kuesioner gagal ditambahkan'], 200);
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

        $detailEvent = $this->DaftarEventModel->getDetail($where['ID_EVENT']);
        if ($detailEvent != null) {
            $dataTugasKhusus = array(
                'NRP'         => $param['nrp'],
                'ID_JENIS'    => $detailEvent[0]->ID_JENIS,
                'ID_LINGKUP'    => $detailEvent[0]->ID_LINGKUP,
                'ID_PERAN'    => 2,
                'JUDUL'    => $detailEvent[0]->JUDUL,
                'TANGGAL_KEGIATAN'    => $detailEvent[0]->TANGGAL_ACARA,
                'STATUS_VALIDASI'    => 1,
                'TANGGAL_VALIDASI'    => date('Y-m-d H:i:s'),
            );

            $id = $this->TugasKhususModel->insert($dataTugasKhusus);

            if ($id != null) {
                $data = $this->PresensiModel->update($where, $dataStore);

                $dataKegiatan = array(
                    'ID_TUGAS_KHUSUS'   => $id,
                    'KETERANGAN'     => $detailEvent[0]->PEMBICARA
                );
                $this->KegiatanModel->insert($dataKegiatan);
                if ($data) {
                    $this->response(['status' => true, 'message' => 'Berhasil Absen'], 200);
                } else {
                    $this->response(['status' => false, 'message' => 'Gagal Absen'], 200);
                }
            }
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
}