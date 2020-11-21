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

    //baja
    function deleteImage($params = null)
    {
        $logged = $this->authHelper->isLoggedIn();  //FALTA CHECKEAR QUE SEA SOLO ADMIN
        if ($logged) {
            $id = $params[':ID'];
              //busco la id_fk de la imagen
              $image = $this->model->getImage($id);

            $this->model->deleteImage($id);
            $this->viewFlat->showFlatEditLocation($image->id_departamento_fk);
        } else {
            $this->viewUser->RenderError("Logueate e intentá nuevamente");
        }
    }
}
