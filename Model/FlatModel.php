<?php

class FlatModel {

    private $db;

    function __construct(){
        //el constructor se ejecuta siempre, abre la conexion en este caso
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_airbnb;charset=utf8', 'root', '');
    }
    
    //Listado de categorías: Se debe poder visualizar todas las categorías
    function getFlats() {
        $query = $this->db->prepare('SELECT * FROM departamento');
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    //alta
    function insertFlat($name, $address, $price, $id_city_fk) {
        $query = $this->db->prepare('INSERT INTO departamento(nombre, direccion, precio, id_ciudad_fk) VALUES(?,?,?,?)');
        $query->execute(array($name, $address, $price, $id_city_fk));
    }
    //baja
    function deleteFlat($id) {
        $query = $this->db->prepare('DELETE FROM departamento WHERE id=?');
        $query->execute(array($id));
    }
    //modificación
    function updateFlat($name, $id) {
        $query = $this->db->prepare('UPDATE departamento SET nombre=? WHERE id=?');
        $query->execute(array($name, $id));
    }
    
}