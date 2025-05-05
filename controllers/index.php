<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        //$admission = $this->_Data->get_setting_admission();
        //if(date('Y-m-d') >= $admission[0]['date_start']){
            require('layouts/header.php');
            $this->view->render('index/admission');
            require('layouts/footer.php');
        //}else{
            //$this->view->render('index/index');
        //}
    }
}
?>
