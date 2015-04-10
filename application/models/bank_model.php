<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landing_model
 *
 * @author sahid
 */
class bank_model extends CI_Model {

    //put your code here
    protected static $table = "bank_article";

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

    public function insert() {
        $data = array();
        $post = $this->input->post();
        $fields = $this->db->list_fields(self::$table);
        $param = $this->input->post('ld_type');

        foreach ($fields as $myfield):
            if (isset($post[$myfield])):
                $data[$myfield] = $post[$myfield];
            endif;

            if ($myfield == 'ip_address'):
                $data[$myfield] = $this->input->ip_address();
            endif;

            if ($myfield == 'shorturl'):
                $data[$myfield] = random_string('alnum', 8);
            endif;

            if ($myfield == 'ld_artno'):
                $data[$myfield] = $this->getLastNo($param);
            endif;
            
            if ($myfield == 'createdt'):
                $data[$myfield] = date('Y-m-d H:i:s');
            endif;

            if ($myfield == 'updatedt'):
                $data[$myfield] = date('Y-m-d H:i:s');
            endif;

            if ($myfield == 'createnm'):
                $data[$myfield] = 'CREATOR';
            endif;
        endforeach;

        $this->db->insert(self::$table, $data);
    }

    public function update($field, $param) {
        $data = array();
        $post = $this->input->post();
        $fields = $this->db->list_fields(self::$table);

        foreach ($fields as $myfield):
            if (isset($post[$myfield])):
                $data[$myfield] = $post[$myfield];
            endif;

            if ($myfield == 'ip_address'):
                $data[$myfield] = $this->input->ip_address();
            endif;

            if ($myfield == 'createdt'):
                $data[$myfield] = date('Y-m-d H:i:s');
            endif;
        endforeach;

        $this->db->where($field, $param);
        $this->db->update(self::$table, $data);
    }

    public function getLastNo($param) {
        $this->db->select_max('ld_artno');
        $this->db->where('ld_type', $param);
        $q = $this->db->get(self::$table)->row();

        if ($q->ld_artno == 0 || $q->ld_artno == NULL):
            return $q->ld_artno + 1;
        else:
            return $q->ld_artno + 1;
        endif;
    }

}
