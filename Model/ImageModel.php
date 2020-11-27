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
        $query = $this->db->prepare('SELECT imagen.* FROM imagen WHERE id_imagen=?');
        $query->execute(array($id_image));
        return  $query->fetch(PDO::FETCH_OBJ);
    }

    //Alta
    function insertImages($tmp_images, $name_images, $id_flat)
    {
        $paths = $this->uploadImages($tmp_images, $name_images);
        $images_query = $this->db->prepare('INSERT INTO imagen(id_departamento_fk, ruta) VALUES(?,?)');
        foreach ($paths as $path) {
            $images_query->execute([$id_flat, $path]);
        }
    }

    //ALTA->carga las imágenes de un departamento
    private function uploadImages($tmp_images, $name_images)
    {
        $paths = [];

        for($i = 0; $i < count($tmp_images); $i++){
            $tmp_image = $tmp_images[$i];
            $name_image = $name_images[$i];
            $final_path = 'images/temp/' . uniqid() . "." 
            . strtolower(pathinfo($name_image, PATHINFO_EXTENSION));
            move_uploaded_file($tmp_image, $final_path);
            $paths[] = $final_path;
        }
        /*foreach ($images as $image) {
            $final_path = 'images/' . uniqid() . '.jpg';
            //$final_path = 'images/' . uniqid() . $image['type'];
            //$final_path = 'images/' . uniqid();
            move_uploaded_file($image, $final_path);
            $paths[] = $final_path;
        }*/
        return $paths;
    }

    //Baja
    function deleteImage($id)
    {
        $query = $this->db->prepare('DELETE FROM imagen WHERE id_imagen=?');
        $query->execute(array($id));
    }
}
