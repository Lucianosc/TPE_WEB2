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
    // function RenderFormEdit($id){
    //     $smarty = new Smarty();
    //     $smarty->assign('titulo', $this->title);
    //     $smarty->assign('id', $id);
    //     $smarty->display('templates/editCity.tpl');
    // }
    function ShowEditCity($city){
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('city', $city);
        $smarty->display('templates/editCity.tpl');
    }

    function ShowCities(){
        header("Location: ".BASE_URL."showCities");
    }
   
}


