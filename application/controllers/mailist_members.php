<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mailist_members
 *
 * @author sahid
 */
class mailist_members extends CI_Controller {

    private $urlReturn = "";
    private $urlList = "landing_list";
    private $urlSetup = "setup";
    private $urlConfig = "html_config_landing";
    private $urlFooter = "footer";
    private $urlRpcs = 'http://www.k-link.co.id/index.php/remote_rpcs/';


    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('mailist_model', 'mailist');
        $this->load->model('param_model', 'param');
        $this->load->model('landing_model', 'landing');
        $this->load->model('ftp_model', 'ftp_m');
        $this->load->model('type_model', 'type');
        $this->load->model('menus_model', 'menu');
    }

    public function index() {
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $mailist = array(
                'where' => 'act = 1',
                'and' => 'registered = 0',
                'order' => 'id DESC',
            );

            $data['addressbook'] = $this->mailist->gets($mailist);
            $data['menus'] = $this->menu->gets();

            $this->load->view($this->urlConfig);
            $this->load->view($this->urlReturn, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect('access/login');
        endif;
    }

    /**
     * Fungsi untuk melakukan aktifasi jika mailist telah menjadi member
     * return string
     * * */
    public function approve($uid) {
        $this->xmlrpc->set_debug(false);
        $this->xmlrpc->server($this->urlRpcs, 80);
        $this->xmlrpc->method('activateRegMailist');

        $request = array(array(array(
                    'uid' => array($uid, 'string')),
                'struct'));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
            $response = $this->xmlrpc->display_response();
            if ($response['respond'] == "1110"):
                $this->mailist->updateFlagRegisteredMember($uid);
                echo $response['message'];
            endif;
        }
    }

}
