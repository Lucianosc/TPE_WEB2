<?php

require_once "./libs/smarty/Smarty.class.php";

class FlatView {

    private $title;
    
    function __construct(){
        $this->title = "Lista de Departamentos";
    }

    function ShowHome($flats){

        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('flats', $flats);

        $smarty->display('templates/flats.tpl');
    }

    function ShowFlats(){
        header("Location: ".BASE_URL."showFlats");
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}