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
   
    $r->addRoute("showCities", "GET", "CityController", "showCities");
    $r->addRoute("showFlats", "GET", "FlatController", "showFlats");

    $r->addRoute("deleteCity/:ID", "GET", "CityController", "deleteCity");
    $r->addRoute("deleteFlat/:ID", "GET", "FlatController", "deleteFlat");

    $r->addRoute("editCity", "POST", "CityController", "updateCity");
    $r->addRoute("editFlat", "POST", "FlatController", "updateFlat");

    $r->addRoute("editCity/:ID", "GET", "CityController", "editCity");
    $r->addRoute("editFlat/:ID", "GET", "FlatController", "editFlat");

    $r->addRoute("insertCity", "POST", "CityController", "insertCity");
    $r->addRoute("insertFlat", "POST", "FlatController", "insertFlat");

    $r->addRoute("city/:NAME", "GET", "FlatController", "filterFlatsByCity");
   // $r->addRoute("editFlat/:ID", "GET", "FlatController", "editFlat");

    //******************* RUN ***************************
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
