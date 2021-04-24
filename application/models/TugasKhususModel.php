<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TugasKhususModel extends CI_Model
{

    public function get($param)
    {
        return $this->db->where('NRP =', $param['NRP'])->get('tugas_khusus')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('tugas_khusus', $param);
    }

    // public function delete($param)
    // {
    //     return $this->db->where('ID_JENIS', $param['ID_JENIS'])->delete('jenis');
    // }

    // public function getDetail($param)
    // {
    //     return $this->db->where('ID_JENIS', $param['ID_JENIS'])->get('jenis')->result();
    // }

    // public function update($param)
    // {
    //     return $this->db->where('ID_JENIS', $param['ID_JENIS'])->update('jenis', $param);
    // }
}

/* End of file TugasKhususModel.php */
?>