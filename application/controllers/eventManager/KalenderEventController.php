<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KalenderEventController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if($this->session->userdata('role') != 'Event Manager'){
            $this->session->sess_destroy();
            redirect('login');
        }

        if($this->session->userdata('log') != TRUE){
            $this->session->sess_destroy();
            redirect('login');
        }
        
        $this->load->model('KalenderEventModel');
        
    }
    
    public function index()
    {
        $data['event'] = $this->KalenderEventModel->getAll();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/KalenderEventView', $data);
		$this->load->view('template/footer');
    }


}

/* End of file LoginController.php */

?>