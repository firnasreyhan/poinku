<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('LoginModel');
        
    }
    

    public function index()
    {
        $this->load->view('login');
    }

}

/* End of file LoginController.php */

?>