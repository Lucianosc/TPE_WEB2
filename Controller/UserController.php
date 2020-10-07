<?php

require_once './View/UserView.php';
require_once './Model/UserModel.php';


class UserController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();

    }

    function showLogin(){
    
        $this->view->ShowLogin();

    }

    function logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);

    }

    function verifyUser(){
        $user = $_POST["input_user"];
        $pass = $_POST["input_pass"];

        if(isset($user)){
            $userFromDB = $this->model->GetUser($user);

            if(isset($userFromDB) && $userFromDB){// Existe el usuario

                if (password_verify($pass, $userFromDB->clave)){ //Contraseña correcta
                    session_start();
                    $_SESSION["EMAIL"] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time(2000000);

                    $this->view->ShowHome();//*******REVISAR***** MODIFICAR EN UserView
                }
                else
                    $this->view->ShowLogin("Contraseña incorrecta");
            }
            else
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
        }
    }

}


?>
