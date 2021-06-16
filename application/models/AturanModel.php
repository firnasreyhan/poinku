<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AturanModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get('aturan')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('aturan', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->delete('aturan');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->get('aturan')->result();
    }

    public function getAturanAtif($param)
    {
        return $this->db->where($param)->get('aturan')->row_array();
    }

    public function update($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->update('aturan', $param);
    }

    public function updateAturanAktif($param)
    {
        $this->db->where('KATEGORI', $param['KATEGORI'])->set('AKTIF', '0')->update('aturan');
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->set('AKTIF', '1')->update('aturan');
    }
}

/* End of file AturanModel.php */
