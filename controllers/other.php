<?php
class Other extends Controller{
    function __construct(){
        parent::__construct();
    }

    function combo_province(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_combo_province($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_province");
    }

    function combo_district(){
        $codeprovince = $_REQUEST['code_province'];
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_combo_district($keyword, $codeprovince);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_district");
    }

    function combo_commune(){
        $codeprovince = $_REQUEST['code_district'];
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_combo_commune($keyword, $codeprovince);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_commune");
    }

    function combo_village(){
        $codecommune = $_REQUEST['code_commune'];
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_combo_village($keyword, $codecommune);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_village");
    }

    function combo_nation(){
        $keyword = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
        $jsonObj = $this->model->get_combo_nation($keyword);
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render("other/combo_nation");
    }
}
?>