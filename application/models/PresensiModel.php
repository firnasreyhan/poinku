<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PresensiModel extends CI_Model
{

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
        $this->db->from('presensi');
        $this->db->where('ID_EVENT', $param);
        return $this->db->get()->result();
    }

    public function update($where, $param)
    {
        $this->db->where($where)->update('presensi', $param);
        return ($this->db->affected_rows() > 0);
    }

    public function updateIsSeen()
    {
        return $this->db->set('IS_SEEN', '1')->update('presensi');
    }

    public function getTotalHadir($param)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('presensi', 'event.ID_EVENT = presensi.ID_EVENT');
        $this->db->where('event.EMAIL', $param);
        $this->db->where('presensi.STATUS', '1');
        return $this->db->count_all_results();
    }


    public function getTotalTidakHadir($param)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('presensi', 'event.ID_EVENT = presensi.ID_EVENT');
        $this->db->where('event.EMAIL', $param);
        $this->db->where('presensi.STATUS', '0');
        return $this->db->count_all_results();
    }
}

/* End of file PresensiModel.php */
