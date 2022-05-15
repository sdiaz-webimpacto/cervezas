<?php

class AddToCart
{
    function printAddToCart()
    {
        $html = '
        <div class="row addToCartButtons">
            <div class="col-xs-12 col-md-6">
                <button class="btn btn-primary btn-block btn-lg">Comprar Ahora</button>
            </div>
            <div class="col-xs-12 col-md-6">
            <button class="btn btn-default btn-block btn-lg backColor">Añadir a la cesta
            <i class="fa fa-shopping-cart"></i>
            </button>
            </div>
        </div>
        ';

        echo $html;
    }
}