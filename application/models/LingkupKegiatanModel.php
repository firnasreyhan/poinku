<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LingkupKegiatanModel extends CI_Model {

    public function getAll()
    {
        return $this->db->where('ID_LINGKUP !=', '1')->get('lingkup')->result();
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

/* End of file LingkupKegiatanModel.php */

?>