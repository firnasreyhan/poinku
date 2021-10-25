<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends RestController {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LocationModel');
        
    }
    
    public function location_post()
    {
        $param = $this->post();

        $dataStore = array(
            'latitude'   => $param['latitude'],
            'longitude'  => $param['longitude']
        );

        $this->LocationModel->insert($dataStore);
        $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }
}

/* End of file Controllername.php */

?>