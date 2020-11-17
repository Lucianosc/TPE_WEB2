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

    //muestra login     //-------DEBERIA IR EN EL AuthHelper?
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
                    $_SESSION['ID'] = $userFromDB->id_usuario;
                    $_SESSION['ROLE'] = $userFromDB->rol;
                    $this->viewCity->ShowCitiesLocation();
                } else
                    $this->view->ShowLogin("Contraseña incorrecta");
            } else
                $this->view->ShowLogin("El usuario no existe");
        }
    }

    //---------------------------------------NUEVO

    //muestra sign Up
    function showSignUp()
    {
        $this->view->showSignUp();
    }
    //alta
    function insertUser()
    {
        $user = $_POST['input_user'];
        $password = $_POST['input_pass'];
        $role = 1;
        if (isset($user) && !empty($user) && isset($password) && !empty($password)) {
            if ($this->alreadyLoaded($user) === false) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $this->model->createUser($user, $password_hash, $role);
                $this->verifyUser();
            } else $this->view->ShowSignUp("El usuario ya existe");
        } else
            $this->view->ShowSignUp("Complete todos los campos");
    }
    
    //ALTA -> Checkea si existe el mail en la db
    function alreadyLoaded($email)
    {
        $users = $this->model->getUsers();
        foreach ($users as $user) {
            if ($user->email === $email) {
                return true;
            }
        }
        return false;
    }
}
