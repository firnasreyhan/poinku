<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LingkupKegiatanModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->where('ID_LINGKUP !=', '1')->get('lingkup')->result();
    }

    public function get()
    {
        return $this->db->get('lingkup')->result();
    }

    public function getNew($idAturan, $idJenis)
    {
        return $this->db->query("SELECT lingkup.ID_LINGKUP, lingkup.LINGKUP FROM lingkup INNER JOIN poin ON lingkup.ID_LINGKUP = poin.ID_LINGKUP AND poin.ID_ATURAN = '$idAturan' AND poin.ID_JENIS = '$idJenis' GROUP BY lingkup.ID_LINGKUP ORDER BY lingkup.LINGKUP ASC")->result();
    }

    public function insert($param)
    {
        return $this->db->insert('lingkup', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_LINGKUP', $param['ID_LINGKUP'])->delete('lingkup');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_LINGKUP', $param['ID_LINGKUP'])->get('lingkup')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_LINGKUP', $param['ID_LINGKUP'])->update('lingkup', $param);
    }
}
