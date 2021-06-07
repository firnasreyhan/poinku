<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardKaprodiController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if(($this->session->userdata('idRole') != '4') && ($this->session->userdata('idRole') != '5') && ($this->session->userdata('idRole') != '6')){
            $this->session->sess_destroy();
            redirect('login');
        }

        if($this->session->userdata('log') != TRUE){
            $this->session->sess_destroy();
            redirect('login');
        }
        
        echo '<script>console.log("'.$this->session->userdata('role').'")</script>';
        $this->load->model('LoginModel');
        $this->load->model('MahasiswaModel');
        
    }
    
    public function index()
    {
        $idRole = $this->session->userdata('idRole');

        if ($idRole == '4') {
            $queryMahasiswa = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'TI'";
            $queryPengajuan = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'TI' AND STATUS = '0'";
            $queryDiterima = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'TI' AND STATUS = '1'";
            $queryDitolak = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'TI' AND STATUS = '2'";

            $data['jumlah_angkatan'] = $this->MahasiswaModel->countAngkatan("PRODI = 'TI'");
            $data['jumlah_aturan'] = $this->MahasiswaModel->countAturan("mahasiswa.PRODI = 'TI'");
            $data['jumlah_nilai'] = $this->MahasiswaModel->countNilai("PRODI = 'TI'");
        } elseif ($idRole == '5') {
            $queryMahasiswa = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE (PRODI = 'SI' OR PRODI = 'MI')";
            $queryPengajuan = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE (PRODI = 'SI' OR PRODI = 'MI') AND STATUS = '0'";
            $queryDiterima = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE (PRODI = 'TI' OR PRODI = 'MI') AND STATUS = '1'";
            $queryDitolak = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE (PRODI = 'SI' OR PRODI = 'MI') AND STATUS = '2'";

            $data['jumlah_angkatan'] = $this->MahasiswaModel->countAngkatan("(PRODI = 'SI' OR PRODI = 'MI')");
            $data['jumlah_aturan'] = $this->MahasiswaModel->countAturan("(mahasiswa.PRODI = 'SI' OR mahasiswa.PRODI = 'MI')");
            $data['jumlah_nilai'] = $this->MahasiswaModel->countNilai("(PRODI = 'SI' OR PRODI = 'MI')");
        } elseif ($idRole == '6') {
            $queryMahasiswa = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'DKV'";
            $queryPengajuan = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'DKV' AND STATUS = '0'";
            $queryDiterima = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'DKV' AND STATUS = '1'";
            $queryDitolak = "SELECT COUNT(NRP) as 'JUMLAH' FROM view_mahasiswa WHERE PRODI = 'DKV' AND STATUS = '2'";

            $data['jumlah_angkatan'] = $this->MahasiswaModel->countAngkatan("PRODI = 'DKV'");
            $data['jumlah_aturan'] = $this->MahasiswaModel->countAturan("mahasiswa.PRODI = 'DKV'");
            $data['jumlah_nilai'] = $this->MahasiswaModel->countNilai("PRODI = 'DKV'");
        }

        $data['jumlah_mahasiswa'] = $this->MahasiswaModel->getCountByProdi($queryMahasiswa)->JUMLAH;
        $data['jumlah_pengajuan'] = $this->MahasiswaModel->getCountByProdi($queryPengajuan)->JUMLAH;
        $data['jumlah_diterima'] = $this->MahasiswaModel->getCountByProdi($queryDiterima)->JUMLAH;
        $data['jumlah_ditolak'] = $this->MahasiswaModel->getCountByProdi($queryDitolak)->JUMLAH;
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('kaprodi/DashboardKaprodiView', $data);
		$this->load->view('template/footer');
    }


}

/* End of file LoginController.php */

?>