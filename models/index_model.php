<?php
class Index_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function dupliObj($id, $idenfity){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_admission WHERE identifi = $idenfity");
        if($id > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_admission WHERE identifi = $idenfity AND id != $id");
        }
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['Total'];
    }

    function check_setting_admission(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_setting_admission WHERE CURDATE() >= date_start AND CURDATE() <= date_end AND status = 1");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['Total'];
    }

    function addObj($data){
        $query = $this->insert("tbl_admission", $data);
        return $query;
    }

    function updateOobj_by_code($code, $data){
        $query = $this->update("tbl_admission", $data, "code = '$code'");
        return $query;
    }
    function deleteObj_by_code($code){
        $query = $this->delete("tbl_admission", "code = '$code'");
        return $query;
    }
    
    function addObj_resident($data){
        $query = $this->insert("tbl_admission_resident", $data);
        return $query;
    }

    function addObj_residence($data){
        $query = $this->insert("tbl_admission_residence", $data);
        return $query;
    }

    function addObj_relation($data){
        $query = $this->insert("tbl_admission_relation", $data);
        return $query;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_check_village($code){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_setting_admission WHERE FIND_IN_SET((SELECT tbldm_commune.id FROM tbldm_commune 
                                    WHERE tbldm_commune.code = '$code'), commune_id) AND status = 1");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['Total'];
    }

    function get_data_check_year_admission($year){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_setting_admission WHERE status = 1 AND FIND_IN_SET($year, year_admission)");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['Total'];
    }

    function return_id_province($code){
        $query = $this->db->query("SELECT id FROM tbldm_province WHERE code = '$code'");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['id'];
    }

    function return_id_district($code){
        $query = $this->db->query("SELECT id FROM tbldm_district WHERE code = '$code'");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['id'];
    }

    function return_id_commune($code){
        $query = $this->db->query("SELECT id FROM tbldm_commune WHERE code = '$code'");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['id'];
    }

    function return_id_admission_active(){
        $query = $this->db->query("SELECT id FROM tbl_setting_admission WHERE status = 1");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]['id'];
    }

    function check_object_admission($village){
        if(strlen($village) > 0){
            $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_setting_admission WHERE FIND_IN_SET($village, village_id) AND status = 1");
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['Total'];
        }else{
            return 0;
        }
    }
}
?>