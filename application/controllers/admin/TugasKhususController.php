<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TugasKhususController extends CI_Controller {

    
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
        $this->load->model('MahasiswaModel');
        
    }
    
    public function index()
    {
        $data['tugas_khusus'] = $this->MahasiswaModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/TugasKhususView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
    public function acc()
	{
        $data = array(
            'STATUS' => 1,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s')
        );

        $where = array(
            'NRP' => $this->input->post('NRP'),
        );

        $this->MahasiswaModel->acc($data, $where);

        $query = $this->db->query('SELECT * FROM mahasiswa WHERE NRP="'.$this->input->post('NRP').'"')->result();
        
        foreach($query as $data){
            $token = $data->TOKEN;
        }

        $dataAccTugasKhususNotif = array(
            'token' => $token,
        );

        $this->load->view('notifikasi/NotifikasiAccTugasKhususView', $dataAccTugasKhususNotif);
        redirect('tugaskhusus');
    }
    
    public function tolak()
	{
        $data = array(
            'STATUS' => 2,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s')
        );

        $where = array(
            'NRP' => $this->input->post('NRP'),
        );

        $this->MahasiswaModel->tolak($data, $where);
        
        $query = $this->db->query('SELECT * FROM mahasiswa WHERE NRP="'.$this->input->post('NRP').'"')->result();
        
        foreach($query as $data){
            $token = $data->TOKEN;
        }

        $dataTolakTugasKhususNotif = array(
            'token' => $token,
        );

        $this->load->view('notifikasi/NotifikasiTolakTugasKhususView', $dataTolakTugasKhususNotif);
        redirect('tugaskhusus');
    }
    
    public function detail($nrp)
    {
        $data['detail_tugaskhusus'] = $this->MahasiswaModel->detail($nrp);
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/DetailValidasiTugasKhususView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
//     public function insert()
//     {
//         $data = $_POST;
//         $this->JenisKegiatanModel->insert($data);
//         redirect('jeniskegiatan');
//     }

//     public function delete()
//     {
//         $data = $_POST;
//         $this->JenisKegiatanModel->delete($data);
//         redirect('jeniskegiatan');
//     }

//     public function detail($param)
// 	{
//         $data['detail_jenis_kegiatan'] = $this->JenisKegiatanModel->getDetail(['ID_JENIS' => $param]);
//         $this->load->view('template/header');
// 		$this->load->view('template/sidebar');
// 		$this->load->view('template/topbar');
// 		$this->load->view('admin/JenisKegiatanUpdateView', $data);
//         $this->load->view('template/footer');
// 	}

//     public function update()
// 	{
//         $data = $_POST;
//         $this->JenisKegiatanModel->update($data);
//         redirect('jeniskegiatan');
// 	}

}


/*
 End of file JenisKegiatanController.php */

?>