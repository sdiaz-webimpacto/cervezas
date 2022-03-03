<?php

class TemplateController
{
    public function template()
    {
        include "views/template.php";
    }

    public function TemplateStyleController()
    {
        $tableTpl = "plantilla";
        $tableScl = "social_net";
        $respuestaTpl = TemplateModel::mdlTemplate($tableTpl);
        $respuestaScl = TemplateModel::mdlTemplate($tableScl);
        return array($respuestaTpl,$respuestaScl);
    }
}