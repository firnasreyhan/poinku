<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JenisKegiatanModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->where('ID_JENIS !=', '1')->get('jenis')->result();
    }

    public function get()
    {
        return $this->db->get('jenis')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('jenis', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_JENIS', $param['ID_JENIS'])->delete('jenis');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_JENIS', $param['ID_JENIS'])->get('jenis')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_JENIS', $param['ID_JENIS'])->update('jenis', $param);
    }
}

/* End of file JenisKegiatanModel.php */
?>