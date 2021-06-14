<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DaftarEventModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($param)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('event.EMAIL', $param);
        $this->db->join('lingkup', 'event.ID_LINGKUP = lingkup.ID_LINGKUP');
        $this->db->join('jenis', 'event.ID_JENIS = jenis.ID_JENIS');
        $this->db->order_by("ID_EVENT", "DESC");
        return $this->db->get()->result();
    }

    public function getActiveEvent()
    {
        return $this->db->get('view_event')->result();
    }

    public function insert($param)
    {
        $this->db->insert('event', $param);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function delete($param)
    {
        return $this->db->where('ID_EVENT', $param)->delete('event');
    }

    public function getDetail($param)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('lingkup', 'event.ID_LINGKUP = lingkup.ID_LINGKUP');
        $this->db->join('jenis', 'event.ID_JENIS = jenis.ID_JENIS');
        $this->db->where('ID_EVENT', $param);
        return $this->db->get()->result();
    }

    public function getEventUser($param)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('lingkup', 'event.ID_LINGKUP = lingkup.ID_LINGKUP');
        $this->db->join('jenis', 'event.ID_JENIS = jenis.ID_JENIS');
        $this->db->join('presensi', 'event.ID_EVENT = presensi.ID_EVENT');
        $this->db->where('presensi.EMAIL', $param);
        return $this->db->get()->result();
    }

    public function update($param, $idEvent)
    {
        return $this->db->where('ID_EVENT', $idEvent)->update('event', $param);
    }

    public function getTotal($param)
    {
        $this->db->where('EMAIL', $param);
        return $this->db->count_all_results('event');
    }

    public function getTotalByEvent($param)
    {
        return $this->db->query("SELECT event.JUDUL, COUNT(event.ID_EVENT) AS 'JUMLAH' FROM event INNER JOIN presensi ON event.ID_EVENT = presensi.ID_EVENT AND event.EMAIL = '$param' AND presensi.STATUS = 1 GROUP BY event.ID_EVENT")->result();
    }

    public function getDetailTotalKehadiran($param)
    {
        return $this->db->query("SELECT STATUS, COUNT(STATUS) AS 'JUMLAH' FROM presensi WHERE ID_EVENT = '$param' GROUP BY STATUS ORDER BY STATUS DESC")->result();
    }

    public function getDetailTotalPeserta($param)
    {
        return $this->db->query("SELECT IS_EKSTERNAL, COUNT(IS_EKSTERNAL) AS 'JUMLAH' FROM presensi WHERE ID_EVENT = '$param' GROUP BY IS_EKSTERNAL ORDER BY IS_EKSTERNAL DESC")->result();
    }

    public function getDetailTotalProdi($param)
    {
        return $this->db->query("SELECT mahasiswa.PRODI, COUNT(mahasiswa.PRODI) AS 'JUMLAH' FROM presensi INNER JOIN mahasiswa ON presensi.EMAIL = mahasiswa.EMAIL WHERE ID_EVENT = '$param' GROUP BY mahasiswa.PRODI ORDER BY mahasiswa.PRODI ASC")->result();
    }

    public function getDetailTotalAngkatan($param)
    {
        return $this->db->query("SELECT mahasiswa.ANGKATAN, COUNT(mahasiswa.ANGKATAN) AS 'JUMLAH' FROM presensi INNER JOIN mahasiswa ON presensi.EMAIL = mahasiswa.EMAIL WHERE ID_EVENT = '$param' GROUP BY mahasiswa.ANGKATAN ORDER BY mahasiswa.ANGKATAN ASC")->result();
    }

    public function updateTemplateSertifikat($value, $where)
    {
        $this->db->set('TEMPLATE_SERTIFIKAT', $value);
        $this->db->where('ID_EVENT', $where);
        $this->db->update('event');
        return ($this->db->affected_rows() > 0);
    }
}

/* End of file AturanModel.php */
