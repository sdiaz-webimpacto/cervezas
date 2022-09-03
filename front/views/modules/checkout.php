<?php

if(!isset($_SESSION['id']))
{
    NavigationTools::redirect();
}

require_once dirname(__FILE__).'\sections\elements\breadcrum.php';

$page = 'checkout';

$productsInCart = $cart->getProductsInCart($cart_id);

$breadcrum = Breadcrum::printBreadcrum($path, 'Tu pedido');

echo '
<div class="container-fluid checkout">
    <div class="container">';
echo $breadcrum;
echo '
    <h1>Compra rápida</h1>
    <h6>Completa los siguientes datos para completar tu compra.</h6>
        <div class="col-12 col-md-4 checkoutSection">
        <h3><i class="fa fa-user"></i> Tus datos</h3>';
include_once 'sections/elements/address.php';
echo '
        </div>
        <div class="col-12 col-md-4 checkoutSection">
            <div class="checkoutShipper">Transporte</div>
        </div>
        <div class="col-12 col-md-4 checkoutSection">
            <div class="checkoutPay">Pago</div>
        </div>
    </div>
</div>
';
