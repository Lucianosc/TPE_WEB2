<?php

require_once "./libs/smarty/Smarty.class.php";

class UserView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowLogin($message = "")
    {
        $this->smarty->assign('title', "Login");
        $this->smarty->assign('message', $message);

        $this->smarty->display('templates/login.tpl');
    }

    function RenderError($message)
    {
        $this->smarty->assign('title', "Error");
        $this->smarty->assign('message', $message);

        $this->smarty->display('templates/error.tpl');
    }
    
}
