<?php

require_once "./libs/smarty/Smarty.class.php";

class CityView {

    private $title;
    
    function __construct(){
        $this->title = "Lista de Ciudades";
    }

    function ShowHome($cities){

        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('ciudades', $cities);

        $smarty->display('templates/cities.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }


}


