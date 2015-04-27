<?php

/**
 * Description of bod
 *
 * @author sahid
 */
class landing extends CI_Controller {

    private $urlReturn = "";
    private $urlList = "landing_list";
    private $urlSetup = "setup";
    private $urlConfig = "html_config_landing";
    private $urlFooter = "footer";
    private $logout = 'contributor/login';

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('mailist_model', 'mailist');
        $this->load->model('param_model', 'param');
        $this->load->model('landing_model', 'landing');
        $this->load->model('ftp_model', 'ftp_m');
        $this->load->model('type_model', 'type');
        $this->load->model('menus_model', 'menu');
        $this->load->model('summary_model', 'summary');
    }

    //put your code here
    public function index() {
        try {
            $valid = $this->session->userdata('login');
            if ($valid == TRUE):
                $mailist = array(
                    'order' => 'id DESC',
                );

                $data['addressbook'] = $this->mailist->gets($mailist);
                $data['menus'] = $this->menu->gets();
                $data['sumAll'] = $this->resultAll();
                $data['sumActive'] = $this->resultActivated();
                $data['sumInActive'] = $this->resultUnsubcribe();
                $data['sumMember'] = $this->resultMemberKlink();
                $data['sumViewed'] = $this->resultViewed();
                $data['sumkonversi'] = $this->resultKonversiRate();

                $this->load->view($this->urlConfig);
                $this->load->view($this->urlReturn, $data);
                $this->load->view($this->urlFooter);
            else:
                redirect($this->logout);
            endif;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function set_default() {
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $param = array(
                'where' => 'ld_act = 1'
            );

            $data['page_title'] = 'Setup Halaman Depan';
            $data['list_landing'] = $this->landing->gets();
            $data['defVal'] = $this->landing->get($param);
            $data['menus'] = $this->menu->gets();
            $valID = $this->input->post('id');

            if ($this->input->post('submit')):
                $this->landing->unUpdate();
                $this->landing->update('id', $valID);
                redirect('/landing/set_default/', 'refresh');
            endif;

            $this->load->view($this->urlConfig);
            $this->load->view(__FUNCTION__, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect($this->logout);
        endif;
    }

    public function list_art() {
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $param = array(
                'order' => 'id DESC',
            );

            $data['landinglist'] = $this->landing->gets($param);
            $data['menus'] = $this->menu->gets();

            $this->load->view($this->urlConfig);
            $this->load->view($this->urlList, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect($this->logout);
        endif;
    }

    public function setup() {
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $param = array(
            );

            $data['param'] = $this->param->get($param);
            $data['menus'] = $this->menu->gets();

            if ($this->input->post('submit')):
                $this->param->update('id', 1);
                redirect('/landing/setup/', 'refresh');
            endif;

            $this->load->view($this->urlConfig);
            $this->load->view($this->urlSetup, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect($this->logout);
        endif;
    }

    public function ftp_setup() {
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $data['param'] = $this->ftp_m->get();
            $data['page_title'] = 'Setup FTP Account';
            $data['menus'] = $this->menu->gets();

            if ($this->input->post('submit')):
                $this->ftp_m->update('id', 1);
                redirect('/landing/ftp_setup/', 'refresh');
            endif;

            $this->load->view($this->urlConfig);
            $this->load->view(__FUNCTION__, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect($this->logout);
        endif;
    }

    public function type($id = NULL) {
        $valid = $this->session->userdata('login');
        if ($valid == TRUE):
            $param = array(
                'where' => 'ld_act = 0'
            ); //menampilkan tipe artikel yang aktif

            if ($id != NULL):
                $arrDet = array(
                    'where' => 'id =' . $id
                );
                $data['detail'] = $this->type->get($arrDet);
            else:
                $data['detail'] = null;
            endif;

            $data['param'] = $this->type->gets($param); //getting all record
            $data['menus'] = $this->menu->gets();
            $data['page_title'] = 'Tambah Landing Type';

            if ($this->input->post('submit')):
                $id = $this->input->post('id');

                if ($id != NULL):
                    $this->type->update('id', $id);
                else:
                    $this->type->insert();
                endif;
                redirect('/landing/type/', 'refresh');
            endif;

            $this->load->view($this->urlConfig);
            $this->load->view(__FUNCTION__, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect($this->logout);
        endif;
    }

    public function testMandra() {
        try {
            $mandrill = new Mandrill('5DUMdRwylH3ZXoahq67Ubg');
            $result = $mandrill->users->info();

            var_dump($result);
//            echo $result['username'];
        } catch (Mandrill_Error $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Menghitung Semua yang telah terdaftar termasuk yang belum aktifasi
     * * */
    private function resultAll() {
        $result = $this->summary->countRows();

        return $result;
    }

    /**
     * Menghitung hanya yang aktif yang telah aktifasi
     * * */
    private function resultActivated() {
        $para = array(
            'where' => 'act = 1'
        );

        $result = $this->summary->countRows($para);

        return $result;
    }

    /**
     * Menghitung hanya member mailist yg telah menjadi member K-Link 
     * * */
    private function resultMemberKlink() {
        $para = array(
            'where' => 'registered = 1'
        );

        $result = $this->summary->countRows($para);

        return $result;
    }

    /**
     * Menghitung hanya yang berhenti berlangganan
     * * */
    private function resultUnsubcribe() {
        $para = array(
            'where' => 'act = 3'
        );

        $result = $this->summary->countRows($para);

        return $result;
    }

    /**
     * Menghitung total viewed untuk konversi
     * * */
    private function resultViewed() {
        $result = $this->summary->countViews();

        return $result;
    }

    /**
     * Menghitung konversi
     * * */
    private function resultKonversiRate() {
        $aktifasi = $this->resultActivated();
        $viewed = $this->resultViewed();
        $result = round($this->calculatePercentage($aktifasi->total, $viewed->total), 2);
        
        return $result;
    }
    
    /**
     * Rumus menghitung Persentasi
     * * */
    private function calculatePercentage($aktifasi, $viewed) {
        $resAktivasi = $aktifasi * 100;
        $result = $resAktivasi / $viewed;
        
        return $result;
    }

}
