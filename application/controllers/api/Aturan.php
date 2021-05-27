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

    public function aturanAKtif_get()
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
    // public function detail_get($username)
    // {
    //     $param = $this->get();
    //     $aturans = $this->AturanModel->getAll();

    //     if ($aturans != null) {
    //         $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $aturans, 'username' => $username], 200);
    //     } else {
    //         $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
    //     }
    // }
    // public function index_post()
    // {
    //     $param = $this->post();
    //     $dataStore = array(
    //         'TAHUN'         => $param['tahun'],
    //         'KETERANGAN'    => $param['almtPerusahaan'],
    //     );
    //     $this->AturanModel->insert($dataStore);
    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    // }
    // public function upload_post()
    // {
    //     $param = $this->post();

    //     $newPath = 'uploads/sertifikat/' . $param['nrp'] . '/' . $param['jenis'] . '/';
    //     if (!is_dir($newPath)) {
    //         mkdir($newPath, 0777, TRUE);
    //     }

    //     $config['upload_path'] = $newPath; //path folder
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    //     $config['file_name'] = time(); //Enkripsi nama yang terupload

    //     $this->upload->initialize($config);
    //     if (!empty($_FILES['file']['name'])) {
    //         if ($this->upload->do_upload('file')) {
    //             $gbr = $this->upload->data();
    //             //Compress Image
    //             $config['image_library'] = 'gd2';
    //             $config['source_image'] = $newPath . $gbr['file_name'];
    //             $config['create_thumb'] = FALSE;
    //             $config['maintain_ratio'] = true;
    //             // $config['quality']= '100%';
    //             $config['width'] = 600;
    //             // $config['height']= 400;
    //             $config['new_image'] = $newPath . $gbr['file_name'];
    //             $this->load->library('image_lib', $config);
    //             $this->image_lib->resize();

    //             $gambar = $gbr['file_name'];

    //             $link = base_url($newPath . $gambar);
    //         }
    //     } else {
    //         return base_url('images/ttd/default.png');
    //     }

    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan', 'data' => ['LINK' => $link]], 200);
    // }
}

    // 127.0.0.1/poinku/api/aturan/devisap?id=1
