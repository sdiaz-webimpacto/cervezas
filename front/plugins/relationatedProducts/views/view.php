<?php
require_once "plugins/relationatedProducts/controllers/RelationatedProductsController.php";
$coments = RelationatedProductsController::relationatedProducts($product['id'], 'id', 'DESC', 0, 10, 'Relationated');

echo $coments
?>
