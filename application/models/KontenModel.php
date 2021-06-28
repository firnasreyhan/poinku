<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KontenModel extends CI_Model
{

    public function get($param)
    {
        return $this->db->where('ID_TUGAS_KHUSUS  =', $param['ID_TUGAS_KHUSUS'])->get('konten')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('konten', $param);
    }

    public function delete($param)
    {
        return $this->db->where($param)->delete('konten');
    }

    public function update($where, $data)
    {
        return $this->db->where($where)->update('konten', $data);
    }
}
