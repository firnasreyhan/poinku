<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('aturan', 'mahasiswa.ID_ATURAN = aturan.ID_ATURAN');
        $this->db->where('mahasiswa.STATUS', '0');
        return $this->db->get()->result();
    }

    public function getForKaprodi($param)
    {
        return $this->db->query($param)->result();
    }

    public function getByAturan($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->get('view_mahasiswa')->result();
    }

    public function getCountByProdi($param)
    {
        $query = $this->db->query($param);
        return $query->row();
    }

    public function get($param)
    {
        return $this->db->where('NRP', $param['NRP'])->get('view_mahasiswa')->row_array();
    }
    
    public function insert($param)
    {
        $this->db->insert('mahasiswa', $param);
        return $this->get($param);
    }
    
    public function updateToken($param)
    {
        return $this->db->where('NRP', $param['NRP'])->update('mahasiswa', $param);
    }

    public function pengajuan($data, $where)
    {
        return $this->db->set($data)->where($where)->update('mahasiswa');
    }

    public function acc($data, $where)
    {
        return $this->db->set($data)->where($where)->update('mahasiswa');
    }

    public function tolak($data, $where)
    {
        return $this->db->set($data)->where($where)->update('mahasiswa');
    }

    public function detail($nrp){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('aturan', 'mahasiswa.ID_ATURAN = aturan.ID_ATURAN');
        $this->db->where('NRP', $nrp);
        return $this->db->get()->result();
    }

    public function updateMultipleAturan($param)
    {
        return $this->db->where_in('NRP', $param['NRP'])->set('ID_ATURAN', $param['ID_ATURAN'])->update('mahasiswa');
    }

    public function countAngkatan($param)
    {
        return $this->db->query("SELECT ANGKATAN, COUNT(ANGKATAN) AS 'JUMLAH' FROM view_mahasiswa WHERE $param GROUP BY ANGKATAN ORDER BY ANGKATAN ASC")->result();
    }

    public function countAturan($param)
    {
        return $this->db->query("SELECT aturan.TAHUN, aturan.KATEGORI, COUNT(mahasiswa.ID_ATURAN) AS 'JUMLAH' FROM aturan INNER JOIN mahasiswa ON aturan.ID_ATURAN = mahasiswa.ID_ATURAN AND $param ORDER BY aturan.ID_ATURAN ASC")->result();
    }

    public function countNilai($param)
    {
        return $this->db->query("SELECT NILAI, COUNT(NILAI) AS 'JUMLAH' FROM view_mahasiswa WHERE $param AND STATUS = '1' GROUP BY NILAI ORDER BY NILAI ASC")->result();
    }
}

/* End of file MahasiswaModel.php */

?>