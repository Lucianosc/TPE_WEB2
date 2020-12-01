<?php

class AuthHelper{

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    //verifica si hay una sesión activa
    function isLoggedIn()
    {            
        if (isset($_SESSION['USER'])) {
            return $_SESSION;
        } else {
            return false;
        }
    }

    // asigna los datos de la session
    function login($user) {
        $_SESSION['ID'] = $user->id_usuario;
        $_SESSION['USER'] = $user->email;
        $_SESSION['ROLE'] = $user->rol;
    }

    //destruye la sesión y redirige a ShowCities
    function logout()
    {
        session_destroy();
        header("Location: ".BASE_URL."showCities");
    }

}