<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatTugasKhususController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(($this->session->userdata('idRole') != '4') && ($this->session->userdata('idRole') != '5') && ($this->session->userdata('idRole') != '6')){
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
        $idRole = $this->session->userdata('idRole');
        $semester_pengajuan = $this->input->post('SEMINAR_PENGAJUAN');

        if ($semester_pengajuan == 0) {
            $query = "SELECT * FROM view_mahasiswa";
        } else {
            $query = "SELECT * FROM view_mahasiswa WHERE SEMESTER_PENGAJUAN = '$semester_pengajuan'";
        }

        $querySemester = "SELECT SEMESTER_PENGAJUAN FROM mahasiswa GROUP BY SEMESTER_PENGAJUAN";

        $data['mahasiswa'] = $this->MahasiswaModel->getForKaprodi($query);
        $data['semester_pengajuan'] = $this->MahasiswaModel->getForKaprodi($querySemester);
        $data['pengajuan'] = $semester_pengajuan;

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('admin/RiwayatTugasKhususView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
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
		$this->load->view('kaprodi/DetailMahasiswaView', $data);
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
		$this->load->view('kaprodi/DetailKegiatanMahasiswaView', $data);
		// $this->load->view('template/modal');
		$this->load->view('template/footer');
    }

}


/*
 End of file JenisKegiatanController.php */

?>