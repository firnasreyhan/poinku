<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TugasKhususModel extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tugas_khusus');
        $this->db->join('mahasiswa', 'tugas_khusus.NRP = mahasiswa.NRP');
        $this->db->join('jenis', 'tugas_khusus.ID_JENIS = jenis.ID_JENIS');
        $this->db->join('lingkup', 'tugas_khusus.ID_LINGKUP = lingkup.ID_LINGKUP');
        $this->db->join('peran', 'tugas_khusus.ID_PERAN = peran.ID_PERAN');
        $this->db->where('tugas_khusus.STATUS_VALIDASI', '0');
        return $this->db->get()->result();
        
        // return $this->db->where('NRP =', $param['NRP'])->get('tugas_khusus')->result();
    }

    public function get($param)
    {
        return $this->db->where('NRP =', $param['NRP'])->get('tugas_khusus')->result();
    }

    public function getPoin($param)
    {
        return $this->db->where('NRP =', $param['NRP'])->where('ID_JENIS =', $param['ID_JENIS'])->order_by("TANGGAL_DATA", "desc")->get('view_tugas_khusus')->result();
    }
    
    public function getDetail($param)
    {
        return $this->db->where('ID_TUGAS_KHUSUS =', $param['ID_TUGAS_KHUSUS'])->get('view_tugas_khusus')->row_array();
    }

    public function getKegiatan($param)
    {
        return $this->db->where('ID_TUGAS_KHUSUS =', $param['ID_TUGAS_KHUSUS'])->get('kegiatan')->row_array();
    }

    public function getKonten($param)
    {
        return $this->db->where('ID_TUGAS_KHUSUS =', $param['ID_TUGAS_KHUSUS'])->get('konten')->row_array();
    }

    public function getTotalPoin($param)
    {
        return $this->db->where('NRP =', $param['NRP'])->select_sum('POIN')->get('view_tugas_khusus')->row_array();
    }

    public function getJenisTugasKhusus($param)
    {
        return $this->db->where('NRP =', $param['NRP'])->order_by("JENIS", "ASC")->get('view_jenis_tugas_khusus')->result();
    }
    
    public function getKriteriaTugasKhusus($param)
    {
        return $this->db->where('NRP =', $param['NRP'])->order_by("ID_JENIS", "ASC")->get('view_kriteria_tugas_khusus')->result();
    }

    public function insert($param)
    {
        $this->db->insert('tugas_khusus', $param);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
        // return $this->db->insert('tugas_khusus', $param);
    }

    // public function delete($param)
    // {
    //     return $this->db->where('ID_JENIS', $param['ID_JENIS'])->delete('jenis');
    // }

    // public function getDetail($param)
    // {
    //     return $this->db->where('ID_JENIS', $param['ID_JENIS'])->get('jenis')->result();
    // }

    public function update($param)
    {
        return $this->db->where('ID_TUGAS_KHUSUS', $param['ID_TUGAS_KHUSUS'])->update('tugas_khusus', $param);
    }
}

/* End of file TugasKhususModel.php */
?>