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

    public function aksiLogin(){
        $email 		    = $this->input->post('email');
        $password 		= $this->input->post('password');
		$nama	        = null;
		$role			= null;
		$emails			= null;

		$dataLogin = $this->db->query('SELECT * FROM user JOIN role ON role.ID_ROLE = user.ID_ROLE WHERE EMAIL = "'.$email.'" && PASSWORD = "'.$password.'"')->result();

		foreach($dataLogin as $data){
			$role 		= $data->ROLE;
			$nama 		= $data->NAMA;
			$emails 	= $data->EMAIL;
		}

		$data_session = array(
			'email' 		=> $emails,
			'nama' 		    => $nama,
			'role' 			=> $role,
			'log' 			=> TRUE
		);
 
		$this->session->set_userdata($data_session);

		if($dataLogin != null){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Login </div>');
			if($role == "Admin"){
				redirect('aturan');
			}else if($role == "Event Manager"){
				redirect('dashboardEvent');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username/ Password Salah! </div>');
			redirect('login');
		}
	}

	public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file LoginController.php */

?>