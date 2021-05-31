<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KegiatanModel extends CI_Model
{

    public function get($param)
    {
        return $this->db->where('ID_TUGAS_KHUSUS  =', $param['ID_TUGAS_KHUSUS'])->get('kegiatan')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('kegiatan', $param);
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

/* End of file KegiatanModel.php */
?>