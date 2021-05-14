<?php

class Overview extends CI_Controller {
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
        // load view admin/overview.php
        $this->load->view("admin/overview");
        }
}