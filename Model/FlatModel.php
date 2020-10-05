<?php

class FlatModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_airbnb;charset=utf8', 'root', '');
    }
    
    //Listado de departamentos, con sus caracteristicas y la ciudad a la que pertenece
    function getFlats() {
        $query = $this->db->prepare('SELECT departamento.*, ciudad.nombre as nombre_ciudad
                                     FROM departamento INNER JOIN ciudad
                                     ON departamento.id_ciudad_fk = ciudad.id_ciudad');
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    //Obtiene los datos de un departamento en particular
    function GetFlatById($id_flat){
        $query = $this->db->prepare('SELECT * FROM departamento WHERE id_departamento=?');
        $query->execute(array($id_flat));
        return  $query->fetch(PDO::FETCH_OBJ);
    }
    //Obtiene los departamentos pertenecientes a una determinada ciudad
    function GetFlatsByCity($id_city){
        $query = $this->db->prepare('SELECT * FROM departamento WHERE id_ciudad_fk=?');
        $query->execute(array($id_city));
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    //alta
    function insertFlat($name, $address, $price, $id_city_fk) {
        $query = $this->db->prepare('INSERT INTO departamento(nombre, direccion, precio, id_ciudad_fk) VALUES(?,?,?,?)');
        $query->execute(array($name, $address, $price, $id_city_fk));
    }
    //baja
    function deleteFlat($id) {
        $query = $this->db->prepare('DELETE FROM departamento WHERE id_departamento=?');
        $query->execute(array($id));
    }
    //modificación //------IMPLEMENTAR
    function updateFlat($id, $name, $address, $price, $id_city_fk) {
        $query = $this->db->prepare('UPDATE departamento SET nombre=? direccion=? precio=? id_ciudad_fk=? WHERE id_departamento=?');
        $query->execute(array($name, $address, $price, $id_city_fk, $id));
    }
    
}