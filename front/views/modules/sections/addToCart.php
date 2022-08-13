<?php

class AddToCart
{
    function printAddToCart($id_product, $id_cart, $page)
    {
        $stockController = new StockController();
        $stock = $stockController->hasStock($id_product);
        if($stock)
        {
            $stockQty = (int)$stock['qty'] - (int)$stock['reserved'];
            $stockQtyClass = false;
            if($stockQty === 0)
            {
                $stockQtyClass = 'disabled';
            }
            if($page === 'product')
            {
                $html = '
        <div class="row addToCartButtons '.$page.' mb-1">
            <div class="col-xs-12 col-md-4 d-flex">
                <button class="btn btn-default backColor productLess" data-id="'.$id_product.'">-</button>
                <input class="form-control text-center" type="number" name="qty" id="qty-'.$id_product.'" value="1" minlength="1" readonly>
                <input type="hidden" name="stock" id="stock-'.$id_product.'" value="'.$stockQty.'">
                <button class="btn btn-default backColor productMore" data-id="'.$id_product.'">+</button>
            </div>
            <div class="col-xs-12 col-md-8">
            <button class="btn btn-default btn-block btn-lg backColor buttonAddToCart" data-id="'.$id_product.'" data-cart="'.$id_cart.'" '.$stockQtyClass.'>Añadir a la cesta
            <i class="fa fa-shopping-cart"></i>
            </button>
            </div>
        </div>
        ';
            } else {
                $html = '
        <div class="row addToCartButtons '.$page.' mb-1">
            <div class="col-xs-8 d-flex">
                <button class="btn btn-default backColor productLess" data-id="'.$id_product.'">-</button>
                <input class="form-control text-center" type="number" name="qty" id="qty-'.$id_product.'" value="1" minlength="1" readonly>
                <input type="hidden" name="stock" id="stock-'.$id_product.'" value="'.$stockQty.'">
                <button class="btn btn-default backColor productMore" data-id="'.$id_product.'">+</button>
            </div>
            <div class="col-xs-4">
            <button class="btn btn-default btn-block backColor buttonAddToCart" data-id="'.$id_product.'" data-cart="'.$id_cart.'" '.$stockQtyClass.'>
            <i class="fa fa-shopping-cart"></i>
            </button>
            </div>
        </div>
        ';
            }


            echo $html;
        }
    }
}