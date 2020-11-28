<?php

class FlatModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_airbnb;charset=utf8', 'root', '');
    }

    //Listado de departamentos, con sus campos y la ciudad a la que pertenece
    function getFlats()
    {
        $query = $this->db->prepare('SELECT departamento.*, ciudad.nombre as nombre_ciudad
                                     FROM departamento INNER JOIN ciudad
                                     ON departamento.id_ciudad_fk = ciudad.id_ciudad');
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    //Obtiene los datos de un departamento en particular
    function getFlatById($id_flat)
    {
        $query = $this->db->prepare('SELECT departamento.*, ciudad.nombre as nombre_ciudad
                                     FROM departamento INNER JOIN ciudad ON
                                     departamento.id_ciudad_fk = ciudad.id_ciudad
                                     WHERE id_departamento=?');
        $query->execute(array($id_flat));
        return  $query->fetch(PDO::FETCH_OBJ);
    }

    //Obtiene los departamentos pertenecientes a una determinada ciudad
    function getFlatsByCity($name_city)
    {
        $query = $this->db->prepare('SELECT departamento.*, ciudad.nombre as nombre_ciudad 
                                    FROM departamento INNER JOIN ciudad ON
                                    departamento.id_ciudad_fk = ciudad.id_ciudad
                                    WHERE ciudad.nombre=?');
        $query->execute(array($name_city));
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    //alta
    function insertFlat($name, $address, $price, $id_city_fk)
    {
        $query = $this->db->prepare('INSERT INTO departamento(nombre, direccion, precio, id_ciudad_fk) 
                                    VALUES(?,?,?,?)');
        $query->execute(array($name, $address, $price, $id_city_fk));
        return $this->db->lastInsertId();
    }
    
    //baja
    function deleteFlat($id)
    {
        $query = $this->db->prepare('DELETE FROM departamento WHERE id_departamento=?');
        $query->execute(array($id));
    }
    //modificación
    function updateFlat($id, $name, $address, $price, $id_city_fk)
    {
        $query = $this->db->prepare("UPDATE departamento 
                                    SET nombre=?, direccion=?, precio=?, id_ciudad_fk=? 
                                    WHERE id_departamento=?");
        $query->execute(array($name, $address, $price, $id_city_fk, $id));
    }

    //paginación

    function getFlatsByLimit($start_from_record, $quantity_to_show){
        $query = $this->db->prepare("SELECT departamento.*, ciudad.nombre as nombre_ciudad
                                    FROM departamento INNER JOIN ciudad ON
                                    departamento.id_ciudad_fk = ciudad.id_ciudad 
                                    LIMIT $start_from_record, $quantity_to_show");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCountFlats()
    {
        $query = $this->db->prepare('SELECT COUNT(*) FROM departamento');
        $query->execute();
        return  $query->fetch(PDO::FETCH_OBJ);
    }

    function getNumberFlats()
    {
        $query = $this->db->prepare('SELECT departamento.* FROM departamento');
        $query->execute();
        return  $query->rowCount();
    }
}
