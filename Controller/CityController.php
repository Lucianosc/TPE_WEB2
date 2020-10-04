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
<<<<<<< HEAD
            if($city->nombre !== $name) {
                $exist = false;   
=======
            if($city->nombre === $name) {
                $exist = true;   
>>>>>>> 2ee3eac061920bd3668c2b7d4f472f75c9372965
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
    //modificacion //--------------REVISAR
    function editCity() {
        $name = $_GET['input_edit_name'];
        $id = $_GET['input_edit_id'];
        if( isset($name) && !empty($name) && (isset($id) && is_numeric($id)) ) {
            $this->model->updateCity($name, $id);
        } 
        $this->view->showCities();
    }

}