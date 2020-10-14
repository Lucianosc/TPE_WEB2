<?php

require_once "./libs/smarty/Smarty.class.php";

class FlatView
{


    function __construct()
    {

    }

    function ShowFlats($flats, $cities, $sessionUser, $id_flat = null)
    {
        $smarty = new Smarty();

        $smarty->assign('flats', $flats);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);
        $smarty->assign('id_flat', $id_flat);
    
        $smarty->display('templates/flats.tpl');
    }

    function ShowError($cities, $name_city, $errorMessaje, $sessionUser, $id_flat = null){
        $smarty = new smarty();
        $smarty->assign('errorMessaje', $errorMessaje);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);
        $smarty->assign('id_flat', $id_flat);

        $smarty->display('templates/flats.tpl');
    }
    //muestra los deptos por ciudad
    function ShowFlatsByCity($flats, $cities, $name_city, $sessionUser, $id_flat = null)
    {
        $smarty = new Smarty();
        $smarty->assign('title', $name_city);
        $smarty->assign('flats', $flats);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);
        $smarty->assign('id_flat', $id_flat); 

        $smarty->display('templates/flats.tpl');
    }

    //muestra -> modificacion
    function ShowEditFlat($flat, $cities, $sessionUser)
    {
        $smarty = new Smarty();
        $smarty->assign('flat', $flat);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/editFlat.tpl');
    }

    function ShowFlatsLocation()
    {
        header("Location: " . BASE_URL . "showFlats");
    }
}
