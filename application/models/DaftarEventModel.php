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
        return $this->db->get()->result();
    }

    public function insert($param)
    {
        return $this->db->insert('event', $param);
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

    public function update($param)
    {
        return $this->db->where('ID_ATURAN', $param['ID_ATURAN'])->update('aturan', $param);
    }

}

/* End of file AturanModel.php */

?>