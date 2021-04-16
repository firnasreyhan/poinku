<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($param)
    {
        return $this->db->insert('nilai', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_NILAI', $param['ID_NILAI'])->delete('nilai');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->get('nilai')->result();
    }

    public function getDetailNilai($param)
    {
        return $this->db->where('ID_NILAI', $param['ID_NILAI'])->get('nilai')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_NILAI', $param['ID_NILAI'])->update('nilai', $param);
    }

}

/* End of file NilaiModel.php */

?>