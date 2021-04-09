<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AturanController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AturanModel');
    }
    

    public function index()
    {
        $data['aturans'] = $this->AturanModel->getAll();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/AturanView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }

    public function insert()
	{
        $data = $_POST;
        $this->AturanModel->insert($data);
        redirect('aturan');
	}

	public function delete()
	{
        $data = $_POST;
        $this->AturanModel->delete($data);
        redirect('aturan');
	}

	public function detail($param)
	{
        $data['detail_aturan'] = $this->AturanModel->getDetail(['ID_ATURAN' => $param]);
		$this->load->view('admin/update', $data);
	}

	public function update()
	{
        $data = $_POST;
        $this->AturanModel->update($data);
        redirect('aturan');
	}

}

/* End of file AturanController.php */

?>