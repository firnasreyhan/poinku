<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKegiatanController extends CI_Controller {

    
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
        $this->load->model('JenisKegiatanModel');
        
    }
    

    public function index()
    {
        $data['jenis_kegiatans'] = $this->JenisKegiatanModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/JenisKegiatanView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
    public function insert()
    {
        $data = $_POST;
        $this->JenisKegiatanModel->insert($data);
        redirect('jeniskegiatan');
    }

    public function delete()
    {
        $data = $_POST;
        $this->JenisKegiatanModel->delete($data);
        redirect('jeniskegiatan');
    }

    public function detail($param)
	{
        $data['detail_jenis_kegiatan'] = $this->JenisKegiatanModel->getDetail(['ID_JENIS' => $param]);
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/JenisKegiatanUpdateView', $data);
        $this->load->view('template/footer');
	}

    public function update()
	{
        $data = $_POST;
        $this->JenisKegiatanModel->update($data);
        redirect('jeniskegiatan');
	}

}


/*
 End of file JenisKegiatanController.php */

?>