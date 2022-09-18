<?php

if(!isset($_SESSION['id']))
{
    NavigationTools::redirect();
}

require_once dirname(__FILE__).'\sections\elements\breadcrum.php';

$page = 'checkout';

$productsInCart = $cart->getProductsInCart($cart_id);
$weight = (float)0;
$total = (int)0;
$carrierPrice = (int)0;
$checkoutProducts = "<div class='col-xs-12 d-flex pl-0 lineProductCheckout'>
                            <div class='col-xs-7 textBlack'><i>Producto</i></div>
                            <div class='col-xs-2 textBlack'><i>P/u.</i></div>
                            <div class='col-xs-1 textBlack'><i>Ctd.</i></div>
                            <div class='col-xs-2 textBlack'><i>Total</i></div>
                          </div>";

foreach ($productsInCart as $datasCheckout)
{
    $price = $datasCheckout['price'];
    if($datasCheckout['offer_price'] > 0)
    {
    $price = $datasCheckout['offer_price'];
    }
    $weight .= $datasCheckout['productWeight'];
    $total = (float)$total+(float)$datasCheckout['productPrice'];
    $checkoutProducts .= "<div class='col-xs-12 d-flex pl-0 lineProductCheckout'>
                            <div class='col-xs-3'><img class='img-thumbnail' src='".$pathBack.$datasCheckout['cover']."' width='40'></div>
                            <div class='col-xs-4'><b>".$datasCheckout['title']."</b></div>
                            <div class='col-xs-2'><i>".number_format($price,2,',')."</i></div>
                            <div class='col-xs-1'>".$datasCheckout['qty']."</div>
                            <div class='col-xs-2 '><b>".number_format($datasCheckout['productPrice'],'2',',').$currency['sign']."</b></div>
                          </div>";
}

$breadcrum = Breadcrum::printBreadcrum($path, 'Tu pedido');

echo '
<div id="'.$page.'" class="container-fluid checkout">
    <div class="container">';
echo $breadcrum;
echo '
    <h1>Compra rápida</h1>
    <h6>Completa los siguientes datos para completar tu compra.</h6>
        <div class="col-xs-12 col-md-4 checkoutSection">
            <h3><i class="fa fa-user"></i> Tus datos</h3>';
include_once 'sections/elements/address.php';
echo '
        </div>
        <div class="col-xs-12 col-md-4 checkoutSection">
            <h3><i class="fa fa-truck"></i> Transporte</h3>';
include_once 'sections/elements/carrier.php';
echo '
        </div>
        <div class="col-xs-12 col-md-4 checkoutSection">
            <h3><i class="fa fa-money"></i> Metodo de pago</h3>';
include_once 'sections/elements/payment.php';
echo '            
            <h3><i class="fa fa-shopping-cart"></i> Mi pedido</h3>
            '.$checkoutProducts.'
        </div>
    </div>
</div>
';
