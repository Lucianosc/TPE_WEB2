<?php

require_once "./libs/smarty/Smarty.class.php";

class CityView {

    private $title;
    private $smarty;
    
    function __construct(){
        $this->title = "Ciudades";
        $this->smarty = new Smarty();
    }

    function ShowHome($cities, $sessionUser){

        $this->smarty->assign('title', $this->title);//revisar, no se utiliza
        $this->smarty->assign('cities', $cities);
        $this->smarty->assign('sessionUser', $sessionUser);

        $this->smarty->display('templates/cities.tpl');
    }
    
    function ShowEditCity($city, $sessionUser){
        $this->smarty->assign('title', $this->title);//revisar, no se utiliza
        $this->smarty->assign('city', $city);
        $this->smarty->assign('sessionUser', $sessionUser);

        $this->smarty->display('templates/editCity.tpl');
    }

    function ShowError($errorMessaje, $sessionUser){
        $this->smarty->assign('errorMessaje', $errorMessaje);
        $this->smarty->assign('sessionUser', $sessionUser);
       
        $this->smarty->display('templates/cities.tpl');
    }

    function ShowCitiesLocation(){
        header("Location: ".BASE_URL."showCities");
    }
   
}


