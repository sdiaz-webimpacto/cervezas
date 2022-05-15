<?php

require_once "models/Path.php";

class ProductsCarousel
{
    public static function printCarousel($id_product, $order, $method, $init, $limit)
    {
        $pathBack = Path::getPathBack();
        $productsGrid = ProductController::productsCarousel($id_product,$order, $method, $init, $limit);
        if(count($productsGrid) >= 4)
        {
            $class = 'autoplay';
        } else {
            $class = 'noSlide';
        }

        $print = '';
        foreach($productsGrid as $pr) {
            $print .=  '
    <div class="col-md-3 col-sm-6 col-xs-12">
        <figure>
            <a href="'.$pr['url'].'" class="pixelProduct">
                <img src="' . $pathBack . $pr['cover'] . '" class="img-responsive">
            </a>
        </figure>
        <h4>
            <small>
                <a href="'.$pr['url'].'" class="pixelProduct">
                    ' . $pr['title'];
            $print .= '<div class="col-12">';
            if($pr['new'] == 1){
                $print .= '<span class="label label-warning fontSize">Nuevo</span>';
            } else {
                $print .= '<span style="opacity:0">-</span>';
            }

            if($pr['offer_discount'] > 0){
                $print .= '<span class="label label-warning fontSize">'.$pr['offer_discount'].'%</span>';
            } else {
                $print .= '<span style="opacity:0">-</span>';
            }

            $print .= '</div></a>
            </small>
        </h4>
        <div class="col-xs-6 price">
            <h2>';
            if($pr['offer_price'] != 0)
            {
                $print .= '<small><strong class="oferta">'.$pr['price'].'</strong></small>
                <small>'.$pr['offer_price'].'</small>';
            } else {
                $print .= '<small > ';
                if ($pr['price'] <= 0) {
                    $print .= "GRATIS";
                } else {
                    $print .= $pr['price'] . "€";
                }
                $print .= ' </small >';
            }
            $print .= '</h2>
        </div>
        <div class="col-xs-6 links">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-xs whishList" idProducto="' . $pr['id'] . '" data-toggle="tooltip" title="Agregar a mi lista de deseos">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </button>
                <a href="'.$pr['url'].'" class="pixelProduct">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>';
        }
        return $print;
    }
}
