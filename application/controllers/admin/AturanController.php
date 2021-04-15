<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AturanController extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('AturanModel');
                $this->load->model('NilaiModel');
                $this->load->model('PoinModel');
                $this->load->model('JenisKegiatanModel');
                $this->load->model('LingkupKegiatanModel');
                $this->load->model('PeranKegiatanModel');
        }


        public function index()
        {
                $data['aturans'] = $this->AturanModel->getAll();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/AturanView', $data);
                // $this->load->view('template/modal');
                $this->load->view('template/footer');
        }

        public function insert()
        {
                $data = $_POST;
                $this->AturanModel->insert($data);
                redirect('aturan');
        }

        public function insertNilai()
        {
                $data = $_POST;
                $this->NilaiModel->insert($data);
                redirect('aturan/detail/' . $data['ID_ATURAN']);
        }

        public function insertPoin()
        {
                $data = $_POST;
                $this->PoinModel->insertBatch($data['FORM']);
                redirect('aturan/detail/' . $data['FORM'][0]['ID_ATURAN']);
        }

        public function insertMultiplePoin($param)
        {
                $data['aturan'] = $param;
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $data['peran'] = $this->PeranKegiatanModel->get();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/InsertPoinView', $data);
                $this->load->view('template/footer');
        }

        public function delete()
        {
                $data = $_POST;
                $this->AturanModel->delete($data);
                redirect('aturan');
        }

        public function deleteNilai()
        {
                $data = $_POST;
                $this->NilaiModel->delete($data);
                redirect('aturan/detail/' . $data['ID_ATURAN']);
        }

        public function deletePoin()
        {
                $data = $_POST;
                $this->PoinModel->delete($data);
                redirect('aturan/detail/' . $data['ID_ATURAN']);
        }

        public function detail($param)
        {
                $data['detail_aturan'] = $this->AturanModel->getDetail(['ID_ATURAN' => $param]);
                $data['nilai'] = $this->NilaiModel->getDetail(['ID_ATURAN' => $param]);
                $data['poin'] = $this->PoinModel->getDetail(['ID_ATURAN' => $param]);
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/DetailAturanView', $data);
                $this->load->view('template/footer');
        }

        public function update()
        {
                $data = $_POST;
                $this->AturanModel->update($data);
                redirect('aturan');
        }
        public function ajxGetDataMaster(){
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $data['peran'] = $this->PeranKegiatanModel->get();
                echo json_encode($data);

        }
}

/* End of file AturanController.php */

?>