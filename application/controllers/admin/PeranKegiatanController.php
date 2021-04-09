<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PeranKegiatanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PeranKegiatanModel');
    }
    

    public function index()
    {
        $data['peran_kegiatans'] = $this->PeranKegiatanModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/PeranKegiatanView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
    public function insert()
    {
        $data = $_POST;
        $this->PeranKegiatanModel->insert($data);
        redirect('perankegiatan');
    }

    public function delete()
    {
        $data = $_POST;
        $this->PeranKegiatanModel->delete($data);
        redirect('perankegiatan');
    }

    public function detail($param)
	{
        $data['detail_peran_kegiatan'] = $this->PeranKegiatanModel->getDetail(['ID_PERAN' => $param]);
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/PeranKegiatanUpdateView', $data);
        $this->load->view('template/footer');
	}

    public function update()
	{
        $data = $_POST;
        $this->PeranKegiatanModel->update($data);
        redirect('perankegiatan');
	}

}

/* End of file PeranKegiatanController.php */

?>