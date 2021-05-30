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
    
    public function getPresensi($param)
    {
        return $this->db->where($param)->get('presensi')->row_array();
    }

    public function get($param)
    {
        $this->db->select('mahasiswa.EMAIL, mahasiswa.NRP, presensi.STATUS');
        $this->db->from('presensi');
        $this->db->join('mahasiswa', 'presensi.EMAIL = mahasiswa.EMAIL');
        $this->db->where('ID_EVENT', $param);
        return $this->db->get()->result();
    }

    public function update($where, $param)
    {
        return $this->db->where($where)->update('presensi', $param);
    }
}

/* End of file PresensiModel.php */

?>