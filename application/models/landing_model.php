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
class landing_model extends CI_Model {

    //put your code here
    protected static $table = "landing";
    protected static $tableRelated = "landing_type";

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

    public function getsArray($param = array()) {
        $sql = "SELECT * FROM " . self::$table;

        if (isset($param["where"]))
            $sql .= " WHERE " . $param["where"];
        if (isset($param["and"]))
            $sql .= " AND " . $param["and"];
        if (isset($param["order"]))
            $sql .= " ORDER BY " . $param["order"];
        if (isset($param["limit"]))
            $sql .= " LIMIT " . $param["limit"];

        return $this->db->query($sql)->result_array();
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

    public function getLastNo($param) {
        $sql = "SELECT viewed FROM " . self::$table;
        $sql .= " WHERE id= " . $param;

        return $this->db->query($sql)->row();
    }

    public function count($field, $param) {
        $lastNo = $this->getLastNo($param);
        $rows = $lastNo;

        if (count($rows) > 0):
            $row = $rows->viewed;
        endif;

        $data = array(
            'viewed' => $row + 1,
        );

        $this->db->where($field, $param);
        $this->db->update(self::$table, $data);
    }

    public function insert() {
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

            if ($myfield == 'updatedt'):
                $data[$myfield] = date('Y-m-d H:i:s');
            endif;
        endforeach;

        $this->db->insert(self::$table, $data);
    }

    public function insertBatch($data) {
        $incoming = array();
        $oldData = $this->getsArray();
        $incoming[] = $data;
        $c = count($data) - 1;
        $onDB = count($oldData);
        $onSync = count($data);

        if ($onSync > $onDB):
            foreach ($incoming as $valI):
                $newData = array_diff_key($valI, $oldData);
                $this->db->insert_batch(self::$table, $newData);
                $this->loopArray($c, $valI, $oldData);
            endforeach;
        else:
            foreach ($incoming as $valI):
                $this->loopArray($c, $valI, $oldData);
            endforeach;
        endif;
    }

    private function loopArray($c, $valI, $oldData) {
        for ($i = 0; $i <= $c; $i++):
            foreach ($oldData as $valD):
                if ($valI[$i]['id'] == $valD['id']):
                    if ($valI[$i]['updatedt'] != $valD['updatedt']):
                        $data = array(
                            'ld_title' => $valI[$i]['ld_title'],
                            'ld_content' => $valI[$i]['ld_content'],
                            'ld_type' => $valI[$i]['ld_type'],
                            'ld_image' => $valI[$i]['ld_image'],
                            'ld_theme' => $valI[$i]['ld_theme'],
                            'ip_address' => $valI[$i]['ip_address'],
                            'createdt' => $valI[$i]['createdt'],
                            'updatedt' => $valI[$i]['updatedt'],
                        );

                        $param = $valI[$i]['id'];
                        $this->updateBatch('id', $param, $data);
                    endif;
                endif;
            endforeach;
        endfor;
    }

    public function updateBatch($field, $param, $data) {
        $this->db->where($field, $param);
        $this->db->update(self::$table, $data);
    }

    public function unUpdate() {
        $SQL = "UPDATE landing 
                SET ld_act=0";

        $this->db->query($SQL);
    }

    public function update($field, $param) {
        $data = array('ld_act' => 1);

        $this->db->where($field, $param);
        $this->db->update(self::$table, $data);
    }

}
