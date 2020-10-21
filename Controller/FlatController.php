<?php

require_once './View/FlatView.php';
require_once './Model/FlatModel.php';

require_once './Model/CityModel.php';

require_once './helpers/AuthHelper.php';
require_once './View/UserView.php';


class FlatController
{

    private $model;
    private $view;
    private $modelCity;
    private $authHelper;
    private $viewUser;

    public function __construct()
    {

        $this->view = new FlatView();
        $this->model = new FlatModel();

        $this->modelCity = new CityModel();

        $this->authHelper = new AuthHelper();
        $this->viewUser = new UserView();
    }

    function showFlats()
    {
        $logged = $this->authHelper->isLoggedIn();
        $flats = $this->model->getFlats();
        $cities = $this->modelCity->getCities();
        $this->view->ShowFlats($flats, $cities, $logged);
    }

    function showFlat($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();
        $id_flat = $params[':ID'];
        $flat = $this->model->getFlatById($id_flat);

        if ($flat) {    //checkea si obtuvo un objeto no vacío de la db
            $cities = $this->modelCity->getCities();
            $flat = array($flat);
            $this->view->ShowFlats($flat, $cities, $logged, $id_flat);
        } else {
            $this->viewUser->RenderError("No existe id en la base de datos");
        }
    }

    //alta
    function insertFlat()
    {
        $name = $_POST['input_name'];
        $address = $_POST['input_address'];
        $price = $_POST['input_price'];
        $id_city_fk = $_POST['input_id_city_fk'];
        if ((isset($name) && !empty($name)) &&
            (isset($address) && !empty($address)) &&
            (isset($price) && is_numeric($price)) &&
            (isset($id_city_fk) && is_numeric($id_city_fk))
        ) {
            if ($this->alreadyLoaded($name, $address, $id_city_fk) === false) {
                $this->model->insertFlat($name, $address, $price, $id_city_fk);
            }
        }
        $this->view->showFlatsLocation();
    }
    //ALTA -> Checkea si existe el depto en la db 
    function alreadyLoaded($name, $address, $id_city_fk)
    {
        $flats = $this->model->getFlats();
        $exist = false;
        foreach ($flats as $flat) {
            if (($flat->nombre === $name) && ($flat->direccion === $address) && ($flat->id_ciudad_fk === $id_city_fk) ) 
            {
                $exist = true;
            }
        }
        return $exist;
    }

    //baja
    function deleteFlat($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();
        if ($logged) {
            $id = $params[':ID'];
            $this->model->deleteFlat($id);
            $this->view->showFlatsLocation();
        } else {
            $this->viewUser->RenderError("Logueate e intentá nuevamente");
        }
    }

    //redirección -> para modificación
    function editFlat($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();
        if ($logged) {
            $id_flat = $params[':ID'];
            $cities = $this->modelCity->getCities();
            $flat = $this->model->getFlatById($id_flat);

            if ($flat) {    //checkea si obtuvo un objeto no vacío de la db
                $this->view->ShowEditFlat($flat, $cities, $logged);
            } else {
                $this->viewUser->RenderError("No existe id en la base de datos");
            }
        } else {
            $this->viewUser->RenderError("Logueate e intentá nuevamente");
        }
    }
    //modificación
    function updateFlat()
    {

        $id = $_POST['input_edit_id'];
        $name = $_POST['input_edit_name'];
        $address = $_POST['input_edit_address'];
        $price = $_POST['input_edit_price'];
        $id_city_fk = $_POST['input_edit_id_city_fk'];

        if ((isset($name) && !empty($name)) &&
            (isset($address) && !empty($address)) &&
            (isset($price) && is_numeric($price)) &&
            (isset($id_city_fk) && is_numeric($id_city_fk))
        ) {

            if ($this->alreadyLoaded($id, $name, $address, $price, $id_city_fk) === false) {
                $this->model->updateFlat($id, $name, $address, $price, $id_city_fk);
            }
        }
        $this->view->showFlatsLocation();
    }

    //filtro
    function filterFlatsByCity($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();
        $city_name = $params[':NAME'];
        if (isset($city_name)) {
            $flats = $this->model->getFlatsByCity($city_name);
            $cities = $this->modelCity->getCities();
        }
        if(empty($flats)){
            $errorMessaje = "No hay departamentos en esta ciudad.";
            $this->view->ShowError($cities, $errorMessaje, $logged);
        }
        else{
            $this->view->ShowFlats($flats, $cities, $logged);
        }
    }
}
