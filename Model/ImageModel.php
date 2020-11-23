<?php

class ImageModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_airbnb;charset=utf8', 'root', '');
    }

    //Obtiene las imágenes de un departamento en particular
    function getImagesByFlat($id_flat)
    {
        $query = $this->db->prepare('SELECT imagen.* 
                                    FROM imagen INNER JOIN departamento ON
                                    imagen.id_departamento_fk = departamento.id_departamento
                                    WHERE id_departamento=?');
        $query->execute(array($id_flat));
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    function getImage($id_image)
    {
        $query = $this->db->prepare('SELECT imagen.* 
                                    FROM imagen WHERE id_imagen=?');
        $query->execute(array($id_image));
        return  $query->fetch(PDO::FETCH_OBJ);
    }
    //Alta

    //Baja
    function deleteImage($id)
    {
        $query = $this->db->prepare('DELETE FROM imagen WHERE id_imagen=?');
        $query->execute(array($id));
    }
    //Modificacion

}