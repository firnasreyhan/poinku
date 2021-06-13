<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class KuesionerModel extends CI_Model {

    public function insert($param)
    {
        return $this->db->insert('kuesioner', $param);
    }

    public function getMateri($param)
    {
        return $this->db->query("SELECT JAWAB_1, COUNT(JAWAB_1) AS 'JUMLAH' FROM kuesioner WHERE ID_EVENT = '$param' GROUP BY JAWAB_1 ORDER BY JAWAB_1 DESC")->result();
    }

    public function getPemateri($param)
    {
        return $this->db->query("SELECT JAWAB_2, COUNT(JAWAB_2) AS 'JUMLAH' FROM kuesioner WHERE ID_EVENT = '$param' GROUP BY JAWAB_2 ORDER BY JAWAB_2 DESC")->result();
    }

    public function getBermanfaat($param)
    {
        return $this->db->query("SELECT JAWAB_3, COUNT(JAWAB_3) AS 'JUMLAH' FROM kuesioner WHERE ID_EVENT = '$param' GROUP BY JAWAB_3 ORDER BY JAWAB_3 DESC")->result();
    }

    public function getMenambahWawsan($param)
    {
        return $this->db->query("SELECT JAWAB_4, COUNT(JAWAB_4) AS 'JUMLAH' FROM kuesioner WHERE ID_EVENT = '$param' GROUP BY JAWAB_4 ORDER BY JAWAB_4 DESC")->result();
    }

    public function getPelaksanaan($param)
    {
        return $this->db->query("SELECT JAWAB_5, COUNT(JAWAB_5) AS 'JUMLAH' FROM kuesioner WHERE ID_EVENT = '$param' GROUP BY JAWAB_5 ORDER BY JAWAB_5 DESC")->result();
    }

    // public function delete($param)
    // {
    //     return $this->db->where($param)->delete('presensi');
    // }
    
    // public function getPresensi($param)
    // {
    //     return $this->db->where($param)->get('presensi')->row_array();
    // }

    // public function get($param)
    // {
    //     $this->db->from('kuesioner');
    //     $this->db->where('ID_EVENT', $param);
    //     return $this->db->get()->result();
    // }

    // public function update($where, $param)
    // {
    //     $this->db->where($where)->update('presensi', $param);
    //     return ($this->db->affected_rows() > 0);
    // }

    // public function updateIsSeen()
    // {
    //     return $this->db->set('IS_SEEN', '1')->update('presensi');
    // }

    // public function getTotalHadir($param)
    // {
    //     $this->db->select('*');
    //     $this->db->from('event');
    //     $this->db->join('presensi', 'event.ID_EVENT = presensi.ID_EVENT');
    //     $this->db->where('event.EMAIL', $param);
    //     $this->db->where('presensi.STATUS', '1');
    //     return $this->db->count_all_results();
    // }
    

    // public function getTotalTidakHadir($param)
    // {
    //     $this->db->select('*');
    //     $this->db->from('event');
    //     $this->db->join('presensi', 'event.ID_EVENT = presensi.ID_EVENT');
    //     $this->db->where('event.EMAIL', $param);
    //     $this->db->where('presensi.STATUS', '0');
    //     return $this->db->count_all_results();
    // }
}

/* End of file PresensiModel.php */

?>