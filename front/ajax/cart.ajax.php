<?php

if(file_exists('tools/CustomerTools.php'))
{
    require_once "models/Conn.php";
} else {
    require_once "../models/Conn.php";
}

class AjaxCart
{
    public function ajaxUpdateQty()
    {
        if(isset($_POST['operation']))
        {
            $qtyInit = $_POST['qty'];
            $qty = $qtyInit + 1;
            if($_POST['operation'] === 'less')
            {
                $qty = $qtyInit - 1;
            }
            $update = array('qty' => $qty);
            $where = 'id_cart = '.$_POST['cart_id'].' AND id_product = '.$_POST['product_id'];
            $result = Conn::update('cart_product', $update, $where);

            $response = array(
                "result" => $result,
            );

            echo json_encode($response);
        }
    }

    public function deleteProduct()
    {
        if(isset($_POST['delete']))
        {
            $product = $_POST['delete'];
            $cart = $_POST['cart_id'];
            $and = $product.' AND id_cart = '.$cart;
            $result = Conn::delete('cart_product', 'id_product', $and);
            $response = array(
                "result" => $result,
            );

            echo json_encode($response);
        }
    }
}

$object = new AjaxCart();
$object->ajaxUpdateQty();
$object->deleteProduct();
