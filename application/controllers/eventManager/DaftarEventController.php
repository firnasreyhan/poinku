<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarEventController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if($this->session->userdata('role') != 'Event Manager'){
            $this->session->sess_destroy();
            redirect('login');
        }

        if($this->session->userdata('log') != TRUE){
            $this->session->sess_destroy();
            redirect('login');
        }

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

    public function print($idEvent)
    {
        //get data database
        $dataPresensi = $this->db->query('SELECT * FROM presensi WHERE ID_EVENT ="'.$idEvent.'"')->result();
        $dataPresensiRow = $this->db->query('SELECT * FROM presensi WHERE ID_EVENT ="'.$idEvent.'"')->num_rows();
        $dataEvent = $this->db->query('SELECT * FROM event WHERE ID_EVENT ="'.$idEvent.'"')->result();
        
        //perulangan berdasarkan data presensi
        for ($i=0; $i < $dataPresensiRow ; $i++) { 
            
            $this->load->library('pdfgenerator');
            $this->load->library('email');

            //substring judul event
            $str = $dataEvent[0]->JUDUL;
            // $judul = str_replace(' ', '_', $str);
            $judul = $dataEvent[0]->ID_EVENT;
            
            //data untuk sertifikat
            $data = [
                'email' => $dataPresensi[$i]->EMAIL,
                'judul' => $judul,
                'penyelenggara' => $this->session->userdata('nama')
            ];

            //substring email
            $email = $dataPresensi[$i]->EMAIL;
            $email_substr = substr($email,0,9);

            //config template untuk sertifikat
            $html = $this->load->view('template/template_sertifikat', $data, true);	
            $file_pdf = $email_substr;
            $paper = 'A4';
            $orientation = 'landscape';
            
            //lokasi upload sertifikat
            $path_pdf = 'uploads/event/sertifikat/'.$judul.'/'.$file_pdf.'.pdf';    

            //compile sertifikat
            $resPdf = $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
            if(!is_dir('./uploads/event/sertifikat/'.$judul.'')){
                mkdir('./uploads/event/sertifikat/'.$judul.'', 0777, TRUE);
            }

            //simpan sertifikat ke direktori
            file_put_contents($path_pdf, $resPdf);
    
            //ambil data presensi yang baru
            $dataPresensiBaru = $this->db->query('SELECT * FROM presensi WHERE ID_EVENT ="'.$idEvent.'" AND EMAIL="'.$email.'"')->result();
            
            //ambil email dari data presensi baru
            foreach($dataPresensiBaru as $dtPresBr){
                $dtEmail = $dtPresBr->EMAIL;
            }

            $dataUpdateSertifikat = array(
                'SERTIFIKAT' => base_url().'uploads/event/sertifikat/'.$judul.'/'.$file_pdf.'.pdf'
            );
            
            $where = array(
                'EMAIL' => $dtEmail
            );

            //update data presensi dengan sertifikat baru
            $this->db->set($dataUpdateSertifikat);
            $this->db->where($where);
            $this->db->update('presensi');

            //ambil data presensi dengan sertifikat
            $dataPresensiBaruSertifikat = $this->db->query('SELECT * FROM presensi WHERE ID_EVENT ="'.$idEvent.'" AND EMAIL="'.$email.'"')->result();
            
            foreach($dataPresensiBaruSertifikat as $dtSer){
                $sertifikat = $dtSer->SERTIFIKAT;
            }

            //data untuk email
            $dataEmail = array(
                'SERTIFIKAT' => $sertifikat,
                'EMAIL' => $dtEmail,
            );
            
            //konfigurasi email
            $config['useragent'] = 'Poinku';
            $config['protocol'] = 'smtp';
            
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_user'] = 'adm.tomboati@gmail.com'; //gantien dewe
            $config['smtp_pass'] = 'TomboAti123'; //gantien dewe sesuaino karo email e
            $config['smtp_port'] = 465; 
            $config['smtp_timeout'] = 15;
            $config['wordwrap'] = TRUE;
            $config['wrapchars'] = 76;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['validate'] = FALSE;
            $config['priority'] = 3;
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['bcc_batch_mode'] = FALSE;
            $config['bcc_batch_size'] = 200;
    
            $this->email->initialize($config);
            
            $this->email->from('adm.tomboati@gmail.com', 'Admin Poinku'); 
            $this->email->to($dtEmail); 
            $this->email->subject('Sertifikat');
            $msg =  $this->load->view('template/emailSertifikat',$dataEmail,true);
            $this->email->message($msg);

            //cek email sent
            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Terkirim
              </div>');
            } else {
                echo $this->email->print_debugger();
            }
        }
        redirect('daftarEvent/detail/'.$idEvent);
        
    }

}

/* End of file LoginController.php */

?>