<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarEventModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('event');
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

}

/* End of file AturanModel.php */

?>