<?php
    require_once './RouterClass.php';//Route o router
    require_once './Controller/FlatController.php';
    require_once './Controller/CityController.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // ******************* RUTAS ***************************
   // $r->addRoute("home", "GET", "FlatController", "Home");
   // $r->addRoute("city/:ID", "GET", "FlatController", "showMoviesByGenre");
    //$r->addRoute("insertFlat", "POST", "FlatController", "InsertFlat");

    //default
    $r->setDefaultRoute("CityController", "showCities");
    
    $r->addRoute("showCities", "POST", "CityController", "showCities");
    $r->addRoute("showFlats", "POST", "FlatController", "showFlats");

    $r->addRoute("showCities", "GET", "CityController", "showCities");
    $r->addRoute("showFlats", "GET", "FlatController", "showFlats");

    $r->addRoute("delete/:ID", "GET", "CityController", "deleteCity");
    $r->addRoute("delete/:ID", "GET", "FlatController", "deleteFlat");

    $r->addRoute("edit/:ID", "GET", "CityController", "editCity");
    $r->addRoute("edit/:ID", "GET", "FlatController", "editFlat");

    $r->addRoute("insertCity", "POST", "CityController", "insertCity");
    $r->addRoute("insertFlat", "POST", "FlatController", "insertFlat");
    //******************* RUN ***************************
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
