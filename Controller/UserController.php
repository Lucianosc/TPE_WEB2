<?php

require_once './View/UserView.php';
require_once './Model/UserModel.php';
require_once './View/CityView.php';


class UserController
{

    private $view;
    private $viewCity;
    private $model;

    function __construct()
    {
        $this->view = new UserView();
        $this->viewCity = new CityView();
        $this->model = new UserModel();
    }

    //muestra login
    function showLogin()
    {
        $this->view->ShowLogin();
    }

    //verifica si los datos ingresados corresponde a un usuario de la db
    function verifyUser()
    {
        $user = $_POST["input_user"];
        $pass = $_POST["input_pass"];

        if (isset($user)) {
            $userFromDB = $this->model->getUser($user);

            if (isset($userFromDB) && $userFromDB) {

                if (password_verify($pass, $userFromDB->clave)) {
                    session_start();
                    $_SESSION['USER'] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();

                    $this->view->ShowHome();
                } else
                    $this->view->ShowLogin("Contraseña incorrecta");
            } else
                $this->view->ShowLogin("El usuario no existe");
        }
    }

    //verifica si hay una sesión activa
    function isLoggedIn()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER'];
        } else {
            return false;
        }
    }

    //destriye la sesión y redirige a ShowCities
    function logout()
    {
        session_start();
        session_destroy();
       $this->viewCity->ShowCitiesLocation();
    }
}
