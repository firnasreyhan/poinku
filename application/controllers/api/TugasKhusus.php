<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class TugasKhusus extends RestController {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TugasKhususModel');
    }
    

    public function index()
    {
        
    }

    public function insert_post()
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
            'NRP'         => $param['nrp'],
            'ID_JENIS'    => $param['jenis'],
            'ID_LINGKUP'    => $param['lingkup'],
            'ID_PERAN'    => $param['peran'],
            'JUDUL'    => $param['judul'],
            'TANGGAL_KEGIATAN'    => $param['tanggal'],
            'BUKTI'    => $link,
        );
        $this->TugasKhususModel->insert($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }

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

    //     $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan', 'data' => ['LINK' => $link]], 200);
    // }

}

/* End of file TugasKhusus.php */

?>