<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class Peran extends RestController {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PeranKegiatanModel');
        
    }
    

    public function index_get()
    {
        $peran = $this->PeranKegiatanModel->get();
        if ($peran != null) {
            $this->response(['status' => true, 'message' => 'Data berhasil ditemukan', 'data' => $peran], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 200);
        }
    }

}

/* End of file Peran.php */

?>