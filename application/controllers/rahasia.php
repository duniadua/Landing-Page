<?php

/**
 * Description of rahasia
 * Untuk di distribusikan ke domain2 anak
 * @author sahid
 */
class rahasia extends CI_Controller {

    private $urlReturn = "";
    private $urlReplika = "home_replika";
    private $urlAktifasi = "aktifasi";
    private $urlConfig = "html_config_async";
    private $urlRpcs = 'http://www.k-link.co.id/index.php/remote_rpcs';
//    private $urlRpcs = 'http://localhost/newklink/index.php/remote_rpcs';

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->library('email');
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
        $this->load->model('landing_model', 'landing');
        $this->load->model('param_model', 'param');
        $this->load->model('mailist_model', 'mail');
        $this->load->model('affiliate_model', 'affiliate');
    }

    public function index() {
        $paramD = array(
            'limit' => 1
        );

        $data['domainparam'] = $this->param->get($paramD);

        $landing = array(
            'where' => 'ld_act = 1',
            'order' => 'id DESC',
            'limit' => 1,
        );

        $data['landing'] = $this->landing->get($landing);

        $param = $this->param->get($paramD);
        $row = $param;

        $to = $this->input->post('email');
        $uid = $this->input->post('uid');

//        Content email untuk dirubah ada disini
//        TODO jika id di set maka row owner akan menjadi value dan default value 
//        akan hilang

        $subject = "Confirm Mailist Registration";
        $content = "Hallo perkenalkan saya " . $row->owner . "\n";
        $content .= "\n";
        $content .= $row->greet . "\n";
        $content .= "Copy Paste link url ini untuk aktifasi " . site_url() . "rahasia/aktifasi/" . $uid . "\n";

        $paramConfig = array(
            'to' => $to,
            'subject' => $subject,
            'content' => $content,
            'mailist_email' => $row->mailist_email,
            'from' => $row->mailist_email,
            'name' => $row->name,
            'smtp_host' => $row->smtp_host,
            'smtp_pwd' => $row->smtp_pwd,
            'smtp_port' => $row->smtp_port,
        );
//      Menghitung jumlah view
        $this->countLanding();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');

        if ($this->input->post('submit')):
            if ($this->form_validation->run()):
                $this->sendMailConfig($paramConfig);
                $this->mail->insert();
                $this->insertMailist();
                redirect('rahasia/thank_you');
            endif;
        endif;

        $this->load->view($this->urlReturn, $data);
    }

    final private function countLanding() {
        $landing = array(
            'where' => 'ld_act = 1',
            'order' => 'id DESC',
            'limit' => 1,
        );

        $landingCount = $this->landing->get($landing);
        $viewed = $landingCount->id;

        if ($viewed > 0):
            $this->landing->count('id', $viewed);
        endif;
    }

    public function affiliasi($id = null) {
        if (!empty($id)):
            $para = array(
                'where' => "short_url= '$id'"
            );

            $fetchSession = $this->affiliate->get($para);
            $rows = $fetchSession;

            $dataSession = array(
                'dfno' => $rows->dfno,
                'nama' => $rows->nama,
                'email' => $rows->email,
                'pinbb' => $rows->pinbb,
                'phone' => $rows->phone,
                'fb' => $rows->fb,
                'twitter' => $rows->twitter,
            );

            $this->session->set_userdata($dataSession);
        endif;

        redirect('rahasia');
    }

    public function thank_you() {
        $paramD = array(
            'limit' => 1
        );

        $data['domainparam'] = $this->param->get($paramD);

        $this->load->view(__FUNCTION__, $data);
    }

    public function about_us() {

        $sessionNama = $this->session->userdata('nama');

        if (empty($sessionNama)):
            $paramD = array(
                'limit' => 1
            );

            $data['domainparam'] = $this->param->get($paramD);

        else:
            $dataSes = (object) array(
                        'dfno' => $this->session->userdata('dfno'),
                        'nama' => $this->session->userdata('nama'),
                        'pinbb' => $this->session->userdata('pinbb'),
                        'fb' => $this->session->userdata('fb'),
                        'twitter' => $this->session->userdata('twitter'),
                        'email' => $this->session->userdata('email'),
                        'phone' => $this->session->userdata('phone'),
            );

            $data['domainparam'] = $dataSes;
        endif;

        $this->load->view(__FUNCTION__, $data);
    }

    private function sendMailConfig($param = array()) {

        if (isset($param['to'])):
            $to = $param['to'];
        endif;

        if (isset($param['subject'])):
            $subject = $param['subject'];
        endif;

        if (isset($param['content'])):
            $content = $param['content'];
        endif;

        if (isset($param['from'])):
            $from = $param['from'];
        endif;

        if (isset($param['name'])):
            $name = $param['name'];
        endif;

        if (isset($param['smtp_host'])):
            $smtp_host = $param['smtp_host'];
        endif;

        if (isset($param['mailist_email'])):
            $mailist_email = $param['mailist_email'];
        endif;

        if (isset($param['smtp_pwd'])):
            $smtp_pwd = $param['smtp_pwd'];
        endif;

        if (isset($param['smtp_port'])):
            $smtp_port = $param['smtp_port'];
        endif;

        $config = array(
            'protocol' => 'smtp',            
            'charset' => 'utf-8',
            'priority' => 3,
            'smtp_host' => $smtp_host,
            'smtp_user' => $mailist_email,
            'smtp_pass' => $smtp_pwd,
            'smtp_port' => $smtp_port,
            'mailtype' => 'html',
            'newline' => '\n',
        );

        $this->email->initialize($config);

        $this->email->from($from, $name);
        $this->email->reply_to($from, $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($content);
        $this->email->send();

//        echo $this->email->print_debugger();
    }

    public function aktifasi($uid) {
        $param = array(
            'limit' => 1
        );

        $memberparam = array(
            'where' => "uid = '" . $uid . "'",
        );

        $data['domainparam'] = $this->param->get($param);
        $data['pesan'] = "Anda Telah Terdaftar Di mailist Kami";

        $member = $this->mail->get($memberparam);

        if (count($data['domainparam']) > 0):
            $rowParam = $data['domainparam'];
        endif;

        if (count($member) > 0):
            $row = $member;
        else:
            redirect($this->urlReturn);
        endif;

        $to = $row->email;
        $subject = "Mailist Registration Success";
        $content = "Hallo," . $row->name . "\n";
        $content .= "\n";
        $content .= "Selamat Anda Telah Terdaftar di mailist kami" . "\n";

        $paramConfig = array(
            'to' => $to,
            'subject' => $subject,
            'content' => $content,
            'mailist_email' => $rowParam->mailist_email,
            'from' => $rowParam->mailist_email,
            'name' => $rowParam->name,
            'smtp_host' => $rowParam->smtp_host,
            'smtp_pwd' => $rowParam->smtp_pwd,
            'smtp_port' => $rowParam->smtp_port,
        );

        $this->sendMailConfig($paramConfig);
        $this->mail->activate($uid);
        $this->setActive($uid);
        $this->load->view($this->urlAktifasi, $data);
//        echo $this->email->print_debugger();
    }

    public function nonaktif($uid) {
        $param = array(
            'limit' => 1
        );

        $data['domainparam'] = $this->param->get($param);
        $data['pesan'] = "Anda Telah Berhenti Berlangganan dari Mailist Kami";

        $this->mail->deactivate($uid);
        $this->load->view($this->urlAktifasi, $data);
    }

    private function insertMailist() {
        $this->xmlrpc->set_debug(FALSE);
        $this->xmlrpc->server($this->urlRpcs, 80);
        $this->xmlrpc->method('insert_mailist');

        $request = array(array(array(
                    'uid' => array($this->input->post('uid'), 'string'),
                    'name' => array($this->input->post('nama'), 'string'),
                    'email' => array($this->input->post('email'), 'string'),
                    'replyto' => array($this->input->post('replyto'), 'string'),
                    'ld_type' => array($this->input->post('ld_type'), 'int'),
                    'ip_address' => array($this->input->ip_address(), 'string')),
                'struct'));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        }
    }

    private function setActive($uid) {
        $this->xmlrpc->set_debug(FALSE);
        $this->xmlrpc->server($this->urlRpcs, 80);
        $this->xmlrpc->method('activate_mailist');

        $request = array(array(array(
                    'uid' => array($uid, 'string')),
                'struct'));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        }
    }

}
