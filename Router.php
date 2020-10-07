<?php
    require_once './RouterClass.php';//Route o router
    require_once './Controller/FlatController.php';
    require_once './Controller/CityController.php';
    require_once './Controller/UserController.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

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

    $r->addRoute("login", "GET", "UserController", "showLogin");
    $r->addRoute("verifyUser", "POST", "UserController", "verifyUser");
    $r->addRoute("logout", "GET", "UserController", "logout");


   // $r->addRoute("editFlat/:ID", "GET", "FlatController", "editFlat");

    //******************* RUN ***************************
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
