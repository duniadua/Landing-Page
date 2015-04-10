<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test_email
 *
 * @author sahid
 */
class test_email extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('param_model', 'param');
    }

    public function index() {
        $paramD = array(
            'limit' => 1
        );
        $to = 'duniadua@gmail.com';
        $uid = '33';

        $param = $this->param->get($paramD);
        $row = $param;

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



        $this->sendMailConfig($paramConfig);

        $to = $this->input->post('email');
        $uid = $this->input->post('uid');

        echo $this->email->print_debugger();
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

}
