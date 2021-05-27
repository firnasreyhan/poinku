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

}

/* End of file MahasiswaModel.php */

?>