<?php

require_once "./libs/smarty/Smarty.class.php";

class FlatView
{
    private $title;

    function __construct()
    {
        $this->title = "Departamentos";
    }

    function ShowHome($flats, $cities, $sessionUser, $id_flat = null)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('flats', $flats);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);
        
        if($id_flat === null){
            $id_flat = false;
        }
        $smarty->assign('id_flat', $id_flat);
    
        $smarty->display('templates/flats.tpl');
    }

    function ShowError($name_city, $errorMessaje, $sessionUser, $cities){
        $smarty = new smarty();
        $smarty->assign('errorMessaje', $errorMessaje);
        $smarty->assign('titulo', $name_city);
        $smarty->assign('sessionUser', $sessionUser);
        $smarty->assign('id_flat', false);
        $smarty->assign('cities', $cities);

        $smarty->display('templates/flats.tpl');
    }
    //muestra los deptos por ciudad
    function ShowFlatsByCity($flats, $cities, $name_city, $sessionUser)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', $name_city);
        $smarty->assign('flats', $flats);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);
        $smarty->assign('id_flat', false); 

        $smarty->display('templates/flats.tpl');
    }

    //muestra -> modificacion
    function ShowEditFlat($flat, $cities, $sessionUser)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('flat', $flat);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionUser', $sessionUser);

        $smarty->display('templates/editFlat.tpl');
    }

    function ShowFlats()
    {
        header("Location: " . BASE_URL . "showFlats");
    }
}
