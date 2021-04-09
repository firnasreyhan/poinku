<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PeranKegiatanModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->where('ID_PERAN !=', '1')->get('peran')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('peran', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_PERAN', $param['ID_PERAN'])->delete('peran');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_PERAN', $param['ID_PERAN'])->get('peran')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_PERAN', $param['ID_PERAN'])->update('peran', $param);
    }
}
    
    /* End of file PeranKegiatanModel.php */
?>