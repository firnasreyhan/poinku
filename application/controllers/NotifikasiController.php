<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiController extends CI_Controller {
    
	public function listNotifikasi()
	{
		$this->load->view('template/notif');
    }
    
}
