<?php

require_once "controllers/Product.controller.php";
require_once "views/modules/sections/productLists/productsCarousel.php";

class RelationatedProductsController
{
    public static function relationatedProducts($id_product, $order, $method, $init, $limit, $className)
    {
        $productsGrid = ProductController::productsCarousel($id_product,$order, $method, $init, $limit, $className);
        if(count($productsGrid) >= 4)
        {
            $class = 'autoplay';
        } else {
            $class = 'noSlide';
        }

        $print = '
<div class="container-fluid">
<div class="container">
<div class="row">
<h4 class="titleCarouselBlock'.$className.'">También te puede interesar...</h4>
<div class="'.$class.'">';

        $bucle = ProductsCarousel::printCarousel($id_product,$order, $method, $init, $limit);
        $print .= $bucle;

        $print .= '
</div>
</div>
</div>
</div>';
        return $print;
    }
}