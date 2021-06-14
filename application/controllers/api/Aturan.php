<?php

use chriskacerguis\RestServer\RestController;

class Aturan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AturanModel');
        $this->load->model('NilaiModel');
        $this->load->model('PoinModel');
        $this->load->model('KriteriaModel');
        $this->load->library('upload');
    }

    public function index_get()
    {
        $aturans = $this->AturanModel->getAll();
        if ($aturans != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $aturans], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function detail_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_ATURAN'         => $param['id'],
        );
        $aturan = $this->AturanModel->getDetail($dataStore);
        if ($aturan != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $aturan], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function aturanAktif_get()
    {
        $param = $this->get();
        $dataStore = array(
            'KATEGORI'          => $param['kategori'],
            'AKTIF'             => 1
        );
        $aturan = $this->AturanModel->getAturanAtif($dataStore);
        if ($aturan != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $aturan], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function nilai_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_ATURAN'         => $param['id'],
        );
        $nilais = $this->NilaiModel->getDetail($dataStore);
        if ($nilais != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $nilais], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function poin_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_ATURAN'         => $param['id'],
        );
        $poins = $this->PoinModel->getDetail($dataStore);
        if ($poins != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $poins], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function kriteria_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_NILAI'         => $param['id'],
        );
        $kriterias = $this->KriteriaModel->getDetail($dataStore);
        if ($kriterias != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $kriterias], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
}
