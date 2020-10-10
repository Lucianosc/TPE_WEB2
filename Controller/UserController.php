<?php

require_once './View/UserView.php';
require_once './Model/UserModel.php';


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

    //LLEVA AL LOGGIN
    function showLogin()
    {
        $this->view->ShowLogin();
    }

    //VERIFICA SI LOS DATOS INGRESADOS EN EL LOGIN CORRESPONDE A ALGUN REGISTRO DE LA DB
    function verifyUser()
    {
        $user = $_POST["input_user"];
        $pass = $_POST["input_pass"];

        if (isset($user)) {
            $userFromDB = $this->model->GetUser($user);

            if (isset($userFromDB) && $userFromDB) { // Existe el usuario

                if (password_verify($pass, $userFromDB->clave)) { //Contraseña correcta
                    session_start();
                    $_SESSION['USER'] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();

                    $this->view->ShowHome(); //*******REVISAR***** MODIFICAR EN UserView
                } else
                    $this->view->ShowLogin("Contraseña incorrecta");
            } else
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
        }
    }

    //CHECKEA SI ESTÁ ABIERTA LA SESIÓN -> ESTÁ ACTIVO, LOGUEADO
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

    //DESTRUYE LA SESIÓN Y REDIRIGE AL LOGIN
    function logout()
    {
        session_start();
        session_destroy();
       // header("Location: ".LOGIN); //CAMBIAR A SHOW
       $this->viewCity->ShowCities();
    }
}
