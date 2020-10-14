<?php

require_once "./libs/smarty/Smarty.class.php";

class FlatView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowFlats($flats, $cities, $sessionUser, $id_flat = null)
    {
        $this->smarty->assign('flats', $flats);
        $this->smarty->assign('cities', $cities);
        $this->smarty->assign('sessionUser', $sessionUser);
        $this->smarty->assign('id_flat', $id_flat);
    
        $this->smarty->display('templates/flats.tpl');
    }

    function ShowError($cities, $errorMessaje, $sessionUser, $id_flat = null){
        $this->smarty->assign('errorMessaje', $errorMessaje);
        $this->smarty->assign('cities', $cities);
        $this->smarty->assign('sessionUser', $sessionUser);
        $this->smarty->assign('id_flat', $id_flat);

        $this->smarty->display('templates/flats.tpl');
    }
    //muestra los deptos por ciudad
    function ShowFlatsByCity($flats, $cities, $name_city, $sessionUser, $id_flat = null)
    {
        $this->smarty->assign('title', $name_city);
        $this->smarty->assign('flats', $flats);
        $this->smarty->assign('cities', $cities);
        $this->smarty->assign('sessionUser', $sessionUser);
        $this->smarty->assign('id_flat', $id_flat); 

        $this->smarty->display('templates/flats.tpl');
    }

    //muestra -> modificacion
    function ShowEditFlat($flat, $cities, $sessionUser)
    {

        $this->smarty->assign('flat', $flat);
        $this->smarty->assign('cities', $cities);
        $this->smarty->assign('sessionUser', $sessionUser);

        $this->smarty->display('templates/editFlat.tpl');
    }

    function ShowFlatsLocation()
    {
        header("Location: " . BASE_URL . "showFlats");
    }
}
