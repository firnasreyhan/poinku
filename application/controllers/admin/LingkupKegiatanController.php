<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LingkupKegiatanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LingkupKegiatanModel');
    }
    

    public function index()
    {
        $data['lingkup_kegiatans'] = $this->LingkupKegiatanModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/LingkupKegiatanView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
    public function insert()
    {
        $data = $_POST;
        $this->LingkupKegiatanModel->insert($data);
        redirect('lingkupkegiatan');
    }

    public function delete()
    {
        $data = $_POST;
        $this->LingkupKegiatanModel->delete($data);
        redirect('lingkupkegiatan');
    }

    public function detail($param)
	{
        $data['detail_lingkup_kegiatan'] = $this->LingkupKegiatanModel->getDetail(['ID_LINGKUP' => $param]);
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/LingkupKegiatanUpdateView', $data);
        $this->load->view('template/footer');
	}

    public function update()
	{
        $data = $_POST;
        $this->LingkupKegiatanModel->update($data);
        redirect('lingkupkegiatan');
	}

}

/* End of file LingkupKegiatanController.php */


?>