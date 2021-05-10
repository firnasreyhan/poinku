<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PresensiModel extends CI_Model {

    public function insert($param)
    {
        return $this->db->insert('presensi', $param);
    }

    public function delete($param)
    {
        return $this->db->where($param)->delete('presensi');
    }

    public function getDetail($param)
    {
        return $this->db->where($param)->get('presensi')->row_array();
    }

    public function getPresensi($param)
    {
        return $this->db->where($param)->get('presensi')->row_array();
    }

}

/* End of file PresensiModel.php */

?>