<?php

require_once "./libs/smarty/Smarty.class.php";

class FlatView
{
    private $title;

    function __construct()
    {
        $this->title = "Lista de Departamentos";
    }

    function ShowHome($flats, $cities, $session)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('flats', $flats);
        $smarty->assign('cities', $cities);
        $smarty->assign('sessionActive', $session);

        $smarty->display('templates/flats.tpl');
    }

    //muestra los deptos por ciudad
    function ShowFlatsByCity($flats, $cities, $name_city, $session)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', $name_city);
        $smarty->assign('flats', $flats);
        $smarty->assign('cities', $cities);
        //$smarty->assign('name_city', $name_city);

        $smarty->assign('sessionActive', $session);

        $smarty->display('templates/flats.tpl');
    }

    //muestra -> modificacion
    function ShowEditFlat($flat, $cities)
    {
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('flat', $flat);
        $smarty->assign('cities', $cities);
        $smarty->display('templates/editFlat.tpl');
    }

    function ShowFlats()
    {
        header("Location: " . BASE_URL . "showFlats");
    }
}
