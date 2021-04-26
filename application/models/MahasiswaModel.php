<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get($param)
    {
        return $this->db->where('NRP', $param['NRP'])->get('mahasiswa')->row_array();
    }

}

/* End of file MahasiswaModel.php */

?>