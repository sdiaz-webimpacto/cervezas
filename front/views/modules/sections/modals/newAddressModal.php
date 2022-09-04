<?php
/*
$states = AddressController::getStates();
$statesHtml = '';
foreach ($states as $state)
{
    $statesHtml .= '<option value="'.$state['id_state'].'">'.$state['name'].'</option>';
}

echo '
<div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog" aria-labelledby="newAddressModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header backColor borderTopR">
                <h5 class="col-xs-11 modal-title titleWhite" id="newAddressModalCenterTitle">Nueva dirección</h5>
                <button type="button" class="col-xs-1 close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="newAddressForm" class="form">
                    <form method="post" onsubmit="return newAddress()" class="mt-1">
                    <input type="hidden" value="'.$_SESSION['id'].'" name="addressCustomer" id="addressCustomer">
                    <input type="hidden" value="new" name="addressMethod" id="addressMethod">
                        <hr>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tag"></i>
                            </span>
                                <input type="text" class="form-control" id="addressName" name="addressName" placeholder="Nombre de la dirección">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                                <input type="text" class="form-control" id="addressAddress" name="addressAddress" placeholder="Dirección">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                <input type="number" class="form-control" id="addressZip" name="addressZip" placeholder="Código postal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tower"></i>
                            </span>
                                <input type="text" class="form-control" id="addressCity" name="addressCity" placeholder="Localidad">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-globe"></i>
                            </span>
                                <select class="form-control" id="addressState" name="addressState">
                                    <option value="">Selecione su provincia</option>';
          echo $statesHtml;
echo '
                                </select>
                            </div>
                        </div>                     
                        <input id="submitNewAddress" type="submit" class="btn btn-default btn-block backColor" value="ENVIAR">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
';*/
