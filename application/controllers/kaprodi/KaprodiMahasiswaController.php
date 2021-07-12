<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KaprodiMahasiswaController extends CI_Controller {

    
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

        if ($idRole == '4') {
            $query = "SELECT * FROM view_mahasiswa WHERE PRODI = 'TI'";
            $querySemester = "SELECT SEMESTER_PENGAJUAN FROM mahasiswa WHERE PRODI = 'TI' GROUP BY SEMESTER_PENGAJUAN";
        } elseif ($idRole == '5') {
            $query = "SELECT * FROM view_mahasiswa WHERE PRODI = (PRODI = 'SI' OR PRODI = 'MI')";
            $querySemester = "SELECT SEMESTER_PENGAJUAN FROM mahasiswa WHERE PRODI = (PRODI = 'SI' OR PRODI = 'MI') GROUP BY SEMESTER_PENGAJUAN";
        } elseif ($idRole == '6') {
            $query = "SELECT * FROM view_mahasiswa WHERE PRODI = 'DKV'";
            $querySemester = "SELECT SEMESTER_PENGAJUAN FROM mahasiswa WHERE PRODI = 'DKV' GROUP BY SEMESTER_PENGAJUAN";
        }

        $data['mahasiswa'] = $this->MahasiswaModel->getForKaprodi($query);
        $data['semester_pengajuan'] = $this->MahasiswaModel->getForKaprodi($querySemester);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('kaprodi/KaprodiMahasiswaView', $data);
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