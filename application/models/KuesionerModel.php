<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KuesionerModel extends CI_Model
{

    public function insert($param)
    {
        $this->db->insert('kuesioner', $param);
        return $this->db->affected_rows() > 0;
    }

    public function getDetail($param)
    {
        return $this->db->where($param)->get('kuesioner')->result();
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
}
