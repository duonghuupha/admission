<?php
class Model {
    function __construct() {
		$this->db = new Database();
	}

    // them moi du lieu
    function insert($table, $array){
        $cols = array();
        $bind = array();
        foreach($array as $key => $value){
            $cols[] = $key;
            $bind[] = "'".$value."'";
        }
        $query = $this->db->query("INSERT INTO ".$table." (".implode(",", $cols).") VALUES (".implode(",", $bind).")");
        return $query;
    }

    // cap nhat du lieu
    function update($table, $array, $where){
        $set = array();
        foreach($array as $key => $value){
            $set[] = $key." = '".$value."'";
        }
        $query = $this->db->query("UPDATE ".$table." SET ".implode(",", $set)." WHERE ".$where);
        return $query;
    }

    // xoa du lieu
    function delete($table, $where = ''){
        if($where == ''){
            $query = $this->db->query("DELETE FROM ".$table);
        }else{
        $query = $this->db->query("DELETE FROM ".$table." WHERE ".$where);
        }
        return $query;
    }

    // thong tin tuyen sinh
    function get_setting_admission(){
        $query = $this->db->query("SELECT * FROM tbl_setting_admission WHERE status = 1");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // thong tin don vi chu quan
    function get_setting(){
        $query = $this->db->query("SELECT * FROM tbl_setting WHERE id = 1");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
