<?php

require_once "controllers/Template.controller.php";
require_once "controllers/Category.controller.php";

require_once "models/Template.model.php";
require_once "models/Category.model.php";
require_once "models/Path.php";

$plantilla = new TemplateController();
$plantilla->template();