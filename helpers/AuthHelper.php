<?php

require_once './View/CityView.php';

class AuthHelper{


    private $viewCity;

    public function __construct()
    {
        $this->viewCity = new CityView();
    }

    //verifica si hay una sesión activa
    function isLoggedIn()
    {            
        if (!isset($_SESSION)) {
            session_start();   
        }
        if (isset($_SESSION['USER'])) {
            return $_SESSION;
        } else {
            return false;
        }
    }

    // chequear nivel de acceso admin/user y llamar al isLoggedIn


    //destruye la sesión y redirige a ShowCities
    function logout()
    {
        session_start();
        session_destroy();

    $this->viewCity->ShowCitiesLocation();
    }

    //iniciar sesion
}