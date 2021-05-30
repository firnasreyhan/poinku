<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class TugasKhusus extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TugasKhususModel');
        $this->load->model('KontenModel');
        $this->load->model('KegiatanModel');
        $this->load->model('PresensiModel');
        
    }
    
    public function index_post()
    {
        $param = $this->post();

        $dataStore = array(
            'NRP'         => $param['nrp'],
            'ID_JENIS'    => $param['jenis'],
            'ID_LINGKUP'    => $param['lingkup'],
            'ID_PERAN'    => $param['peran'],
            'JUDUL'    => $param['judul'],
            'TANGGAL_KEGIATAN'    => $param['tanggal']
        );
        $id = $this->TugasKhususModel->insert($dataStore);
        
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

        $data['notif'] = 'tugas khusus';
        $pusher->trigger('my-channel', 'my-event', $data);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan', 'ID_TUGAS_KHUSUS' => $id], 200);
        

    }

    public function konten_post()
    {
        $param = $this->post();

        $dataStore = array(
            'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
            'MEDIA_KONTEN '     => $param['media'],
            'JENIS_KONTEN '     => $param['jenis']
        );

        $this->KontenModel->insert($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }

    public function kegiatan_post()
    {
        $param = $this->post();

        $dataStore = array(
            'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
            'KETERANGAN  '     => $param['keterangan']
        );

        $this->KegiatanModel->insert($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);

    }

    public function buktiKonten_post()
    {
        $param = $this->post();

        $dataStore = array(
            'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
            'BUKTI '            => $param['bukti']
        );
        $this->TugasKhususModel->update($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }

    public function buktiKegiatan_post()
    {
        $param = $this->post();

        $newPath = 'uploads/sertifikat/' . $param['nrp'] . '/' . $param['nama_jenis'] . '/';
        if (!is_dir($newPath)) {
            mkdir($newPath, 0777, TRUE);
        }

        $config['upload_path'] = $newPath; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = time(); //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $newPath . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = true;
                $config['quality']= '100%';
                // $config['width'] = 600;
                // $config['height']= 400;
                $config['new_image'] = $newPath . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                $link = base_url($newPath . $gambar);
            }
        } else {
            return base_url('images/ttd/default.png');
        }

        $dataStore = array(
            'ID_TUGAS_KHUSUS'   => $param['id_tugas_khusus'],
            'BUKTI '            => $link 
        );

        $this->TugasKhususModel->update($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }

    public function poin_get()
    {
        $param = $this->get();
        $dataStore = array(
            'NRP'         => $param['nrp'],
            'ID_JENIS'         => $param['jenis'],
        );
        $poins = $this->TugasKhususModel->getPoin($dataStore);
        if ($poins != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $poins], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
    
    public function detail_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_TUGAS_KHUSUS'         => $param['id']
        );
        $data = $this->TugasKhususModel->getDetail($dataStore);
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function kegiatan_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_TUGAS_KHUSUS'         => $param['id']
        );
        $data = $this->TugasKhususModel->getKegiatan($dataStore);
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function konten_get()
    {
        $param = $this->get();
        $dataStore = array(
            'ID_TUGAS_KHUSUS'         => $param['id']
        );
        $data = $this->TugasKhususModel->getKonten($dataStore);
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function totalPoin_get()
    {
        $param = $this->get();
        $dataStore = array(
            'NRP'         => $param['nrp']
        );

        $poins = $this->TugasKhususModel->getTotalPoin($dataStore);
        
        if ($poins['POIN'] != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'POIN' => $poins['POIN']], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function jenisTugasKhusus_get()
    {
        $param = $this->get();
        $dataStore = array(
            'NRP'         => $param['nrp']
        );

        $data = $this->TugasKhususModel->getJenisTugasKhusus($dataStore);
        
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }
    
    public function kriteriaTugasKhusus_get()
    {
        $param = $this->get();
        $dataStore = array(
            'NRP'         => $param['nrp']
        );

        $data = $this->TugasKhususModel->getKriteriaTugasKhusus($dataStore);
        
        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

    public function presensi_put()
    {
        $param = $this->put();
        
        $dataStore = array(
            'STATUS'             => 1
        );

        $where = array(
            'EMAIL' => $param['email'],
            'ID_EVENT' => $param['id'],
        );

        // require $_SERVER['DOCUMENT_ROOT'] . '/poinku/vendor/autoload.php';

        // $options = array(
        //     'cluster' => 'ap1',
        //     'useTLS' => true
        // );
        // $pusher = new Pusher\Pusher(
        //     'e6c40e4a096f5b8864c8',
        //     '56ec36eebb15bd0a9669',
        //     '1200741',
        //     $options
        // );

        // $data['notif'] = 'pengajuan';
        // $pusher->trigger('my-channel', 'my-event', $data);

        $this->PresensiModel->update($where, $dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }
}

/* End of file TugasKhusus.php */

?>