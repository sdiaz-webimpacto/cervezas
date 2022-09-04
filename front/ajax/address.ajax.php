<?php

if(file_exists('tools/CustomerTools.php'))
{
    require_once "models/Conn.php";
    require_once "models/Address.model.php";
    require_once "controllers/Address.controller.php";
} else {
    require_once "../models/Conn.php";
    require_once "../models/Address.model.php";
    require_once "../controllers/Address.controller.php";
}

class AddressAjax
{
    public function changeDefaultAddress()
    {
        if($_POST && isset($_POST['changeDefaultAddress']))
        {
            $customer = Conn::select('address', 'id_customer', 'id_address = '.$_POST['id']);
            $controller = new AddressController();
            $result = $controller->changeDefaultAddress($_POST['id'], $customer['id_customer']);
            $response = array(
                "result" => $result,
            );

            echo json_encode($response);
        }
    }

    public function newAddress()
    {
        if($_POST && isset($_POST['addressMethod']))
        {
            $controller = new AddressController();
            if(isset($_POST['addressMethod']) && $_POST['addressMethod'] === 'new')
            {
                $datas = array(
                    'id_customer' => $_POST['addressCustomer'],
                    'address_name' => $_POST['addressName'],
                    'address' => $_POST['addressAddress'],
                    'zip' => $_POST['addressZip'],
                    'city' => $_POST['addressCity'],
                    'state' => $_POST['addressState']
                );
                $result = $controller->newAddress($datas);
            } else {
                $datas = array(
                    'address_name' => $_POST['addressName'],
                    'address' => $_POST['addressAddress'],
                    'zip' => $_POST['addressZip'],
                    'city' => $_POST['addressCity'],
                    'state' => $_POST['addressState'],
                );
                $result = $controller->updateAddress($datas, $_POST['addressId']);
            }

            $response = array(
                "result" => $result,
            );

            echo json_encode($response);
        }
    }

    public function deleteAddress()
    {
        if($_POST && isset($_POST['deleteAddress']))
        {
            $id = $_POST['deleteAddress'];
            $result = Conn::delete('address', 'id_address', $id);
            $response = array(
                "result" => $result,
            );

            echo json_encode($response);
        }
    }

    public function printEditModalAddress()
    {
        if($_POST && isset($_POST['editAddress']))
        {
            if($_POST['editAddress'] === 'no')
            {
                file_put_contents(__DIR__.'/santi.log', date('d-m-Y H:i:s').' - '.var_export('Entro primero', TRUE).PHP_EOL ,FILE_APPEND);
                $response = array(
                    "datas" => $this->getHtml(false, $_POST['customer']),
                    "result" => 'ok'
                );
            } else {
                $fields = 'a.id_address, a.address_name, a.address, a.zip, a.city, a.state, b.`name`';
                $id = $_POST['editAddress'];
                $result = Conn::select('address a LEFT JOIN states b ON (a.state = b.id_state)', $fields, 'id_address = '.(int)$id);
                $status = 'ko';
                if(!empty($result))
                {
                    $status = 'ok';
                }
                $response = array(
                    "datas" => $this->getHtml($result),
                    "result" => $status
                );
            }

            echo json_encode($response);
        }
    }

    private function getHtml($array = false, $user = false)
    {
        if($array === false)
        {
            $title = 'Nueva dirección';
            $user = '<input type="hidden" value="'.$user.'" name="addressCustomer" id="addressCustomer">';
            $idAddress = '';
            $method = 'new';
            $nameAdd = 'placeholder="Nombre de la dirección"';
            $addressAdd = 'placeholder="Dirección"';
            $zipAdd = 'placeholder="Código postal"';
            $stateAdd = 'placeholder="Localidad"';
            $countryIdAdd = '';
            $countryNameAdd = 'Seleccione su provincia';
        } else {
            $title = 'Editar dirección';
            $user = '';
            $idAddress = '<input type="hidden" value="'.$array['id_address'].'" name="addressId" id="addressId">';
            $method = 'edit';
            $nameAdd = 'value="'.$array['address_name'].'"';
            $addressAdd = 'value="'.$array['address'].'"';
            $zipAdd = 'value="'.$array['zip'].'"';
            $stateAdd = 'value="'.$array['city'].'"';
            $countryIdAdd = $array['state'];
            $countryNameAdd = $array['name'];
        }
        $states = AddressController::getStates();
        $statesHtml = '';
        foreach ($states as $state)
        {
            $statesHtml .= '<option value="'.$state['id_state'].'">'.$state['name'].'</option>';
        }

        $html = '
<div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header backColor borderTopR">
                <h5 class="col-xs-11 modal-title titleWhite" id="editAddressModalCenterTitle">'.$title.'</h5>
                <button type="button" class="col-xs-1 close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="editAddressForm" class="form">
                    <form method="post" onsubmit="return newAddress()" class="mt-1">
                    '.$user.$idAddress.'                    
                    <input type="hidden" value="'.$method.'" name="addressMethod" id="addressMethod">
                        <hr>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tag"></i>
                            </span>
                                <input type="text" class="form-control" id="addressName" name="addressName" '.$nameAdd.'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                                <input type="text" class="form-control" id="addressAddress" name="addressAddress" '.$addressAdd.'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                <input type="number" class="form-control" id="addressZip" name="addressZip" '.$zipAdd.'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tower"></i>
                            </span>
                                <input type="text" class="form-control" id="addressCity" name="addressCity" '.$stateAdd.'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-globe"></i>
                            </span>
                                <select class="form-control" id="addressState" name="addressState">
                                    <option value="'.$countryIdAdd.'">'.$countryNameAdd.'</option>';
        $html .= $statesHtml;
        $html .= '
                                </select>
                            </div>
                        </div>                     
                        <input id="submitEditAddress" type="submit" class="btn btn-default btn-block backColor" value="ENVIAR">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
';
        return $html;
    }
}

$object = new AddressAjax();
$object->changeDefaultAddress();
$object->newAddress();
$object->deleteAddress();
$object->printEditModalAddress();
