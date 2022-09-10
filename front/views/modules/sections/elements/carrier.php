<?php

$stateCheckout = 0;
foreach ($directions as $direction)
{
    if($direction['is_default'] === 1)
    {
        $stateCheckout = $direction['state'];
    }
}
$carriers = CarrierController::diponibleCarriers($weight, $stateCheckout, $total);
$html = '';

if(empty($carriers))
{
    $html .= '
    <div class="alert alert-info">No existe transporte para su selección, pruebe a cambiar su dirección o a aumentar sus productos.</div>
    ';
} else {
    foreach ($carriers as $carrier)
    {
        $html .= '
        <div class="col-xs-12 carrierContent">
        <div class="col-xs-2 carrierLogo">
            <img src="'.$pathBack.'/views/img/carriers/'.$carrier['carrier_logo'].'" alt="carrier_logo" width="30" height="30">
        </div>
        <div class="col-xs-10 carrierRight">
            <div class="carrierName">'.$carrier['carrier_name'].'</div>
            <div class="carrierPrice">'.number_format($carrier['price'],2,',').'€</div>
        </div>
    </div>
        ';
    }
    echo $html;
}


