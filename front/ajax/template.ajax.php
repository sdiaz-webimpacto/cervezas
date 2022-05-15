<?php

require_once "../controllers/Template.controller.php";
require_once "../models/Template.model.php";

class AjaxTemplate
{
    public function ajaxStyleTemplate()
    {
        $response = TemplateController::TemplateStyleController();

        echo json_encode($response);
    }
}

$object = new AjaxTemplate();
$object->ajaxStyleTemplate();
