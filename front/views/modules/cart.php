<?php

require_once dirname(__FILE__).'\sections\elements\breadcrum.php';

$page = 'cart';

$breadcrumb = Breadcrum::printBreadcrum($path, 'cart');

$productsInCart = $cart->getProductsInCart($cart_id);
$totalCart = 0;

echo $breadcrumb.'
    <div class="container-fluid cart">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading cartHeader">
                    <div class="col-md-5 col-sm-7 col-xs-12 text-center">
                        <h3><small>Producto</small></h3>
                    </div>
                    <div class="col-md-2 col-sm-1 col-xs-0 text-center">
                        <h3><small>Precio</small></h3>
                    </div>
                    <div class="col-md-3 col-xs-0 text-center">
                        <h3><small>Cantidad</small></h3>
                    </div>
                    <div class="col-md-2 col-xs-0 text-center">
                        <h3><small>Subtotal</small></h3>
                    </div>
                </div>
                <div class="panel-body cartBody">';
    if(!empty($productsInCart))
    {
        foreach ($productsInCart as $productInCart)
        {
            $discount = false;
            $old_price = false;
            $price = $productInCart['price'];
            if($productInCart['offer_price'] != 0)
            {
                $old_price = $productInCart['price'];
                $discount = $productInCart['offer_discount'];
                $price = number_format($productInCart['offer_price'], 2);
            }
            $priceThisProduct = $price * $productInCart['qty'];
            $totalCart = $totalCart + $priceThisProduct;
            echo '
                    <div class="row cartItem">
                        <div class="col-sm-1 col-xs-12">
                            <button class="btn btn-default backColor deleteProductCart" data-id="'.$productInCart['id_product'].'">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="col-sm-1 col-xs-12">
                            <figure>
                                <img class="img-thumbnail" src="'.$pathBack.$productInCart['cover'].'" alt="'.$productInCart['title'].'">
                            </figure>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <p class="cartTitleProduct text-left mb-0">'.$productInCart['title'].'</p>
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-12 textInMidle">
                        <input type="hidden" name="cartId" id="cartId" value="'.$cart_id.'">';

            if(!empty($discount))
            {
                echo '
            <p class="oferta mb-0 mr-1">'.$old_price.'€</p>
            <span class="label label-warning fontSize">'.$discount.'%</span>
            ';
            }
            echo '        
                            <p class="cartPrice mb-0"><span class="priceWithOutSign" data-id="'.$productInCart['id_product'].'">'.$price.'</span>€</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 textInMidle">
                            <div class="col-xs-6 col-sm-12">
                                <button class="btn btn-default backColor less" data-id="'.$productInCart['id_product'].'">-</button>
                                <input id="input-'.$productInCart['id_product'].'" type="number" class="form-control text-center" min="1" minlength="1" value="'.$productInCart['qty'].'" readonly>
                                <button class="btn btn-default backColor more" data-id="'.$productInCart['id_product'].'">+</button>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-12 textInMidle">
                            <p class="cartSubtotal mb-0"><b class="totalWithOutSign" data-id="'.$productInCart['id_product'].'">'.$priceThisProduct.'</b></p>
                        </div>
                    </div><hr class="mb-0">
        ';
        }
        echo '
        <div class="panel-body confirmCart">
                        <div class="col-md-4 col-sm-6 col-xs-12 pull-right well">
                            <div class="col-xs-6">
                                <h4>Total:</h4>
                            </div>
                            <div class="col-xs-6">
                                <h4><b><span class="globalWithOutSign">'.$totalCart.'</span>€</b></h4>
                            </div>
                        </div>
                    </div>      
                    
                    <div class="panel-heading checkoutHeader">
                        <button class="btn btn-defaiult backColor btn-lg pull-right mb-1">PAGAR</button>
                    </div>   ';
    } else {
        echo '
                    <div class="col-xs-12 alert alert-info">
                        No hay ningún producto añadido a su cesta de la compra
                    </div>
                    <div class="panel-heading checkoutHeader">
                        <a href="'.$path.'">
                            <button class="btn btn-defaiult backColor btn-lg pull-right mb-1">Continuar comprando</button>
                        </a>    
                    </div>
        ';
    }
echo '                    
                    
                    
                </div>
            </div>
        </div>
    </div>
';