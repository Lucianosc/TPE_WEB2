<?php
    require_once './RouterClass.php';//Route o router
    require_once './Controller/FlatController.php';
    require_once './Controller/CityController.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // ******************* RUTAS ***************************

    //default
    $r->setDefaultRoute("CityController", "showCities");
    
    $r->addRoute("showCities", "POST", "CityController", "showCities");
    $r->addRoute("showFlats", "POST", "FlatController", "showFlats");

    $r->addRoute("showCities", "GET", "CityController", "showCities");
    $r->addRoute("showFlats", "GET", "FlatController", "showFlats");

    $r->addRoute("deleteCity/:ID", "GET", "CityController", "deleteCity");
    $r->addRoute("deleteFlat/:ID", "GET", "FlatController", "deleteFlat");

    $r->addRoute("editCity/:ID", "GET", "CityController", "editCity");
    $r->addRoute("updateCity/:ID", "GET", "CityController", "updateCity");

    $r->addRoute("editFlat/:ID", "GET", "FlatController", "editFlat");
    $r->addRoute("editFlat/updateFlat/:ID", "POST", "FlatController", "updateFlat");

    $r->addRoute("insertCity", "POST", "CityController", "insertCity");
    $r->addRoute("insertFlat", "POST", "FlatController", "insertFlat");
    //******************* RUN ***************************
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
