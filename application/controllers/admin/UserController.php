<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'Admin') {
            $this->session->sess_destroy();
            redirect('login');
        }

        if ($this->session->userdata('log') != TRUE) {
            $this->session->sess_destroy();
            redirect('login');
        }
        $this->load->model('UserModel');
    }


    public function index()
    {
        $data['users'] = $this->UserModel->getAll();
        $data['roles'] = $this->UserModel->getRoles();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/UserView', $data);
        // $this->load->view('template/modal');
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = $_POST;
        $this->UserModel->insert($data);

        $dataEmail = array(
            'PASSWORD' => $this->input->post('PASSWORD'),
            'EMAIL' => $this->input->post('EMAIL'),
        );
        $this->load->library('email');

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
        $this->email->to($this->input->post('EMAIL'));
        $this->email->subject('Akun Password');
        $msg =  $this->load->view('template/email', $dataEmail, true);
        $this->email->message($msg);

        if ($this->email->send()) {
            redirect('user');
        } else {
            echo 'error';
        }
    }

    public function delete()
    {
        $data = $_POST;
        $this->UserModel->delete($data);
        redirect('user');
    }

    public function detail($param)
    {
        $data['user'] = $this->UserModel->getDetail(['EMAIL' => $param]);
        $data['role'] = $this->UserModel->getROles();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/UserUpdateView', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $data = $_POST;
        $this->UserModel->update($data);
        redirect('user');
    }
}


/*
 End of file JenisKegiatanController.php */
