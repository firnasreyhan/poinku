<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanController extends CI_Controller {

    
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
        $this->load->model('TugasKhususModel');
        $this->load->model('KegiatanModel');
        $this->load->model('KontenModel');
    }
    
    public function index()
    {
        $data['kegiatans'] = $this->TugasKhususModel->getAll();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/KegiatanView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }
    
    
    public function acc()
	{
        $data = array(
            'STATUS_VALIDASI' => 1,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s')
        );

        $where = array(
            'ID_TUGAS_KHUSUS' => $this->input->post('ID_TUGAS_KHUSUS'),
        );

        $this->TugasKhususModel->acc($data, $where);

        $query = $this->db->query('SELECT * FROM tugas_khusus JOIN mahasiswa ON mahasiswa.NRP = tugas_khusus.NRP WHERE ID_TUGAS_KHUSUS="'.$this->input->post('ID_TUGAS_KHUSUS').'"')->result();
        
        foreach($query as $data){
            $token = $data->TOKEN;
        }

        $dataAccKegiatanNotif = array(
            'token' => $token,
        );

        $this->load->view('notifikasi/NotifikasiAccKegiatanView', $dataAccKegiatanNotif);
        $this->session->set_tempdata('kegiatanView', '<div class="alert alert-success" role="alert">Berhasil validasi kegiatan</div>', 1);
        redirect('kegiatan');
    }
    
    public function tolak()
	{
        $data = array(
            'STATUS_VALIDASI' => 2,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s')
        );

        $where = array(
            'ID_TUGAS_KHUSUS' => $this->input->post('ID_TUGAS_KHUSUS'),
        );

        $this->TugasKhususModel->tolak($data, $where);
        
        $query = $this->db->query('SELECT * FROM tugas_khusus JOIN mahasiswa ON mahasiswa.NRP = tugas_khusus.NRP WHERE ID_TUGAS_KHUSUS="'.$this->input->post('ID_TUGAS_KHUSUS').'"')->result();
        
        foreach($query as $data){
            $token = $data->TOKEN;
        }

        $dataTolakKegiatanNotif = array(
            'token' => $token,
        );

        $this->load->view('notifikasi/NotifikasiTolakKegiatanView', $dataTolakKegiatanNotif);
        $this->session->set_tempdata('kegiatanView', '<div class="alert alert-danger" role="alert">Berhasil menolak kegiatan</div>', 1);
        redirect('kegiatan');
    }
    
    public function detail($idTugasKhusus)
    {
        $dataStore = array(
            'ID_TUGAS_KHUSUS'         => $idTugasKhusus
        );

        $data['detail_kegiatan'] = $this->TugasKhususModel->detail($idTugasKhusus);
        $data['kegiatan'] = $this->KegiatanModel->get($dataStore);
        $data['konten'] = $this->KontenModel->get($dataStore);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/DetailValidasiKegiatanView', $data);
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