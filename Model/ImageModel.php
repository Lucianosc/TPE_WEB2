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
    function insertImages($tmp_images, $types_images, $id_flat)
    {
        $paths = $this->uploadImages($tmp_images, $types_images);
        $images_query = $this->db->prepare('INSERT INTO imagen(id_departamento_fk, ruta) VALUES(?,?)');
        foreach ($paths as $path) {
            $images_query->execute([$id_flat, $path]);
        }
    }

    //ALTA->carga las imágenes de un departamento
    private function uploadImages($images, $types_images)
    {
        $paths = [];

        for($i = 0; $i < count($images); $i++){
            $image = $images[$i];
            $type_image = $types_images[$i];
            $final_path = 'images/temp/' . uniqid() . "." 
            . strtolower(pathinfo($type_image, PATHINFO_EXTENSION));
            move_uploaded_file($image, $final_path);
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
