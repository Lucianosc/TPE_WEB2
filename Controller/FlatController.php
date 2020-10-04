<?php

require_once './View/FlatView.php';
require_once './Model/FlatModel.php';

class FlatController {

    private $model;
    private $view;

    public function __construct(){
        $this->view = new FlatView;
        $this->model = new FlatModel;
    }

    function showFlats(){
        $flats = $this->model->getFlats();
        $this->view->ShowHome($flats);
    }

    //Alta
    function insertFlat() {
        $name = $_POST['input_name'];
        $address = $_POST['input_address'];
        $price = $_POST['input_price'];
        $id_city_fk = $_POST['input_id_city_fk'];
        if(isset($name) && !empty($name)) {
            if($this->alreadyLoaded($name) === false) {
                $this->model->insertFlat($name, $address, $price, $id_city_fk);
            }
        } 
        $this->view->showFlats();
    }
    //Checkea si existe el depto ya está cargado
    function alreadyLoaded($name) {
        $flats = $this->model->getFlats();
        $exist = true;
        foreach($flats as $flat) {
            if($flat->name !== $name) {
                $exist = false;   
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

    //modificacion
    function editFlat() {
        $id = $_POST[''];
        $name = $_POST['input_name'];
        $address = $_POST['input_address'];
        $price = $_POST['input_price'];
        $id_city_fk = $_POST['input_id_city_fk'];
        if( isset($name)&&!empty($name)) {
            $this->model->updateFlat($id, $name, $address, $price, $id_city_fk);
        } 
        $this->view->showFlats();
    }
}