<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PeranKegiatanModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->where('ID_PERAN !=', '1')->get('peran')->result();
    }

    public function get()
    {
        return $this->db->get('peran')->result();
    }

    public function getNew($idAturan, $idJenis, $idLingkup)
    {
        return $this->db->query("SELECT peran.ID_PERAN, peran.PERAN FROM peran INNER JOIN poin ON peran.ID_PERAN = poin.ID_PERAN AND poin.ID_ATURAN = '$idAturan' AND poin.ID_JENIS = '$idJenis' AND poin.ID_LINGKUP = '$idLingkup' GROUP BY peran.ID_PERAN ORDER BY peran.PERAN ASC")->result();
    }

    public function insert($param)
    {
        return $this->db->insert('peran', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_PERAN', $param['ID_PERAN'])->delete('peran');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_PERAN', $param['ID_PERAN'])->get('peran')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_PERAN', $param['ID_PERAN'])->update('peran', $param);
    }
}
    
    /* End of file PeranKegiatanModel.php */
