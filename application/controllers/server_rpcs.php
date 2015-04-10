<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of server_rpcs
 * Untuk domain anak
 * @author sahid
 */
class server_rpcs extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->classUrl = get_class($this);        
        $this->load->model('mailistbank_model', 'mailistbank');
        $this->load->model('mailist_model', 'mailist');
        $this->load->model('landing_model', 'landing');
        $this->load->model('ftp_model', 'ftp');
    }

    public function index() {
        $config = array();
        $config['functions']['sync_landing'] = array('function' => 'server_rpcs.mysync');
        $config['object'] = $this;

        $this->xmlrpcs->initialize($config);
        $this->xmlrpcs->serve();
    }

    public function mysync($request) {
        $parameters = $request->output_parameters();
        $data = array();

        foreach ($parameters as $row):
            $data[] = array(
                'id' => $row['id'],
                'ld_title' => $row['ld_title'],
                'ld_content' => $row['ld_content'],
                'ld_type' => $row['ld_type'],
                'ld_image' => $row['ld_image'],
                'ld_theme' => $row['ld_theme'],
                'ip_address' => $row['ip_address'],
                'createdt' => $row['createdt'],
                'updatedt' => $row['updatedt'],
            );
        endforeach;


        if (count($data) > 0):
            $this->landing->insertBatch($data);
            $this->ftp->updateSync();
            $respondcode = "1110";
            $response = array(array('respond' => $respondcode),
                'struct');
        else:
            $respondcode = "1120";
            $response = array(array('respond' => $respondcode),
                'struct');
        endif;

        return $this->xmlrpc->send_response($response);
    }
    
}
