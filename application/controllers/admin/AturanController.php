<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AturanController extends CI_Controller
{

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

                $this->load->model('AturanModel');
                $this->load->model('NilaiModel');
                $this->load->model('PoinModel');
                $this->load->model('JenisKegiatanModel');
                $this->load->model('LingkupKegiatanModel');
                $this->load->model('PeranKegiatanModel');
                $this->load->model('KriteriaModel');
                $this->load->model('MahasiswaModel');
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

        public function insertKriteria()
        {
                $data = $_POST;
                $this->KriteriaModel->insertBatch($data['FORM']);
                redirect('aturan/nilai/kriteria/' . $data['FORM'][0]['ID_NILAI']);
        }

        public function insertMultiplePoin($param)
        {
                $data['aturan'] = $param;
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $data['peran'] = $this->PeranKegiatanModel->get();
                $data['detail_poin'] = $this->PoinModel->getDetailPoin(['ID_POIN' => $param]);

                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/InsertPoinView', $data);
                $this->load->view('template/footer');
        }

        public function insertMultipleKriteria($param)
        {
                $data['nilai'] = $param;
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $data['detail_kriteria'] = $this->KriteriaModel->getDetailKriteria(['ID_KRITERIA' => $param]);
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/InsertKriteriaView', $data);
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

        public function deleteKriteria()
        {
                $data = $_POST;
                $this->KriteriaModel->delete($data);
                redirect('aturan/nilai/kriteria/' . $data['ID_NILAI']);
        }

        public function detail($param)
        {
                $detail_aturan = $this->AturanModel->getDetail(['ID_ATURAN' => $param]);
                $nilai = $this->NilaiModel->getDetail(['ID_ATURAN' => $param]);
                $poin = $this->PoinModel->getDetail(['ID_ATURAN' => $param]);
                $mahasiswa = $this->MahasiswaModel->getByAturan(['ID_ATURAN' => $param]);
                $aturan = $this->AturanModel->getAll();

                $tahun = null;
                $keterangan = null;
                foreach($detail_aturan as $row){
                        $tahun = $row->TAHUN;
                        $keterangan = $row->KETERANGAN;
                }

                $data = [
                        'id_aturan_aktif' => $param,
                        'tahun' => $tahun,
                        'keterangan' => $keterangan,
                        'detail_aturan' => $detail_aturan,
                        'poin' => $poin,
                        'nilai' => $nilai,
                        'mahasiswa' => $mahasiswa,
                        'aturan' => $aturan
                ];

                echo '<script>console.log("'.$tahun.'")</script>';
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/DetailAturanView', $data);
                $this->load->view('template/footer');
        }

        public function detailPoin($param)
        {
                $data['detail_poin'] = $this->PoinModel->getDetailPoin(['ID_POIN' => $param]);
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $data['peran'] = $this->PeranKegiatanModel->get();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/PoinUpdateView', $data);
                $this->load->view('template/footer');
        }

        public function detailNilai($param)
        {
                $data['detail_nilai'] = $this->NilaiModel->getDetailNilai(['ID_NILAI' => $param]);
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/NilaiUpdateView', $data);
                $this->load->view('template/footer');
        }

        public function detailKriteria($param)
        {
                $data['detail_kriteria'] = $this->KriteriaModel->getDetailKriteria(['ID_KRITERIA' => $param]);
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/KriteriaUpdateView', $data);
                $this->load->view('template/footer');
        }
        
        public function kriteria($param)
        {
                $data['nilai'] = $param;
                $data['kriteria'] = $this->KriteriaModel->getDetail(['ID_NILAI' => $param]);
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar');
                $this->load->view('admin/KriteriaView', $data);
                $this->load->view('template/footer');
        }

        public function update()
        {
                $data = $_POST;
                $this->AturanModel->update($data);
                redirect('aturan');
        }

        public function updateAturanAktif()
        {
                $data = $_POST;
                $this->AturanModel->updateAturanAktif($data);
                redirect('aturan');
        }

        public function updatePoin()
        {
                $data = $_POST;
                $this->PoinModel->update($data);
                redirect('aturan/detail/' . $data['ID_ATURAN']);
        }

        public function updateNilai()
        {
                $data = $_POST;
                $this->NilaiModel->update($data);
                redirect('aturan/detail/' . $data['ID_ATURAN']);
        }

        public function updateKriteria()
        {
                $data = $_POST;
                $this->KriteriaModel->update($data);
                redirect('aturan/nilai/kriteria/' . $data['ID_NILAI']);
        }

        public function updateActive()
        {
                $data = $_POST;
                $this->AturanModel->update($data);
                redirect('aturan');
        }

        public function ajxGetDataMaster()
        {
                $data['jenis'] = $this->JenisKegiatanModel->get();
                $data['lingkup'] = $this->LingkupKegiatanModel->get();
                $data['peran'] = $this->PeranKegiatanModel->get();
                echo json_encode($data);
        }

        public function UpdateMultipleMahasiswa()
        {
                $data = $_POST;

                $data['NRP'] = explode(',', $data['NRP']);

                $this->MahasiswaModel->updateMultipleAturan($data);

                
                redirect('aturan/detail/' . $data['ID_ATURAN_AKTIF']);
        }
}

/* End of file AturanController.php */

?>