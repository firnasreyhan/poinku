<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class LocationModel extends CI_Model {
    
        public function insert($param) {
            return $this->db->insert('dummy_location', $param);
        }
    
    }
    
    /* End of file LocationModel.php */
    
?>