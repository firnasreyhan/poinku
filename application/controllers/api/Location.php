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
        // print_r($param);

        $index = 1;
        foreach($param as $value){
            $dataStore = array(
                'latitude'   => $value['latitude'],
                'longitude'  => $value['longitude']
            );

            $this->LocationModel->insert($dataStore);
            if ($index == count($param)) {
                $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
            }
            $index++;
        }

        // $dataStore = array(
        //     'latitude'   => $param['latitude'],
        //     'longitude'  => $param['longitude']
        // );

        // $this->LocationModel->insert($dataStore);
        // $this->response(['status' => true, 'message' => 'Data berhasil ditambahkan'], 200);
    }
}

/* End of file Controllername.php */

?>