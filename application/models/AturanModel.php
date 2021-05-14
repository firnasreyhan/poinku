<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AturanModel extends CI_Model {

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

    public function update($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->update('aturan', $param);
    }

}

/* End of file AturanModel.php */

?>