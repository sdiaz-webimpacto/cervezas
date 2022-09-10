<?php

if(!isset($_SESSION['id']))
{
    NavigationTools::redirect();
}

require_once dirname(__FILE__).'\sections\elements\breadcrum.php';

$page = 'checkout';

$productsInCart = $cart->getProductsInCart($cart_id);
$weight = (float)0;
$total = (float)0;

foreach ($productsInCart as $datasCheckout)
{
    $weight .= $datasCheckout['productWeight'];
    $total .= $datasCheckout['productPrice'];
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
            <h3><i class="fa fa-money"></i> Metodo de pago</h3>
        </div>
    </div>
</div>
';
