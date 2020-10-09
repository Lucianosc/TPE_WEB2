<?php

require_once './View/CityView.php';
require_once './Model/CityModel.php';

require_once './Controller/UserController.php';
require_once './View/UserView.php';

class CityController
{

    private $model;
    private $view;
    private $controllerUser;
    private $viewUser;

    public function __construct()
    {
        $this->view = new CityView();
        $this->model = new CityModel();

        $this->controllerUser = new UserController();
        $this->viewUser = new UserView();
    }

    function showCities()
    {
        $logged = $this->controllerUser->isLoggedIn();

        $cities = $this->model->getCities();
        $this->view->ShowHome($cities, $logged);
    }
    //Alta
    function insertCity()
    {
        $name = $_POST['input_name'];
        if (isset($name) && !empty($name)) {
            if ($this->alreadyLoaded($name) === false) {
                $this->model->insertCity($name);
            }
        }
        $this->view->showCities();
    }

    //ALTA -> Checkea si existe la ciudad en la db
    function alreadyLoaded($name)
    {
        $cities = $this->model->getCities();
        $exist = false;
        foreach ($cities as $city) {
            if ($city->nombre === $name) {
                $exist = true;
            }
        }
        return $exist;
    }
    //baja
    function deleteCity($params = null)
    {
        $logged = $this->controllerUser->isLoggedIn();
        if ($logged) {
            $id = $params[':ID'];
            $this->model->deleteCity($id);
            $this->view->showCities();
        } else {
            $this->viewUser->RenderError("Logueate he intentá nuevamente");
        }
    }

    //redireccion -> para modificacion
    function editCity($params = null)
    {
        $logged = $this->controllerUser->isLoggedIn();
        if ($logged) {
            $id_city = $params[':ID'];
            $city = $this->model->GetCityById($id_city);

            if ($city) {    //checkea si obtuvo un objeto no vacío de la db
                $this->view->ShowEditCity($city, $logged);
            } else {
                $this->viewUser->RenderError("No existe id en la base de datos");
            }
        } else {
            $this->viewUser->RenderError("Logueate he intentá nuevamente");
        }
    }

    //modificacion
    function updateCity()
    {
        $id = $_POST['input_edit_id'];
        $name = $_POST['input_edit_name'];
        if ((isset($name) && !empty($name))) {
            if ($this->alreadyLoaded($id, $name) === false) {
                $this->model->updateCity($id, $name);
            }
        }
        $this->view->showCities();
    }
}
