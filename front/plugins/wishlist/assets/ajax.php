<?php

include_once "../../../models/Conn.php";

if($_POST)
{
    $user = $_POST['user'];
    $product = $_POST['product'];
    $values = array(
        'id_customer' => $user,
        'id_product' => $product
    );
    $where = 'id_customer = '.$user.' AND id_product = '.$product;

    $response = Conn::select('wish_list', '*', $where);

    if(empty($response))
    {
        $val = Conn::insert('wish_list', $values);
        if($val == 'ok')
        {
            $return = 'addClass';
        } else {
            $return = 'ko';
        }
    } else {
        $val = Conn::delete('wish_list', 'id_wish_list', $response['id_wish_list']);
        if($val == 'ok')
        {
            $return = 'removeClass';
        } else {
            $return = 'ko';
        }
    }
    echo json_encode(array($product, $return));
}
