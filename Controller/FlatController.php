<?php

require_once './View/FlatView.php';
require_once './Model/FlatModel.php';

require_once './Model/CityModel.php';

require_once './helpers/AuthHelper.php';
require_once './View/UserView.php';

require_once './Model/ImageModel.php';

class FlatController
{

    private $model;
    private $view;
    private $modelCity;
    private $authHelper;
    private $viewUser;
    private $modelImage;
    private $controllerImage;

    public function __construct()
    {

        $this->view = new FlatView();
        $this->model = new FlatModel();

        $this->modelCity = new CityModel();

        $this->authHelper = new AuthHelper();
        $this->viewUser = new UserView();

        $this->modelImage = new ImageModel();
        $this->controllerImage = new ImageController();
    }

    /*function showFlats()
    {
        $logged = $this->authHelper->isLoggedIn();
        $flats = $this->model->getFlats();
        $cities = $this->modelCity->getCities();
        $this->view->ShowFlats($flats, $cities, $logged);
    }*/

    function showFlat($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //debe ser admin?
        $id_flat = $params[':ID'];
        $flat = $this->model->getFlatById($id_flat);

        if ($flat) {    //checkea si obtuvo un objeto no vacío de la db
            $city = $this->modelCity->getCities();
            $images = $this->modelImage->getImagesByFlat($id_flat);
            $this->view->ShowFlat($flat, $city, $logged, $images);
        } else {
            $this->viewUser->RenderError("No existe id en la base de datos");
        }
    }

