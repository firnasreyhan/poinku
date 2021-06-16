<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
        $this->load->model('PresensiModel');
        $this->load->model('KuesionerModel');
        
        
        $this->load->library('upload');
        
    }
    
    public function index()
    {
        $email = $this->session->userdata('email');
        $this->PresensiModel->updateIsSeen();
        
        $data['jenis']      = $this->JenisKegiatanModel->get();
        $data['lingkup']    = $this->LingkupKegiatanModel->get();
        $data['event']      = $this->DaftarEventModel->getAll($email);

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
        $pembicara      = $this->input->post('PEMBICARA');
        $lokasi         = $this->input->post('LOKASI');
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
            'PEMBICARA'     => $pembicara,
            'LOKASI'        => $lokasi,
            'TANGGAL_ACARA' => $tanggalAcara,
            'JAM_MULAI'     => $jamMulai,
            'JAM_SELESAI'   => $jamSelesai,
            'POSTER'        => $poster,
            'KUOTA'         => $kuota,
            'TANGGAL_DATA'  => date('Y-m-d H:i:s')
        );

        $idEvent = $this->DaftarEventModel->insert($data);
        
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

        $this->updateQRCode($idEvent);
    }

    public function updateQRCode($idEvent)
    {
        $this->load->library('ciqrcode');

        $config['cacheable']	= true; //boolean, the default is true
        $config['cachedir']		= ''; //string, the default is application/cache/
        $config['errorlog']		= ''; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/qr/'; //direktori penyimpanan qr code
        $config['quality']		= true; //boolean, the default is true
        $config['size']			= '2048'; //interger, the default is 1024
        $config['black']		= array(224,255,255); // array, default is array(255,255,255)
        $config['white']		= array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name = $idEvent.'_QR.png'; //buat name dari qr code sesuai dengan nim
        
        $params['data'] = base_url('kuesionerKegiatan/'.$idEvent);
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);

        $dataQR = array(
            'QR_CODE'         => base_url('assets/img/qr/' . $image_name)
        );

        $this->DaftarEventModel->update($dataQR, $idEvent);
 
        $this->session->set_tempdata('daftarEventView', '<div class="alert alert-success" role="alert">Berhasil menambah event</div>', 1);
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
        $data['presensi']       = $this->PresensiModel->get($idEvent);
        $data['detail_event']   = $this->DaftarEventModel->getDetail($idEvent);
        $data['kehadiran']      = $this->DaftarEventModel->getDetailTotalKehadiran($idEvent);
        $data['peserta']      = $this->DaftarEventModel->getDetailTotalPeserta($idEvent);
        $data['prodi']      = $this->DaftarEventModel->getDetailTotalProdi($idEvent);
        $data['angkatan']      = $this->DaftarEventModel->getDetailTotalAngkatan($idEvent);
        
        $data['materi']      = $this->KuesionerModel->getMateri($idEvent);
        $data['pemateri']      = $this->KuesionerModel->getPemateri($idEvent);
        $data['bermanfaat']      = $this->KuesionerModel->getBermanfaat($idEvent);
        $data['menambah_wawasan']      = $this->KuesionerModel->getMenambahWawsan($idEvent);
        $data['pelaksanaan']      = $this->KuesionerModel->getPelaksanaan($idEvent);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/DaftarEventDetailView', $data);
		$this->load->view('template/footer');
	}

    public function detailKuesioner($param)
    {
        $idEvent = substr($param, 0, strpos($param, '-'));
        $email = substr($param, strpos($param, '-') + 1);

        $where = array(
            'EMAIL'         => $email,
            'ID_EVENT'      => $idEvent
        );

        $data['kuesioner'] = $this->KuesionerModel->getDetail($where);

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
        $this->load->view('eventManager/DetailKuesionerView', $data);
		$this->load->view('template/footer');
    }

    public function delete(){
        $idEvent = $this->input->post('IDEVENT');
        $this->DaftarEventModel->delete($idEvent);
        $this->session->set_tempdata('daftarEventView', '<div class="alert alert-danger" role="alert">Berhasil menghapus event</div>', 1);
        redirect('daftarEvent');
    }

    public function aksiUpdate(){
        $config = ['upload_path' => './assets/img/event/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        $idEvent        = $this->input->post('IDEVENT');
        $email          = $this->session->userdata('email');
        $jenisEvent     = $this->input->post('JENISEVENT');
        $lingkup        = $this->input->post('LINGKUP');
        $judul          = $this->input->post('JUDUL');
        $pembicara          = $this->input->post('PEMBICARA');
        $lokasi          = $this->input->post('LOKASI');
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
            'PEMBICARA'     => $pembicara,
            'LOKASI'        => $lokasi,
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
            'PEMBICARA'     => $pembicara,
            'LOKASI'        => $lokasi,
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

        $this->session->set_tempdata('daftarEventView', '<div class="alert alert-warning" role="alert">Berhasil mengubah event</div>', 1);
        redirect('daftarEvent');
    }

    public function print($idEvent)
    {
        if (!is_dir("assets/img/template_sertifikat/")) {
            mkdir("assets/img/template_sertifikat/", 0777, TRUE);
        }

        $config = ['upload_path' => './assets/img/template_sertifikat/', 'allowed_types' => 'jpg|png|jpeg', 'max_size' => 1024];            
        $this->upload->initialize($config);

        if($this->upload->do_upload('TEMPLATE_SERTIFIKAT')){ 
			$dataUpload     = $this->upload->data();
			$poster         = base_url('assets/img/template_sertifikat/' . $dataUpload['file_name']);
        }

        $idEvent = $this->input->post('ID_EVENT');
        $update = $this->DaftarEventModel->updateTemplateSertifikat($poster, $idEvent);
        if ($update == 1) {
            //get data database
            $dataPresensi = $this->db->query("SELECT * FROM presensi WHERE ID_EVENT = '$idEvent' AND STATUS = 1")->result();
            $dataPresensiRow = $this->db->query("SELECT * FROM presensi WHERE ID_EVENT = '$idEvent' AND STATUS = 1")->num_rows();
            $dataEvent = $this->db->query("SELECT * FROM event WHERE ID_EVENT = '$idEvent'")->result();

            // perulangan berdasarkan data presensi
            for ($i=0; $i < $dataPresensiRow ; $i++) { 
                $this->load->library('pdfgenerator');
                $this->load->library('email');

                //substring judul event
                $judul = $dataEvent[0]->JUDUL;
                // $judul = str_replace(' ', '_', $str);
                $idEvent = $dataEvent[0]->ID_EVENT;
                $templateSertifikat = $dataEvent[0]->TEMPLATE_SERTIFIKAT;
                
                //data untuk sertifikat
                $data = [
                    'nama' => $dataPresensi[$i]->NAMA,
                    'judul' => $judul,
                    'template_sertifikat' => $templateSertifikat,
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
                $path_pdf = 'uploads/event/sertifikat/'.$idEvent.'/'.$file_pdf.'.pdf';    

                //compile sertifikat
                $resPdf = $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
                if(!is_dir('./uploads/event/sertifikat/'.$idEvent.'')){
                    mkdir('./uploads/event/sertifikat/'.$idEvent.'', 0777, TRUE);
                    print_r(true);
                } else {
                    print_r(false);
                }

                //simpan sertifikat ke direktori
                file_put_contents($path_pdf, $resPdf);
        
                //ambil data presensi yang baru
                $dataPresensiBaru = $this->db->query("SELECT * FROM presensi WHERE ID_EVENT = '$idEvent' AND EMAIL= '$email' AND STATUS = 1")->result();
                
                //ambil email dari data presensi baru
                foreach($dataPresensiBaru as $dtPresBr){
                    $dtEmail = $dtPresBr->EMAIL;
                }

                $dataUpdateSertifikat = array(
                    'SERTIFIKAT' => base_url().'uploads/event/sertifikat/'.$idEvent.'/'.$file_pdf.'.pdf'
                );
                
                $where = array(
                    'EMAIL' => $dtEmail
                );

                //update data presensi dengan sertifikat baru
                $this->db->set($dataUpdateSertifikat);
                $this->db->where($where);
                $this->db->update('presensi');

                //ambil data presensi dengan sertifikat
                $dataPresensiBaruSertifikat = $this->db->query("SELECT * FROM presensi WHERE ID_EVENT = '$idEvent' AND EMAIL= '$email' AND STATUS = 1")->result();
                
                foreach($dataPresensiBaruSertifikat as $dtSer){
                    $sertifikat = $dtSer->SERTIFIKAT;
                }

                //data untuk email
                $dataEmail = array(
                    'SERTIFIKAT' => $sertifikat,
                    'EMAIL' => $dtEmail,
                );
                
                // //konfigurasi email
                // $config['useragent'] = 'Poinku';
                // $config['protocol'] = 'smtp';
                
                // $config['smtp_host'] = 'smtp.googlemail.com';
                // $config['smtp_user'] = 'adm.tomboati@gmail.com'; //gantien dewe
                // $config['smtp_pass'] = 'TomboAti123'; //gantien dewe sesuaino karo email e
                // $config['smtp_port'] = 465; 
                // $config['smtp_timeout'] = 15;
                // $config['wordwrap'] = TRUE;
                // $config['wrapchars'] = 76;
                // $config['mailtype'] = 'html';
                // $config['charset'] = 'UTF-8';
                // $config['validate'] = FALSE;
                // $config['priority'] = 3;
                // $config['crlf'] = "\r\n";
                // $config['newline'] = "\r\n";
                // $config['bcc_batch_mode'] = FALSE;
                // $config['bcc_batch_size'] = 200;
        
                // $this->email->initialize($config);
                
                // $this->email->from('adm.tomboati@gmail.com', 'Admin Poinku'); 
                // $this->email->to($dtEmail); 
                // $this->email->subject('Sertifikat');
                // $msg =  $this->load->view('template/emailSertifikat',$dataEmail,true);
                // $this->email->message($msg);

                // //cek email sent
                // if ($this->email->send()) {
                //     $this->session->set_tempdata('message', '<div class="alert alert-success" role="alert">
                //     Terkirim
                //   </div>', 1);
                //   redirect('daftarEvent/detail/'.$idEvent);
                // } else {
                //     echo $this->email->print_debugger();
                // }

                require 'vendor/autoload.php';
                //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();             
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                                 //Send using SMTP
                    $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'adm.tomboati@gmail.com';                     //SMTP username
                    $mail->Password   = 'TomboAti123';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('adm.tomboati@gmail.com', 'Admin Poinku');
                    $mail->addAddress($dtEmail);     //Add a recipient
                
                    //Attachments
                    $mail->addAttachment($path_pdf);         //Add attachments
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Sertifikat';
                    $mail->Body    = $this->load->view('template/emailSertifikat',$dataEmail,true);
                
                    $mail->send();
                    if ($i == ($dataPresensiRow - 1)) {
                        $this->session->set_tempdata('message', '<div class="alert alert-success" role="alert">Terkirim</div>', 1);
                        redirect('daftarEvent/detail/'.$idEvent);
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }  
        }  
    }

}

/* End of file LoginController.php */

?>