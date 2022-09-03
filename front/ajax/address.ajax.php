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
        if($_POST && isset($_POST['addressCustomer']))
        {
            $datas = array(
                'id_customer' => $_POST['addressCustomer'],
                'address_name' => $_POST['addressName'],
                'address' => $_POST['addressAddress'],
                'zip' => $_POST['addressZip'],
                'city' => $_POST['addressCity'],
                'state' => $_POST['addressState']
            );
            $controller = new AddressController();
            $result = $controller->newAddress($datas);
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
}

$object = new AddressAjax();
$object->changeDefaultAddress();
$object->newAddress();
$object->deleteAddress();
