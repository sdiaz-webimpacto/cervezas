<?php

require_once "../controllers/Product.controller.php";
require_once "../models/Product.model.php";
require_once "../models/Path.php";

class AjaxFind
{
    public function ajaxForFind()
    {
        $path = Path::getPath();
        $pathBack = Path::getPathBack();
        $response = ProductController::getFindProduct($_POST['value']);
        $response[0]['url_back'] = $pathBack;
        $response[0]['url_front'] = $path;

        echo json_encode($response);
    }
}

$object = new AjaxFind();
$object->ajaxForFind();
