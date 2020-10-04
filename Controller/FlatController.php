<?php

require_once './View/FlatView.php';
require_once './Model/FlatModel.php';

require_once './Model/CityModel.php';

class FlatController {

    private $model;
    private $view;

    public function __construct(){
        $this->view = new FlatView;
        $this->model = new FlatModel;
        $this->modelC = new CityModel;
    }

    function showFlats(){
        $flats = $this->model->getFlats();
        $cities = $this->modelC->getCities();
        $this->view->ShowHome($flats, $cities);
    }

    //Alta
    function insertFlat() {
        $name = $_POST['input_name'];
        $address = $_POST['input_address'];
        $price = $_POST['input_price'];
        $id_city_fk = $_POST['input_id_city_fk'];
        if((isset($name) && !empty($name)) && 
        (isset($address) && !empty($address)) &&
        (isset($price) && is_numeric($price)) && 
        (isset($id_city_fk) && is_numeric($id_city_fk))) {
            if($this->alreadyLoaded($name, $address, $price, $id_city_fk) === false) {
                $this->model->insertFlat($name, $address, $price, $id_city_fk);
            }
        } 
        $this->view->showFlats();
    }
    //Checkea si existe el depto en la db //--------------REVISAR
    function alreadyLoaded($name, $address, $price, $id_city_fk) {
        $flats = $this->model->getFlats();
        $exist = false;
        foreach($flats as $flat) {
            if( ($flat->nombre === $name) && ($flat->direccion === $address)
            && ($flat->precio === $price) && ($flat->id_city_fk === $id_city_fk)) {
                $exist = true;   
            }
        }
        return $exist;
    }

    //baja
    function deleteFlat($params = null) {
        $id = $params[':ID'];
        $this->model->deleteFlat($id);
        $this->view->showFlats();
    }
    //--------------REVISAR
    //modificacion
    function editFlat() {
<<<<<<< HEAD
        $id = $_POST[''];
        $name = $_POST['input_name'];
        $address = $_POST['input_address'];
        $price = $_POST['input_price'];
        $id_city_fk = $_POST['input_id_city_fk'];
        if( isset($name)&&!empty($name)) {
            $this->model->updateFlat($id, $name, $address, $price, $id_city_fk);
=======
        $name = $_GET['input_edit_name'];
        $id = $_GET['input_edit_id'];
        if((isset($name) && !empty($name)) && (isset($id) && is_numeric($name))) {
            $this->model->updateFlat($name, $id);
>>>>>>> 2ee3eac061920bd3668c2b7d4f472f75c9372965
        } 
        $this->view->showFlats();
    }
}