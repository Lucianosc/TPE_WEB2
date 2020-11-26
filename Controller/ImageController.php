<?php
require_once './Model/ImageModel.php';
require_once './View/FlatView.php';
require_once './helpers/AuthHelper.php';

class ImageController
{    
    private $model;
    private $viewFlat;
    private $authHelper;

    public function __construct()
    {
        $this->model = new ImageModel();
        $this->viewFlat = new FlatView();
        $this->authHelper = new AuthHelper();
    }

    //alta
    function insertImages($tmp_images, $id_flat){

        $types_images = $_FILES['imagesToUpload']['type'];

        if ($this->areType($types_images)){
            $name_images = $_FILES['imagesToUpload']['name'];
            $this->model->insertImages($tmp_images, $name_images, $id_flat);
            $this->viewFlat->showFlatLocation($id_flat);
        }
        //else {
        //HABRIA QUE MOSTRAR ESTE ERROR?
        //$this->view->renderError("Las imagenes tienen que ser JPG.", $titulo, $descripcion, $completada);
        // }
    }

    //ALTA -> Checkea si todas las imagenes para subir son del tipo correspondiente
    private function areType($typeImages)
    {
        foreach ($typeImages as $type) {
            if (!($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png'))
                return false;
        }
        return true;
    }

    //baja
    function deleteImage($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA SOLO ADMIN
        if ($logged) {
            $id = $params[':ID'];
              //busco la id_fk de la imagen
            $image = $this->model->getImage($id);

            $this->model->deleteImage($id);
            //$_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            //$this->viewFlat->showFlatURL($_SESSION['url']);
            $this->viewFlat->showFlatEditLocation($image->id_departamento_fk);  //---VER SI CON ESTA LINEA O 54 Y 55
        } else {
            $this->viewUser->RenderError("Logueate e intentá nuevamente");
        }
    }
}
