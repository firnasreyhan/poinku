<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JenisKegiatanModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->where('ID_JENIS !=', '1')->get('jenis')->result();
    }

    public function get()
    {
        return $this->db->get('jenis')->result();
    }

    public function getNew($idAturan)
    {
        return $this->db->query("SELECT jenis.ID_JENIS, jenis.JENIS FROM jenis INNER JOIN poin ON jenis.ID_JENIS = poin.ID_JENIS AND poin.ID_ATURAN = '$idAturan' GROUP BY jenis.ID_JENIS ORDER BY jenis.JENIS ASC")->result();
    }

    public function getEventManager()
    {
        return $this->db->query("SELECT jenis.ID_JENIS, jenis.JENIS FROM poin INNER JOIN jenis on poin.ID_JENIS = jenis.ID_JENIS WHERE poin.ID_PERAN = '2' GROUP BY jenis.ID_JENIS ORDER BY jenis.JENIS ASC")->result();
    }

    public function insert($param)
    {
        return $this->db->insert('jenis', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_JENIS', $param['ID_JENIS'])->delete('jenis');
    }

    public function getDetail($param)
    {
        return $this->db->where('ID_JENIS', $param['ID_JENIS'])->get('jenis')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_JENIS', $param['ID_JENIS'])->update('jenis', $param);
    }
}

/* End of file JenisKegiatanModel.php */
