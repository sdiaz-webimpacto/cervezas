<?php

require_once "controllers/Template.controller.php";
require_once "controllers/Category.controller.php";
require_once "controllers/Slide.controller.php";
require_once "controllers/Product.controller.php";
require_once "controllers/Customer.controller.php";

require_once "models/Template.model.php";
require_once "models/Category.model.php";
require_once "models/Slide.model.php";
require_once "models/Product.model.php";
require_once "models/Customer.model.php";

require_once "models/Path.php";

$plantilla = new TemplateController();
$plantilla->template();