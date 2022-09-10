<?php

require_once "controllers/Template.controller.php";
require_once "controllers/Category.controller.php";
require_once "controllers/Slide.controller.php";
require_once "controllers/Product.controller.php";
require_once "controllers/Customer.controller.php";
require_once "controllers/Orders.controller.php";
require_once "controllers/Cart.controller.php";
require_once "controllers/Guest.controller.php";
require_once "controllers/Stock.controller.php";
require_once "controllers/Address.controller.php";
require_once "controllers/Carrier.controller.php";

require_once "models/Template.model.php";
require_once "models/Category.model.php";
require_once "models/Slide.model.php";
require_once "models/Product.model.php";
require_once "models/Customer.model.php";
require_once "models/Orders.model.php";
require_once "models/Cart.model.php";
require_once "models/Guest.model.php";
require_once "models/Stock.model.php";
require_once "models/Address.model.php";
require_once "models/Carrier.model.php";

require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require_once "vendor/autoload.php";
require_once "models/Path.php";
require_once "tools/NavigationTools.php";
require_once "tools/CustomerTools.php";
require_once "ajax/customer.ajax.php";

$plantilla = new TemplateController();
$plantilla->template();