<?php

require_once "./libs/smarty/Smarty.class.php";

class CityView {


    
    function __construct(){
    }

    function ShowHome($cities, $sessionUser){

        $smarty = new Smarty();
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/cities.tpl');
    }
    
    function ShowEditCity($city, $sessionUser){
        $smarty = new Smarty();
        $smarty->assign('city', $city);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/editCity.tpl');
    }

    function ShowError($errorMessaje, $sessionUser){
        $smarty = new smarty();
        $smarty->assign('errorMessaje', $errorMessaje);
        $smarty->assign('sessionUser', $sessionUser);
       
        $smarty->display('templates/cities.tpl');
    }

    function ShowCitiesLocation(){
        header("Location: ".BASE_URL."showCities");
    }
   
}


