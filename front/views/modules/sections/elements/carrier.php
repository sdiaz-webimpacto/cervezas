<?php

$stateCheckout = 0;
$priceForCarrier = 0;
$carrierSelected = 0;
foreach ($directions as $direction)
{
    if($direction['is_default'] === 1)
    {
        $stateCheckout = $direction['state'];
    }
}

$carriers = CarrierController::diponibleCarriers($weight, $stateCheckout, $total);
$html = '<input type="hidden" id="carrierCartId" value="'.$cart_id.'">';

if(empty($directions))
{
    $html .= '
   <div class="alert alert-info"><b>Cree su primera dirección para poder ofrecerle los métodos de transporte</b></div>
   ';
}
elseif(empty($carriers))
{
    $html .= '
    <div class="alert alert-info"><b>No existe transporte para su selección, pruebe a cambiar su dirección o a aumentar sus productos.</b></div>
    ';
} else {
    $cart_carrier = CartController::cartCarrier($cart_id);
    $needSelectCarrier = false;
    if($cart_carrier['id_carrier'] === 0)
    {
        CartController::updateCarrier($cart_id, $carriers[0]['id']);
        $cart_carrier = $carriers[0]['id'];
        $needSelectCarrier = true;
        $carrierSelected = $cart_carrier;
    } else {
        $cart_carrier = $cart_carrier['id_carrier'];
        $carrierSelected = $cart_carrier;
    }
    foreach ($carriers as $carrier) {
        $activeCarrier = '';
        if($carrier['id'] === (int)$cart_carrier)
        {
            $activeCarrier = 'active';
            $needSelectCarrier = true;
            $priceForCarrier = $carrier['price'];
        }
        $html .= '
        <div class="col-xs-12 carrierContent '.$activeCarrier.'" data-carrier-id="'.$carrier['id'].'">
        <div class="col-xs-2 carrierLogo">
            <img src="' . $pathBack . '/views/img/carriers/' . $carrier['carrier_logo'] . '" alt="carrier_logo" width="30" height="30">
        </div>
        <div class="col-xs-10 carrierRight">
            <div class="carrierName">' . $carrier['carrier_name'] . '</div>
            <div class="carrierPrice">' . number_format($carrier['price'], 2, ',') . '€</div>
        </div>
    </div>
        ';
    }
    if(!$needSelectCarrier)
    {
        CartController::updateCarrier($cart_id, $carriers[0]['id']);
        $html .= '<script>window.location.reload();</script>';
    }
}
    $checkoutProducts .= '<div class="col-xs-12 pl-0 globalCheckoutPrices">
                        <div class="row totalProductsCheckout">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-6">Total productos:</div>
                            <div id="totalProductsCheckout" class="col-xs-2">'.number_format($total,'2',',').$currency['sign'].'</div>
                        </div>
                        <div class="row taxCheckout">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-6">impuestos:</div>
                            <div id="taxCheckout" class="col-xs-2">'.number_format(($total * ($international['tax']/100)),'2',',').$currency['sign'].'</div>
                        </div>
                        <div class="row carrierPriceCheckout">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-6">Transporte:</div>
                            <div id="carrierPriceCheckout" class="col-xs-2">'.number_format($priceForCarrier,2,',').$currency['sign'].'</div>
                        </div>
                      </div>
                      <div class="col-xs-12 pl-0 totalToPay">
                        <div class="row totalToPayCheckout">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-5"><b>Total a pagar:</b></div>
                            <div id="totalToPayCheckout" class="col-xs-3 titleBase">'.number_format(($total + $priceForCarrier),2,',').$currency['sign'].'</div>
                        </div>
                      </div>';
    echo $html;


