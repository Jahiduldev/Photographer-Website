<?php

class Common_Model extends CI_Model {
    public  function  __construct() {
        parent::__construct();
    }

    public function insertData($table_name,$data) {
        return $this->db->insert($table_name, $data);
    }

    public function updateData($table_name,$data,$column_name,$column_value) {
        $this->db->where($column_name, $column_value);
        return  $this->db->update($table_name, $data);
    }

    public function insertDataGetId($table_name,$data) {
        $this->db->insert($table_name, $data);
        return  $this->db->insert_id();
    }

    public function getData($table_name) {
        $query= $this->db->get($table_name);
        return $query->result();
    }

   public function getDataWhere($table_name,$column_name,$column_value) {
        $this->db->where($column_name, $column_value);
        $query= $this->db->get($table_name);
        return $query->result();
    }


}
?>
