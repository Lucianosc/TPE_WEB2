<?php

require_once "./libs/smarty/Smarty.class.php";

class CityView {

    private $title;
    
    function __construct(){
        $this->title = "Lista de Ciudades";
    }

    function ShowHome($cities, $sessionUser){

        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('ciudades', $cities);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/cities.tpl');
    }
    
    function ShowEditCity($city, $sessionUser){
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('city', $city);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/editCity.tpl');
    }

    function ShowCities(){
        header("Location: ".BASE_URL."showCities");
    }
   
}