    //alta
    function insertFlat()   //Es necesario checkeo línea 66?
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA SOLO ADMIN check
        $role = $this->authHelper->checkLoggedSession();
        if ($logged && $role == 0) {
            $name = $_POST['input_name'];
            $address = $_POST['input_address'];
            $price = $_POST['input_price'];
            $id_city_fk = $_POST['input_id_city_fk'];
            $tmp_images = $_FILES['imagesToUpload']['tmp_name'];

            if ((isset($name) && !empty($name)) &&
                (isset($address) && !empty($address)) &&
                (isset($price) && is_numeric($price)) &&
                (isset($id_city_fk) && is_numeric($id_city_fk))
            ) {
                if ($this->alreadyLoaded($name, $address, $id_city_fk) === false) {

                    $id_flat = $this->model->insertFlat($name, $address, $price, $id_city_fk);

                    if (!empty($tmp_images[0]))  //si hay alguna imagen
                        $this->controllerImage->insertImages($tmp_images, $id_flat);

                    else $this->view->showFlatLocation($id_flat);
                } else {
                    //$this->viewUser->RenderError("Estos datos corresponden a un departamento en la base de datos. Intente nuevamente.");
                    $cities = $this->modelCity->getCities();
                    $errorMessaje = "Estos datos corresponden a un departamento en la base de datos. Intente nuevamente.";
                    $this->view->ShowError($cities, $errorMessaje, $logged);
                }
            } else $this->viewUser->RenderError("Debe completar todos los campos del formulario"); //---es necesario?
        } else
            $this->viewUser->RenderError("Debe ser administrador para acceder a esta sección.");
    }

    //ALTA -> Checkea si existe el depto en la db 
    private function alreadyLoaded($name, $address, $id_city_fk)
    {
        $flats = $this->model->getFlats();
        $exist = false;
        foreach ($flats as $flat) {
            if (($flat->nombre === $name) && ($flat->direccion === $address) && ($flat->id_ciudad_fk === $id_city_fk)) {
                $exist = true;
            }
        }
        return $exist;
    }

    //baja
    function deleteFlat($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA SOLO ADMIN check
        $role = $this->authHelper->checkLoggedSession();
        if ($logged && $role == 0) {
            $id = $params[':ID'];   //falta checkear que exista el departamento en la db x si entra por url?
            $this->model->deleteFlat($id);
            $this->view->showFlatsLocation();
        } else {
            $this->viewUser->RenderError("Debe ser administrador para acceder a esta sección.");
        }
    }

    //redirección -> para modificación
    function editFlat($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA SOLO ADMIN check
        $role = $this->authHelper->checkLoggedSession();
        if ($logged && $role == 0) {
            $id_flat = $params[':ID'];
            $cities = $this->modelCity->getCities();
            $flat = $this->model->getFlatById($id_flat);

            if ($flat) {    //checkea si obtuvo un objeto no vacío de la db
                $images = $this->modelImage->getImagesByFlat($id_flat);
                $this->view->ShowEditFlat($flat, $cities, $images, $logged);
            } else {
                $this->viewUser->RenderError("No existe id en la base de datos");
            }
        } else {
            $this->viewUser->RenderError("Debe ser administrador para acceder a esta sección.");
        }
    }
    //modificación
    function updateFlat()   //Es necesario checkeo línea 142?
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA SOLO ADMIN
        $role = $this->authHelper->checkLoggedSession();
        if ($logged && $role == 0) {
            $id = $_POST['input_edit_id'];
            $name = $_POST['input_edit_name'];
            $address = $_POST['input_edit_address'];
            $price = $_POST['input_edit_price'];
            $id_city_fk = $_POST['input_edit_id_city_fk'];
            $tmp_images = $_FILES['imagesToUpload']['tmp_name'];

            if ((isset($name) && !empty($name)) &&
                (isset($address) && !empty($address)) &&
                (isset($price) && is_numeric($price)) &&
                (isset($id_city_fk) && is_numeric($id_city_fk))
            ) {
                //if ($this->alreadyLoaded($name, $address, $id_city_fk) === false) {

                    $this->model->updateFlat($id, $name, $address, $price, $id_city_fk);

                    if (!empty($tmp_images[0]))  //si hay alguna imagen
                        $this->controllerImage->insertImages($tmp_images, $id);
                    else
                        $this->view->showFlatLocation($id);
                /*} else {
                    //$this->viewUser->RenderError("Estos datos corresponden a un departamento en la base de datos. Intente nuevamente.");
                    $cities = $this->modelCity->getCities();
                    $errorMessaje = "Estos datos corresponden a un departamento en la base de datos. Intente nuevamente.";
                    $this->view->ShowError($cities, $errorMessaje, $logged);
                }*/
            } else
                $this->viewUser->RenderError("Debe completar todos los campos del formulario");
        } else
            $this->viewUser->RenderError("Debe ser administrador para acceder a esta sección.");
    }

    //filtro
    function filterFlatsByCity($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA ADMIN NO?
        $city_name = $params[':NAME'];
        if (isset($city_name)) {
            $flats = $this->model->getFlatsByCity($city_name);
            $cities = $this->modelCity->getCities();
        }
        if (empty($flats)) {
            $errorMessaje = "No hay departamentos en esta ciudad.";
            $this->view->ShowError($cities, $errorMessaje, $logged);
        } else {
            $this->view->ShowFlats($flats, $cities, $logged);
        }
    }

    //paginación

    function showFlats($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();

        $quantity_to_show = 3;

        if (isset($params[':PAGE']))
            $page = $params[':PAGE'];
        else
            $page = 1;

        $start_from_record = ($page - 1) * $quantity_to_show;
        $total_records = $this->model->getNumberFlats();
        $total_pages = ceil($total_records / $quantity_to_show);

        $flats = $this->model->getFlatsByLimit($start_from_record, $quantity_to_show);

        $cities = $this->modelCity->getCities();
        $this->view->ShowFlats($flats, $cities, $logged, $total_pages);
    }
    //paginacion con filtro sin funcionar
    /*function filterFlatsByCity($params = null, $page = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA ADMIN
        $city_name = $params[':NAME'];

        $quantity_to_show = 3;

        if (isset($params[':PAGE']))
            $page = $params[':PAGE'];
        else
            $page = 1;

            $start_from_record = ($page - 1) * $quantity_to_show;
            $total_records = $this->model->getNumberFlatsByCity($city_name);
            $total_pages = ceil($total_records / $quantity_to_show);
        
        if (isset($city_name)) {
            $flats = $this->model->getFlatsByCityLimit($start_from_record, $quantity_to_show, $city_name);
            $cities = $this->modelCity->getCities();
        }
        if (empty($flats)) {
            $errorMessaje = "No hay departamentos en esta ciudad.";
            $this->view->ShowError($cities, $errorMessaje, $logged);
        } else {
            $this->view->ShowFlats($flats, $cities, $logged, $total_pages);
        }
    }*/

}
