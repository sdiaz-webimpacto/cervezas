<?php

$address = new AddressController();
$directions = $address->getAllAddress($_SESSION['id']);

$addressHtml = '';

foreach($directions as $direction) {
    $addressHtml .= '<div class="addressContent">';
    if ($direction['is_default'] === 0) {
        $addressHtml .= '<div class="addressDelete">x</div>';
    }
    $addressHtml .= '<div class="addressEdit"><i class="fa fa-pencil"></i></div><a href="" class="buttonDfAdd" data-id="' . $direction['id_address'] . '"><div class="card checkoutAddressItem';
    if ($direction['is_default'] === 1) {
        $addressHtml .= ' active';
    }
    $addressHtml .= '" data-id="' . $direction['id_address'] . '">';
    $addressHtml .= '<div class="card-header">
                        <h4>' . $direction['address_name'] . '</h4>
                    </div>
                    <div class="card-body">
                        <p>' . $direction['address'] . '</p>
                        <p>' . $direction['zip'] . ' ' . $direction['city'] . '</p>
                        <p>' . $direction['stateName'] . ' | ' . $direction['country'] . '</p>
                    </div>';

    $addressHtml .= '</div></a></div>';
}

echo '
<div class="checkoutAdress">';
echo $addressHtml;
echo '                
                <div class="card checkoutAddressAdd">
                    <div class="card-body">
                        <a href="#newAddressModal" data-toggle="modal"><button class="btn btn-primary">Añadir dirección</button></a>
                    </div>
                </div>
            </div>
';
require_once 'views/modules/sections/modals/newAddressModal.php';
