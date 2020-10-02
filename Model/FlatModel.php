<?php

class FlatModel {

    private $db;

    function __construct(){
        //el constructor se ejecuta siempre, abre la conexion en este caso
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_airbnb;charset=utf8', 'root', '');
    }

    
}