<?php

require_once './View/CityView.php';
require_once './Model/CityModel.php';

class CityController {

    private $model;
    private $view;

    public function __construct(){
        $this->view = new CityView();
        $this->model = new CityModel();
    }

    function showCities(){
        $cities = $this->model->getCities();
        $this->view->ShowHome($cities);
    }
    //Alta
    function insertCity() {
        $name = $_POST['input_name'];
        if(isset($name) && !empty($name)) {
            if($this->alreadyLoaded($name) === false) {
                $this->model->insertCity($name);
            }
        } 
        $this->view->showCities();
    }
        //Checkea si existe la ciudad ya está cargada
    function alreadyLoaded($name) {
        $cities = $this->model->getCities();
        $exist = false;
        foreach($cities as $city) {
            if($city->nombre === $name) {
                $exist = true;   
            }
        }
        return $exist;
    }
    //baja
    function deleteCity($params = null) {
        $id = $params[':ID'];
        $this->model->deleteCity($id);
        $this->view->showCities();
    }
    //redireccion -> para modificacion
    function editCity($params = null) {
        $id_city = $params[':ID'];
        $city = $this->model->GetCityById($id_city);
        $this->view->ShowEditCity($city);
    }
    //modificacion
    function updateCity(){
        $id = $_POST['input_edit_id'];
        $name = $_POST['input_edit_name'];
        if((isset($name) && !empty($name))) {
            if($this->alreadyLoaded($id, $name) === false) {
                $this->model->updateCity($id, $name);
            }
        } 
        $this->view->showCities();
    }

}