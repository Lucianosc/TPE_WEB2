<?php

require_once "./libs/smarty/Smarty.class.php";

class CityView {

    private $title;
    
    function __construct(){
        $this->title = "Ciudades";
    }

    function ShowHome($cities, $sessionUser){

        $smarty = new Smarty();
        $smarty->assign('title', $this->title);//revisar, no se utiliza
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/cities.tpl');
    }
    
    function ShowEditCity($city, $sessionUser){
        $smarty = new Smarty();
        $smarty->assign('title', $this->title);//revisar, no se utiliza
        $smarty->assign('city', $city);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/editCity.tpl');
    }

    function ShowError($errorMessaje, $sessionUser, $cities = null){
        $smarty = new smarty();
        $smarty->assign('errorMessaje', $errorMessaje);
        $smarty->assign('sessionUser', $sessionUser);
        $smarty->assign('id_flat', false);
        $smarty->assign('cities', $cities);

        $smarty->display('templates/cities.tpl');
    }

    function ShowCitiesLocation(){
        header("Location: ".BASE_URL."showCities");
    }
   
}


