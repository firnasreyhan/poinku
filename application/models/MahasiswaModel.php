<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get($param)
    {
        return $this->db->where('NRP', $param['NRP'])->get('view_mahasiswa')->row_array();
    }
    
    public function insert($param)
    {
        $this->db->insert('mahasiswa', $param);
        return $this->get($param);
    }
    
    public function updateToken($param)
    {
        return $this->db->where('NRP', $param['NRP'])->update('mahasiswa', $param);
    }

}

/* End of file MahasiswaModel.php */

?>