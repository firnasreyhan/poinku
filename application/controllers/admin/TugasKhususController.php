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
        $this->load->model('TugasKhususModel');
        $this->load->model('KegiatanModel');
        $this->load->model('KontenModel');
        
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
            'SEMESTER_PENGAJUAN' => date('Y') . $this->input->post('SEMESTER') == 0 ? " / Genap" : " / Ganjil",
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s')
        );

        echo date('Y');

        // $where = array(
        //     'NRP' => $this->input->post('NRP'),
        // );

        // $this->MahasiswaModel->acc($data, $where);

        // $query = $this->db->query('SELECT * FROM mahasiswa WHERE NRP="'.$this->input->post('NRP').'"')->result();
        
        // foreach($query as $data){
        //     $token = $data->TOKEN;
        // }

        // $dataAccTugasKhususNotif = array(
        //     'token' => $token,
        // );

        // $this->load->view('notifikasi/NotifikasiAccTugasKhususView', $dataAccTugasKhususNotif);
        // $this->session->set_tempdata('tugasKhususView', '<div class="alert alert-success" role="alert">Berhasil validasi tugas khusus</div>', 1);
        // redirect('tugaskhusus');
    }
    
    public function tolak()
	{
        $data = array(
            'NILAI' => "E",
            'STATUS' => 2,
            'SEMESTER_PENGAJUAN' => null,
            'TANGGAL_VALIDASI' => date('Y-m-d H:i:s'),
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
        $this->session->set_tempdata('tugasKhususView', '<div class="alert alert-danger" role="alert">Berhasil menolak tugas khusus</div>', 1);
        redirect('tugaskhusus');
    }
    
    public function detail($nrp)
    {
        $where = array(
            'NRP' => $nrp,
            'STATUS_VALIDASI' => 1,
        );

        $data['mahasiswa'] = $this->MahasiswaModel->detail($nrp);
        $data['jenis_tugas_khusus'] = $this->TugasKhususModel->getJenisTugasKhusus($where);
        $data['tugas_khusus'] = $this->TugasKhususModel->getByNRP($where);
        $data['jumlah_kegiatan'] = $this->TugasKhususModel->getCountKegiatanByNRP($where);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/DetailValidasiTugasKhususView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }

    public function detailKegiatan($idTugasKhusus)
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
		$this->load->view('admin/DetailKegiatanValidasiTugasKhususView', $data);
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