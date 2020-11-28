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

    function checkLoggedSession() {
        if ($this->isLoggedIn()) {
            if($_SESSION['ROLE'] == 0){
                return 0;
            }
            else
            return 1;
        }
        else 2;

    }

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