<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_airbnb;charset=utf8', 'root', '');
    }

    function getUser($user){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email=?');
        $query->execute(array($user));
        return $query->fetch(PDO::FETCH_OBJ);
    }

}