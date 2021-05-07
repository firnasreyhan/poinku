<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardEventController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('LoginModel');
        
    }
    
    public function index()
    {
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/DashboardEventView');
		$this->load->view('template/footer');
    }


}

/* End of file LoginController.php */

?>