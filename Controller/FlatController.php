<?php

require_once './View/FlatView.php';
require_once './Model/FlatModel.php';

class FlatController {

    private $model;
    private $view;

    public function __construct(){
        $this->view = new FlatView;
        $this->model = new FlatModel;
    }

}