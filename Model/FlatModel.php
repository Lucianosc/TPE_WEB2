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
    function insertFlat($name, $address, $price, $id_city_fk, $tmp_images = null)
    {  //---VER SI NULL
        $query = $this->db->prepare('INSERT INTO departamento(nombre, direccion, precio, id_ciudad_fk) VALUES(?,?,?,?)');
        $query->execute(array($name, $address, $price, $id_city_fk));
        //Carga de imágenes ---> va acá o en imagesModel? RompeMVC?
        if($tmp_images !== null){
            $last_id = $this->db->lastInsertId();
            $paths = $this->uploadImages($tmp_images);
            $images_query = $this->db->prepare('INSERT INTO imagen(id_departamento_fk, ruta) VALUES(?,?)');
            foreach ($paths as $path) {
                $images_query->execute([$last_id, $path]);
            }
        }
    }
    //ALTA->carga las imágenes de un departamento
    private function uploadImages($images)
    {
        $paths = [];
        foreach ($images as $image) {
            $final_path = 'images/' . uniqid() . '.jpg';
            //$final_path = 'images/' . uniqid() . $image['type'];
            //$final_path = 'images/' . uniqid();
            move_uploaded_file($image, $final_path);
            $paths[] = $final_path;
        }
        return $paths;
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
        $query = $this->db->prepare("UPDATE departamento SET nombre=?, direccion=?, precio=?, id_ciudad_fk=? 
        WHERE id_departamento=?");
        $query->execute(array($name, $address, $price, $id_city_fk, $id));
    }
}
