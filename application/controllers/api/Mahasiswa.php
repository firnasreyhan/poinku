<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends RestController {

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

    // public function konten_post()
    // {
    //     $param = $this->post();

    //     $dataStore = array(
    //         'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
    //         'MEDIA_KONTEN '     => $param['media'],
    //         'JENIS_KONTEN '     => $param['jenis']
    //     );

    //     $this->KontenModel->insert($dataStore);
    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    // }

    // public function kegiatan_post()
    // {
    //     $param = $this->post();

    //     $dataStore = array(
    //         'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
    //         'KETERANGAN  '     => $param['keterangan']
    //     );

    //     $this->KegiatanModel->insert($dataStore);
    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    // }

    // public function buktiKonten_post()
    // {
    //     $param = $this->post();

    //     $dataStore = array(
    //         'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
    //         'BUKTI '            => $param['bukti']
    //     );
    //     $this->TugasKhususModel->update($dataStore);
    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    // }

    // public function buktiKegiatan_post()
    // {
    //     $param = $this->post();

    //     $newPath = 'uploads/sertifikat/' . $param['nrp'] . '/' . $param['nama_jenis'] . '/';
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
    //             $config['quality']= '100%';
    //             // $config['width'] = 600;
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

    //     $dataStore = array(
    //         'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
    //         'BUKTI '            => $link 
    //     );

    //     $this->TugasKhususModel->update($dataStore);
    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    // }

    // public function poin_get()
    // {
    //     $param = $this->get();
    //     $dataStore = array(
    //         'NRP'         => $param['nrp'],
    //         'ID_JENIS'         => $param['jenis'],
    //     );
    //     $poins = $this->TugasKhususModel->getPoin($dataStore);
    //     if ($poins != null) {
    //         $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $poins], 200);
    //     } else {
    //         $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
    //     }
    // }

    // public function totalPoin_get()
    // {
    //     $param = $this->get();
    //     $dataStore = array(
    //         'NRP'         => $param['nrp']
    //     );

    //     $poins = $this->TugasKhususModel->getTotalPoin($dataStore);
        
    //     if ($poins['POIN'] != null) {
    //         $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'POIN' => $poins['POIN']], 200);
    //     } else {
    //         $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
    //     }
    // }
}

/* End of file TugasKhusus.php */

?>