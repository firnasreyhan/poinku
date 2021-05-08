<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarEventController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('DaftarEventModel');
        $this->load->model('JenisKegiatanModel');
        $this->load->model('LingkupKegiatanModel');
        $this->load->library('upload');
        
    }
    
    public function index()
    {
        $data['jenis']      = $this->JenisKegiatanModel->get();
        $data['lingkup']    = $this->LingkupKegiatanModel->get();
        $data['event']      = $this->DaftarEventModel->getAll();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/DaftarEventView', $data);
		$this->load->view('template/footer');
    }

    public function insert(){
        $config = ['upload_path' => './assets/img/event/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        $email          = $this->input->post('EMAIL');
        $jenisEvent     = $this->input->post('JENISEVENT');
        $lingkup        = $this->input->post('LINGKUP');
        $judul          = $this->input->post('JUDUL');
        $deskripsi      = $this->input->post('DESKRIPSI');
        $tanggalAcara   = $this->input->post('TANGGALACARA');
        $jamMulai       = $this->input->post('JAMMULAI');
        $jamSelesai     = $this->input->post('JAMSELESAI');
        $poster         = null;
        $kuota          = $this->input->post('KUOTA');

        if($this->upload->do_upload('POSTER')){ 
			$dataUpload     = $this->upload->data();
			$poster         = base_url('assets/img/event/' . $dataUpload['file_name']);
        }
        
        $data = array(
            'EMAIL'         => $email,
            'ID_JENIS'      => $jenisEvent,
            'ID_LINGKUP'    => $lingkup,
            'JUDUL'         => $judul,
            'DESKRIPSI'     => $deskripsi,
            'TANGGAL_ACARA' => $tanggalAcara,
            'JAM_MULAI'     => $jamMulai,
            'JAM_SELESAI'   => $jamSelesai,
            'POSTER'        => $poster,
            'KUOTA'         => $kuota,
            'TANGGAL_DATA'  => date('Y-m-d H:i:s')
        );

        $this->DaftarEventModel->insert($data);
        
        $query = $this->db->query('SELECT TOKEN FROM mahasiswa WHERE TOKEN IS NOT NULL')->result();

        $tgl = date("d F Y", strtotime($tanggalAcara));

        $dataPaketNotif = array(
            'judul' => $judul,
            'dataToken' => $query,
            'tanggalAcara' => $tgl,
            'jamMulai' => $jamMulai,
            'jamSelesai' => $jamSelesai
        );
        
        $this->load->view('notifikasi/NotifikasiEventView', $dataPaketNotif);

        redirect('daftarEvent');
    }

    public function viewUpdate($idEvent)
	{
        $data['jenis']          = $this->JenisKegiatanModel->get();
        $data['lingkup']        = $this->LingkupKegiatanModel->get();
        $data['detail_event']   = $this->DaftarEventModel->getDetail($idEvent);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/DaftarEventUpdateView', $data);
		$this->load->view('template/footer');
    }
    
    public function detail($idEvent)
	{
        $data['jenis']          = $this->JenisKegiatanModel->get();
        $data['lingkup']        = $this->LingkupKegiatanModel->get();
        $data['detail_event']   = $this->DaftarEventModel->getDetail($idEvent);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/DaftarEventDetailView', $data);
		$this->load->view('template/footer');
	}

    public function delete(){
        $idEvent = $this->input->post('IDEVENT');

        $this->DaftarEventModel->delete($idEvent);
        
        redirect('daftarEvent');
    }

    public function aksiUpdate(){
        $config = ['upload_path' => './assets/img/event/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        $idEvent        = $this->input->post('IDEVENT');
        $email          = $this->input->post('EMAIL');
        $jenisEvent     = $this->input->post('JENISEVENT');
        $lingkup        = $this->input->post('LINGKUP');
        $judul          = $this->input->post('JUDUL');
        $deskripsi      = $this->input->post('DESKRIPSI');
        $tanggalAcara   = $this->input->post('TANGGALACARA');
        $jamMulai       = $this->input->post('JAMMULAI');
        $jamSelesai     = $this->input->post('JAMSELESAI');
        $poster         = null;
        $kuota          = $this->input->post('KUOTA');

        if($this->upload->do_upload('POSTER')){ 
			$dataUpload     = $this->upload->data();
			$poster         = base_url('assets/img/event/' . $dataUpload['file_name']);
        }
        
        $dataPoster = array(
            'EMAIL'         => $email,
            'ID_JENIS'      => $jenisEvent,
            'ID_LINGKUP'    => $lingkup,
            'JUDUL'         => $judul,
            'DESKRIPSI'     => $deskripsi,
            'TANGGAL_ACARA' => $tanggalAcara,
            'JAM_MULAI'     => $jamMulai,
            'JAM_SELESAI'   => $jamSelesai,
            'POSTER'        => $poster,
            'KUOTA'         => $kuota,
            'TANGGAL_DATA'  => date('Y-m-d H:i:s')
        );

        $data = array(
            'EMAIL'         => $email,
            'ID_JENIS'      => $jenisEvent,
            'ID_LINGKUP'    => $lingkup,
            'JUDUL'         => $judul,
            'DESKRIPSI'     => $deskripsi,
            'TANGGAL_ACARA' => $tanggalAcara,
            'JAM_MULAI'     => $jamMulai,
            'JAM_SELESAI'   => $jamSelesai,
            'KUOTA'         => $kuota,
            'TANGGAL_DATA'  => date('Y-m-d H:i:s')
        );

        if($poster == null){
            $this->DaftarEventModel->update($data, $idEvent);
        }else{
            $this->DaftarEventModel->update($dataPoster, $idEvent);
        }

        redirect('daftarEvent');
    }

}

/* End of file LoginController.php */

?>