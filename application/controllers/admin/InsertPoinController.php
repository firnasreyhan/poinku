<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InsertPoinController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') != 'Admin'){
            $this->session->sess_destroy();
            redirect('login');
        }

        if($this->session->userdata('log') != TRUE){
            $this->session->sess_destroy();
            redirect('login');
        }
        
    }
    

    public function index()
    {
        // $data['jenis_kegiatans'] = $this->JenisKegiatanModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/InsertPoinView');
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
    public function insert()
    {
        $data = $_POST;
        $this->JenisKegiatanModel->insert($data);
        redirect('jeniskegiatan');
    }
}


/*
 End of file InsertPoinController.php */

?>