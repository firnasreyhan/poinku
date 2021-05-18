<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    
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
        $this->load->model('UserModel');
        
    }
    

    public function index()
    {
        $data['users'] = $this->UserModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/UserView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
//     public function insert()
//     {
//         $data = $_POST;
//         $this->JenisKegiatanModel->insert($data);
//         redirect('jeniskegiatan');
//     }

    public function delete()
    {
        $data = $_POST;
        $this->UserModel->delete($data);
        redirect('user');
    }

//     public function detail($param)
// 	{
//         $data['detail_jenis_kegiatan'] = $this->JenisKegiatanModel->getDetail(['ID_JENIS' => $param]);
//         $this->load->view('template/header');
// 		$this->load->view('template/sidebar');
// 		$this->load->view('template/topbar');
// 		$this->load->view('admin/JenisKegiatanUpdateView', $data);
//         $this->load->view('template/footer');
// 	}

//     public function update()
// 	{
//         $data = $_POST;
//         $this->JenisKegiatanModel->update($data);
//         redirect('jeniskegiatan');
// 	}

}


/*
 End of file JenisKegiatanController.php */

?>