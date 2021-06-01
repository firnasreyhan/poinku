<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdminController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if($this->session->userdata('role') != 'Admin'){
            $this->session->sess_destroy();
            redirect('login');
        }

        if($this->session->userdata('log') != TRUE){
            $this->session->sess_destroy();
            redirect('login');
        }
        
        echo '<script>console.log("'.$this->session->userdata('role').'")</script>';
        $this->load->model('LoginModel');
        $this->load->model('DaftarEventModel');
        $this->load->model('PresensiModel');
        
    }
    
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['jumlah_kegiatan'] = $this->DaftarEventModel->getTotal($email);
        $data['jumlah_hadir'] = $this->PresensiModel->getTotalHadir($email);
        $data['jumlah_tidak_hadir'] = $this->PresensiModel->getTotalTidakHadir($email);
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('admin/DashboardAdminView', $data);
		$this->load->view('template/footer');
    }


}

/* End of file LoginController.php */

?>