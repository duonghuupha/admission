<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $admission = $this->_Data->get_setting_admission();
        if(date('Y-m-d') >= $admission[0]['date_start']){
            require('layouts/header.php');
            $this->view->render('index/admission');
            require('layouts/footer.php');
        }else{
            $this->view->render('index/index');
        }
    }

    function add(){
        $code = time(); $fullname = addslashes($_REQUEST['fullname']); $gender = $_REQUEST['gender']; $birthday = $this->_Convert->convertDate($_REQUEST['birthday']);
        $addborn = $this->model->return_id_province($_REQUEST['add_born']); $nation = $_REQUEST['nation']; $object = addslashes($_REQUEST['object']);
        $disability = addslashes($_REQUEST['disability']); $identifi = $_REQUEST['identifi']; $email = $_REQUEST['email'];
        if($this->model->dupliObj(0, $identifi) > 0){
            $jsonObj['msg'] = "Số định danh cá nhân của học sinh đã tồn tại trong hệ thống tuyển sinh của kỳ tuyển sinh";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            // kiem tra ky tuyen sinh
            if($this->model->check_setting_admission() == 0){
                $jsonObj['msg'] = "Chưa đến thời gian tuyển sinh, không thể thêm thông tin học sinh";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array("code" => $code, "admission_id" => $this->model->return_id_admission_active(), "fullname" => $fullname, "gender" => $gender, "nation" => $nation,
                                "object" => $object, "birthday" => $birthday, "add_born" => $addborn, "disability" => $disability, "identifi" => $identifi, "email" => $email,
                                "source" => 1, "user_id" => 1, "create_at" => date("Y-m-d H:i:s"), "object_admission" => 0, "parent_id" => 0, "user_id_import" => 0, "attach" => '');
                $temp = $this->model->addObj($data);
                if($temp){
                    $resident = $this->admission_resident($code); $residence = $this->admission_residence($code);
                    // cap nhat doi tuong tuyen sinh
                    if($resident['success'] == true && $residence['success'] == true){
                        if($resident['object_resident'] == 1 && $residence['object_residence'] == 1){ // DT1
                            $data_object = array("object_admission" => 1); $this->model->updateOobj_by_code($code, $data_object);
                        }elseif($resident['object_resident'] == 1 && $residence['object_residence'] == 0){ // DT2
                            $data_object = array("object_admission" => 2); $this->model->updateOobj_by_code($code, $data_object);
                        }elseif($resident['object_resident'] == 0 && $residence['object_residence'] == 1){ // DT3
                            $data_object = array("object_admission" => 3); $this->model->updateOobj_by_code($code, $data_object);
                        }else{ // DT 4
                            $data_object = array("object_admission" => 4); $this->model->updateOobj_by_code($code, $data_object);
                        }
                        // cap nhat thong tin quan he cua hoc sinh
                        $father = $this->admission_relation_father($code); $mother = $this->admission_relation_mother($code); $guar = $this->admission_relation_guar($code);
                        if($father['success'] == true && $mother['success'] == true && $guar['success'] == true){
                            $jsonObj['msg'] = "Thêm thông tin tuyển sinh thành công";
                            $jsonObj['success'] = true;
                            $this->view->jsonObj = json_encode($jsonObj);
                        }else{
                            $this->model->deleteObj_by_code($code); // xoa thong tin hoc sinh da them vao
                            $jsonObj['msg'] = "Có lỗi trong quá trình thêm thông tin cha, mẹ hoặc người giám hộ, vui lòng kiểm tra lại thông tin";
                            $jsonObj['success'] = false;
                            $this->view->jsonObj = json_encode($jsonObj);
                        }
                    }else{
                        $this->model->deleteObj_by_code($code); // xoa thong tin hoc sinh da them vao
                        $jsonObj['msg'] = "Có lỗi trong quá trình thêm đối tượng tuyển sinh, vui lòng kiểm tra lại thông tin";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }else{
                    $jsonObj['msg'] = "Có lỗi trong quá trình thêm học sinh, vui lòng kiểm tra lại thông tin";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render('index/add');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function check_village(){
        $code = $_REQUEST['code_commune'];
        $result = $this->model->get_data_check_village($code);
        $this->view->jsonObj = $result;
        $this->view->render('index/check_village');
    }

    function check_year_admission(){
        $year = $_REQUEST['year'];
        $result = $this->model->get_data_check_year_admission($year);
        $this->view->jsonObj = $result;
        $this->view->render('index/check_year_admission');
    }

    function admission_resident($code){
        $province = $this->model->return_id_province($_REQUEST['province_id_resident']); $district = $this->model->return_id_district($_REQUEST['district_id_resident']);
        $commune = $this->model->return_id_commune($_REQUEST['commune_id_resident']); $village = $_REQUEST['village_id_resident']; $town = $_REQUEST['town_resident'];
        $object_admission = $this->model->check_object_admission($village);
        $data = array("admission_code" => $code, "province_id" => $province, "district_id" => $district, "commune_id" => $commune, "village_id" => $village, "code" => time(),
                        "town" => $town);
        $temp = $this->model->addObj_resident($data);
        if($temp){
            $jsonObj['object_resident'] = $object_admission; // 1 la trong khu vuc tuyen sinh, 0 la ngoai khu vuc tuyen sinh
            $jsonObj['success'] = true;
        }else{
            $jsonObj['success'] = false;
        }
        return $jsonObj;
    }

    function admission_residence($code){
        $province = $this->model->return_id_province($_REQUEST['province_id_residence']); $district = $this->model->return_id_district($_REQUEST['district_id_residence']);
        $commune = $this->model->return_id_commune($_REQUEST['commune_id_residence']); $village = $_REQUEST['village_id_residence']; $town = $_REQUEST['town_residence'];
        $object_admission = $this->model->check_object_admission($village);
        $data = array("admission_code" => $code, "province_id" => $province, "district_id" => $district, "commune_id" => $commune, "village_id" => $village, "code" => time(),
                        "town" => $town);
        $temp = $this->model->addObj_residence($data);
        if($temp){
            $jsonObj['object_residence'] = $object_admission; // 1 la trong khu vuc tuyen sinh, 0 la ngoai khu vuc tuyen sinh
            $jsonObj['success'] = true;
        }else{
            $jsonObj['success'] = false;
        }
        return $jsonObj;
    }

    function admission_relation_father($code){ 
        $fullname = addslashes($_REQUEST['fullname_father']); $birthday = $_REQUEST['birthday_father']; $phone = $_REQUEST['phone_father']; 
        $job = $_REQUEST['job_father']; $identifi = $_REQUEST['identifi_father'];
        if(strlen(trim($fullname)) > 0){ // co ton tai
            $data = array("admission_code" => $code, "fullname" => $fullname, "birthday" => $birthday, "phone" => $phone, "job" => $job, "code" => time(), "relation_id" => 1,
                        "identifi" => $identifi);
            $temp = $this->model->addObj_relation($data);
            if($temp){
                $jsonObj['success'] = true;
            }else{
                $jsonObj['success'] = false;
            }
        }else{ // khong ton tai
            $jsonObj['success'] = true;
        }
        return $jsonObj;
    }

    function admission_relation_mother($code){ 
        $fullname = addslashes($_REQUEST['fullname_mother']); $birthday = $_REQUEST['birthday_mother']; $phone = $_REQUEST['phone_mother']; 
        $job = $_REQUEST['job_mother']; $identifi = $_REQUEST['identifi_mother'];
        if(strlen(trim($fullname)) > 0){ // co ton tai
            $data = array("admission_code" => $code, "fullname" => $fullname, "birthday" => $birthday, "phone" => $phone, "job" => $job, "code" => time(), "relation_id" => 2,
                        "identifi" => $identifi);
            $temp = $this->model->addObj_relation($data);
            if($temp){
                $jsonObj['success'] = true;
            }else{
                $jsonObj['success'] = false;
            }
        }else{ // khong ton tai
            $jsonObj['success'] = true;
        }
        return $jsonObj;
    }

    function admission_relation_guar($code){
        $fullname = addslashes($_REQUEST['fullname_guar']); $birthday = $_REQUEST['birthday_guar']; $phone = $_REQUEST['phone_guar']; 
        $job = $_REQUEST['job_guar']; $identifi = $_REQUEST['identifi_guar'];
        if(strlen(trim($fullname)) > 0){ // co ton tai
            $data = array("admission_code" => $code, "fullname" => $fullname, "birthday" => $birthday, "phone" => $phone, "job" => $job, "code" => time(), "relation_id" => 3,
                        "identifi" => $identifi);
            $temp = $this->model->addObj_relation($data);
            if($temp){
                $jsonObj['success'] = true;
            }else{
                $jsonObj['success'] = false;
            }
        }else{ // khong ton tai
            $jsonObj['success'] = true;
        }
        return $jsonObj;
    }
}
?>
