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

    public function delete($param)
    {
        return $this->db->where($param)->delete('kegiatan');
    }
}
