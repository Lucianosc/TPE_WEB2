<?php

require_once './View/FlatView.php';
require_once './Model/FlatModel.php';

require_once './Model/CityModel.php';

require_once './Controller/UserController.php';
require_once './View/UserView.php';


class FlatController
{

    private $model;
    private $view;
    private $modelCity;
    private $controllerUser;
    private $viewUser;

    public function __construct()
    {

        $this->view = new FlatView();
        $this->model = new FlatModel();

        $this->modelCity = new CityModel();

        $this->controllerUser = new UserController();
        $this->viewUser = new UserView();
    }

    function showFlats()
    {
        $logged = $this->controllerUser->isLoggedIn();
        $flats = $this->model->getFlats();
        $cities = $this->modelCity->getCities();
        $this->view->ShowHome($flats, $cities, $logged);
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
            if ($this->alreadyLoaded($name, $address, $price, $id_city_fk) === false) {
                $this->model->insertFlat($name, $address, $price, $id_city_fk);
            }
        }
        $this->view->showFlats();
    }
    //ALTA -> Checkea si existe el depto en la db 
    function alreadyLoaded($name, $address, $price, $id_city_fk)
    {
        $flats = $this->model->getFlats();
        $exist = false;
        foreach ($flats as $flat) {
            if (($flat->nombre === $name) && ($flat->direccion === $address)
                && ($flat->precio === $price) && ($flat->id_ciudad_fk === $id_city_fk)
            ) {
                $exist = true;
            }
        }
        return $exist;
    }

    //baja
    function deleteFlat($params = null)
    {

        $logged = $this->controllerUser->isLoggedIn();
        if ($logged) {
            $id = $params[':ID'];
            $this->model->deleteFlat($id);
            $this->view->showFlats();
        } else {
            $this->viewUser->RenderError("Logueate he intentá nuevamente");
        }
    }

    //redirección -> para modificación
    function editFlat($params = null)
    {
        $logged = $this->controllerUser->isLoggedIn();
        if ($logged) {
            $id_flat = $params[':ID'];
            $cities = $this->modelCity->getCities();
            $flat = $this->model->GetFlatById($id_flat);
            $this->view->ShowEditFlat($flat, $cities);
        } else {
            $this->viewUser->RenderError("Logueate he intentá nuevamente");
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
        $this->view->showFlats();
    }

    //filtro
    function filterFlatsByCity($params = null)
    {
        $logged = $this->controllerUser->isLoggedIn();
        $city_name = $params[':NAME'];
        if (isset($city_name)) {
            $flats = $this->model->GetFlatsByCity($city_name);
            $cities = $this->modelCity->GetCities();
        }
        $this->view->ShowFlatsByCity($flats, $cities, $city_name, $logged);
    }
}
