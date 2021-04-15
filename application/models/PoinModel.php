<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PoinModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($param)
    {
        return $this->db->insert('poin', $param);
    }

    public function insertBatch($param)
    {
        return $this->db->insert_batch('poin', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_POIN', $param['ID_POIN'])->delete('poin');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->get('view_poin')->result();
    }

    public function getDetailPoin($param)
    {
        return $this->db->where('ID_POIN', $param['ID_POIN'])->get('poin')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_POIN', $param['ID_POIN'])->update('poin', $param);
    }
}

/* End of file PoinModel.php */
?>