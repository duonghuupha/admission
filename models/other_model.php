<?php
class Other_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_combo_province($q){
        $query = $this->db->query("SELECT title, code AS id FROM tbldm_province WHERE title LIKE '%$q%'");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_combo_district($q, $code_province){
        $query = $this->db->query("SELECT title, code AS id FROM tbldm_district WHERE title LIKE '%$q%' AND code_province = '$code_province'");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_combo_commune($q, $code_district){
        $query = $this->db->query("SELECT title, code AS id FROM tbldm_commune WHERE title LIKE '%$q%' AND code_district = '$code_district'");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_combo_village($q, $code_commune){
        $query = $this->db->query("SELECT title, id FROM tbldm_village WHERE title LIKE '%$q%' AND code_commune = '$code_commune'");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_combo_nation($q){
        $query = $this->db->query("SELECT title, id FROM tbldm_nation WHERE title LIKE '%$q%' AND status = 1");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>