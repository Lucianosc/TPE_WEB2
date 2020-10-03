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
    $r->setDefaultRoute("CityController", "Home");
    $r->addRoute("insertCity", "POST", "CityController", "InsertCity");
    $r->addRoute("insertFlat", "POST", "FlatController", "InsertFlat");
    //******************* RUN ***************************
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
