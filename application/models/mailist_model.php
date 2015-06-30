<?php

/**
 * Description of landing_model
 * Untuk di domain anak
 * @author sahid
 */
class mailist_model extends CI_Model {

    //put your code here
    protected static $table = "mailist";

    public function gets($param = array()) {
        $sql = "SELECT * FROM " . self::$table;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];

        return $this->db->query($sql)->result();
    }

    public function get($param = array()) {
        $sql = "SELECT * FROM " . self::$table;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];

        return $this->db->query($sql)->row();
    }
    
    // Untuk menghitung total record, digunakan untuk analisis data
    
    public function countRows($param = array()){
        $sql = "COUNT(id) as total FROM " . self::$table;
        
        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];

        return $this->db->query($sql)->row();
    }

    public function insert() {
        $data = array(
            'uid' => $this->input->post('uid'),
            'dfno' => $this->input->post('dfno'),
            'name' => $this->input->post('nama'),            
            'email' => $this->input->post('email'),
            'replyto' => $this->input->post('replyto'),
            'ld_type' => $this->input->post('ld_type'),
            'ip_address' => $this->input->ip_address(),
            'subscribedt' => date('Y-m-d H:i:s'),
            'createdt' => date('Y-m-d H:i:s'),
        );

        $this->db->insert(self::$table, $data);
    }
    
    public function activate($uid) {
//        Var act bertipe int di set 1 untuk aktifasi, angka 0 untuk reg baru
//        angka 3 untuk unsubsribe   angka 4 untuk send failures     

        $data = array(
            'act' => 1,
        );

        $this->db->where('uid', $uid);
        $this->db->update(self::$table, $data);
    }

    public function deactivate($uid) {
//        Var act bertipe int di set 1 untuk aktifasi, angka 0 untuk reg baru
//        angka 3 untuk unsubsribe angka 4 untuk send failures       

        $data = array(
            'act' => 3,
            'unsubscribedt' => date('Y-m-d H:i:s'),
        );

        $this->db->where('uid', $uid);
        $this->db->update(self::$table, $data);
    }

    public function updateFailures($uid) {
//        Var act bertipe int di set 1 untuk aktifasi, angka 0 untuk reg baru
//        angka 3 untuk unsubsribe angka 4 untuk send failures

        $data = array(
            'act' => 4,
            'failuresdt' => date('Y-m-d H:i:s'),
        );

        $this->db->where('email', $uid);
        $this->db->update(self::$table, $data);
    }

    private function getLastRunNo() {
        $sql = "SELECT runno FROM " . self::$table;
        return $this->db->query($sql)->row();
    }

    private function getSelLastRunNo($id) {
        $sql = "SELECT runno FROM " . self::$table . " WHERE id=" . $id;
        return $this->db->query($sql)->row();
    }

    public function insRunNo($id) {
        $lastNo = $this->getLastRunNo();
        $rows = $lastNo;

        if (count($rows) > 0):
            $row = $rows->runno;
        endif;

        $data = array(
            'runno' => $row + 1,
        );

        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);
    }

    public function insSelRunNo($id) {
        $lastNo = $this->getSelLastRunNo($id);
        $rows = $lastNo;

        if (count($rows) > 0):
            $row = $rows->runno;
        endif;

        $data = array(
            'runno' => $row + 1,
        );

        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);
    }
    
    /**
     * Untuk merubah flag member yg telah memiliki id k-link
     * Khusus Client Side
     * 
     * **/
    public function updateFlagRegisteredMember($uid) {
        $data = array(
            'registered' => 1,
        );

        $this->db->where('uid', $uid);
        $this->db->update(self::$table, $data);
    }

}
