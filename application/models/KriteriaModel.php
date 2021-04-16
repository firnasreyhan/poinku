<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($param)
    {
        return $this->db->insert('kriteria', $param);
    }

    public function insertBatch($param)
    {
        return $this->db->insert_batch('kriteria', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_KRITERIA', $param['ID_KRITERIA'])->delete('kriteria');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_NILAI', $param['ID_NILAI'])->get('view_kriteria')->result();
    }

    public function getDetailKriteria($param)
    {
        return $this->db->where('ID_KRITERIA', $param['ID_KRITERIA'])->get('kriteria')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_KRITERIA', $param['ID_KRITERIA'])->update('kriteria', $param);
    }
}

/* End of file KriteriaModel.php */
?>