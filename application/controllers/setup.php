<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setup
 *
 * @author sahid
 */
class setup extends CI_Controller {

    private $urlReturn = "";
    private $urlConfig = "html_config_landing";
    private $urlFooter = "footer";
    private $tbl_admin = 'admins';
    private $tbl_affiliate = 'affiliate_members';
    private $tbl_ftp = 'ftp_params';
    private $tbl_landing = 'landings';
    private $tbl_landingType = 'landing_types';
    private $tbl_mailist = 'mailists';
    private $tbl_menu = 'menus';
    private $tbl_param = 'params';
    private $dbName = 'dblandong';

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $this->urlReturn = get_class($this);
    }

    public function index() {
        $logger = '';

        if ($this->input->post('submit')):
//            if ($this->dbforge->create_database($this->dbName)) {
//                $logger .= 'Database created!';
//            }

            if (!$this->db->table_exists($this->tbl_admin)):
                if ($this->createTableAdmin()) {
                    $logger .= 'Table Admin created!';
                }
            endif;

            if (!$this->db->table_exists($this->tbl_affiliate)):
                if ($this->createAffiliate()) {
                    $logger .= 'Table ' . $this->tbl_affiliate . ' created!' . "\n";
                }
            endif;

            if (!$this->db->table_exists($this->tbl_ftp)):
                if ($this->createFtp()) {
                    $logger .= 'Table ' . $this->tbl_ftp . ' created!' . "\n";
                }
            endif;

            if (!$this->db->table_exists($this->tbl_landing)):
                if ($this->createLanding()) {
                    $logger .= 'Table ' . $this->tbl_landing . ' created!' . "\n";
                }
            endif;

            if (!$this->db->table_exists($this->tbl_landingType)):
                if ($this->createLandingType()) {
                    $logger .= 'Table ' . $this->tbl_landingType . ' created!' . "\n";
                }
            endif;

            if (!$this->db->table_exists($this->tbl_mailist)):
                if ($this->createMailist()) {
                    $logger .= 'Table ' . $this->tbl_mailist . ' created!' . "\n";
                }
            endif;


            if (!$this->db->table_exists($this->tbl_menu)):
                if ($this->createMenu()) {
                    $logger .= 'Table ' . $this->tbl_menu . ' created!' . "\n";
                }
            endif;

            if (!$this->db->table_exists($this->tbl_param)):
                if ($this->createParam()) {
                    $logger .= 'Table ' . $this->tbl_param . ' created!' . "\n";
                }
            endif;

        endif;

        $data['log'] = $logger;

        $this->load->view('wizzard', $data);
    }

    private function createTableAdmin() {
        $return = TRUE;

        $fields = array(
            'uid' => array(
                'type' => 'INT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'last_login' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'last_ip' => array(
                'type' => 'VARCHAR',
                'constraint' => '18',
                'null' => TRUE,
            ),
            'usertype' => array(
                'type' => 'int',
                'null' => FALSE,
            ),
        );

        $this->dbforge->add_key('uid', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_admin);

        return $return;
    }

    private function createAffiliate() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'dfno' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => TRUE,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => TRUE,
            ),
            'pinbb' => array(
                'type' => 'CHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'email' => array(
                'type' => 'CHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'short_url' => array(
                'type' => 'CHAR',
                'constraint' => '10',
                'null' => TRUE,
            ),
            'fb' => array(
                'type' => 'CHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'twitter' => array(
                'type' => 'CHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'phone' => array(
                'type' => 'CHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'act' => array(
                'type' => 'int',
                'null' => FALSE,
                'default' => 1,
            ),
            'createnm' => array(
                'type' => 'CHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'updatenm' => array(
                'type' => 'CHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'createdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_affiliate);

        return $return;
    }

    private function createFtp() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'INT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '220',
                'null' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'host' => array(
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'port' => array(
                'type' => 'int',
                'null' => FALSE,
            ),
            'createdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'lastsync' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_ftp);

        return $return;
    }

    private function createLanding() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'ld_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '220',
                'null' => TRUE,
            ),
            'ld_image' => array(
                'type' => 'CHAR',
                'constraint' => '40',
                'null' => TRUE,
            ),
            'ld_theme' => array(
                'type' => 'CHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'ld_content' => array(
                'type' => 'LONGTEXT',
                'null' => TRUE,
            ),
            'ld_type' => array(
                'type' => 'int',
                'null' => TRUE,
            ),
            'ld_act' => array(
                'type' => 'int',
                'null' => TRUE,
                'default' => 0,
            ),
            'ld_fb' => array(
                'type' => 'varchar',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'ld_twitter' => array(
                'type' => 'varchar',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'shorturl' => array(
                'type' => 'CHAR',
                'constraint' => '25',
                'null' => TRUE,
            ),
            'ip_address' => array(
                'type' => 'varchar',
                'constraint' => '20',
                'null' => FALSE,
            ),
            'createdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'updatedt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'viewed' => array(
                'type' => 'int',
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_landing);

        return $return;
    }

    private function createLandingType() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'INT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'ld_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '220',
                'null' => TRUE,
            ),
            'ld_type' => array(
                'type' => 'int',
                'null' => TRUE,
            ),
            'ld_act' => array(
                'type' => 'int',
                'null' => TRUE,
            ),
            'createdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'updatedt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'createnm' => array(
                'type' => 'CHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'updatenm' => array(
                'type' => 'CHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_landingType);

        return $return;
    }

    private function createMailist() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'uid' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE,
            ),
            'name' => array(
                'type' => 'CHAR',
                'constraint' => '40',
                'null' => TRUE,
            ),
            'email' => array(
                'type' => 'CHAR',
                'constraint' => '80',
                'null' => TRUE,
            ),
            'ld_type' => array(
                'type' => 'int',
                'null' => FALSE,
            ),
            'runno' => array(
                'type' => 'BIGINT',
                'null' => TRUE,
            ),
            'act' => array(
                'type' => 'int',
                'null' => FALSE,
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ),
            'subscribedt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'unsubscribedt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'failuresdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'createdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_mailist);

        return $return;
    }

    private function createMenu() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'INT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'CHAR',
                'constraint' => '50',
                'null' => FALSE,
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'category' => array(
                'type' => 'CHAR',
                'constraint' => '10',
                'null' => TRUE,
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_menu);

        return $return;
    }

    private function createParam() {
        $return = TRUE;

        $fields = array(
            'id' => array(
                'type' => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '220',
                'null' => TRUE,
            ),
            'email' => array(
                'type' => 'CHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'pinbb' => array(
                'type' => 'CHAR',
                'constraint' => '8',
                'null' => TRUE,
            ),
            'phone' => array(
                'type' => 'CHAR',
                'constraint' => '16',
                'null' => TRUE,
            ),
            'mailist_email' => array(
                'type' => 'CHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'smtp_host' => array(
                'type' => 'CHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'smtp_pwd' => array(
                'type' => 'CHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'smtp_port' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'fb' => array(
                'type' => 'CHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'twitter' => array(
                'type' => 'CHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'ip_address' => array(
                'type' => 'CHAR',
                'constraint' => '20',
                'null' => TRUE,
            ),
            'createdt' => array(
                'type' => 'timestamp',
                'null' => FALSE,
            ),
            'owner' => array(
                'type' => 'VARCHAR',
                'constraint' => '210',
                'null' => TRUE,
            ),
            'greet' => array(
                'type' => 'LONGTEXT',
                'null' => TRUE,
            ),
            'privatekey' => array(
                'type' => 'VARCHAR',
                'constraint' => '60',
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($this->tbl_param);

        return $return;
    }

}
