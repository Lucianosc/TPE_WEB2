<?php

require_once './View/CityView.php';
require_once './Model/CityModel.php';

class CityController {

    private $model;
    private $view;

    public function __construct(){
        $this->view = new CityView;
        $this->model = new CityModel;
    }
    //Alta
    function insertCity() {
        $name = $_POST['input_name'];
        if(isset($name) && !empty($name)) {
            if($this->alreadyLoaded($name) === false) {
                $this->model->insertCity($name);
            }
        } 
        $this->view->showHomeLocation();
    }
        //Checkea si existe la ciudad ya está cargada
    function alreadyLoaded($name) {
        $cities = $this->model->getCities();
        $exist = true;
        foreach($cities as $city) {
            if($city->name !== $name) {
                $exist = false;   
            }
        }
        return $exist;
    }
    //baja
    function deleteCity($params = null) {
        $id = $params[':ID'];
        $this->model->deleteCity($id);
        $this->view->showHomeLocation();
    }
    //modificacion
    function editCity() {
        $name = $_GET['input_edit_name'];
        $id = $_GET['input_edit_id'];
        if( isset($name)&&!empty($name)) {
            $this->model->updateCity($name, $id);
        } 
        $this->view->showHomeLocation();
    }

}