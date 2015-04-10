<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contributor
 *
 * @author sahid
 */
class access extends CI_Controller {

    private $urlReturn = "";
    private $urlConfig = "html_config_landing";
    private $urlFooter = "footer";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('param_model', 'param');
        $this->load->model('landingtype_model', 'landingtype');
        $this->load->model('bank_model', 'bank');
        $this->load->model('grp_bank_model', 'grpbank');
        $this->load->model('user_model', 'user');
        $this->load->model('menu_model', 'menu');
    }

    //put your code here
    public function index() {
//        $this->output->enable_profiler();
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $data['typeBank'] = $this->landingtype->gets();

            if ($this->input->post('submit')):
                $this->bank->insert();
            endif;

            $this->load->view($this->urlConfig);
            $this->load->view($this->urlReturn, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect('access/login');
        endif;
    }
   
    public function login() {
//        $this->output->enable_profiler();
        $data['mssg'] = $this->session->flashdata('mssg_fail');

        if ($this->input->post('submit')):

            $mssg = "<div class='alert alert-warning' role='alert'>Login Gagal,"
                    . " Periksa lagi Username dan Password, Besar kecil Berpengaruh"
                    . "</div>";

            $user = $this->input->post('username');
            $password = $this->input->post('password');

            $param = array(
                'where' => "username ='" . $user . "'",
                'and' => "password = '" . $password . "'",
            );

            $d = $this->user->get($param);

            if (count($d) > 0):
                $newdata = array('username' => $user,
                    'login' => TRUE,
                );

                $this->session->set_userdata($newdata);
                redirect('landing');
            else:
                $this->session->set_flashdata('mssg_fail', $mssg);
                redirect('access/login');
            endif;
        endif;

        $this->load->view($this->urlConfig);
        $this->load->view(__FUNCTION__, $data);
        $this->load->view($this->urlFooter);
    }

    public function bank_list($offset = NULL) {
        $valid = $this->session->userdata('login');

        if ($valid == true):
            $jml = $this->db->get('grp_article');
            //pengaturan pagination
            $config['base_url'] = site_url() . '/access/bank_list/';
            $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = '5';
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['next_page'] = '&laquo;';
            $config['prev_page'] = '&raquo;';
            $config['full_tag_open'] = '<li>';
            $config['full_tag_close'] = '</li>';
            $config['display_pages'] = TRUE;

            $this->pagination->initialize($config);

            $param = array(
                'limit' => $config['per_page'],
                'offset' => $offset,
            );

            $data['halaman'] = $this->pagination->create_links();
            $data['article'] = $this->grpbank->gets($param);
            $data['menus'] = $this->menu->gets();

            $this->load->view($this->urlConfig);
            $this->load->view(__FUNCTION__, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect('access/login');
        endif;
    }

    public function logout() {
        $valid = $this->session->userdata('login');

        if ($valid == true):
            $this->session->sess_destroy();
            redirect('access/login');
        else:
            redirect('access/login');
        endif;
    }

}
