<?php


class CartController
{
    public function getCart($id_customer, $id_guest = false)
    {
        $field = 'id_guest';
        $value = $id_guest;
        $id_customer_blank = ' AND id_customer = 0';
        if($id_guest === false)
        {
            $field = 'id_customer';
            $value = $id_customer;
            $id_customer_blank = '';
        }
        $where = $field." = ".$value." AND completed = 0".$id_customer_blank;
        $response = Conn::select('cart', 'id', $where, ' ORDER BY id DESC');
        if(!empty($response))
        {
            return $response['id'];
        } else {
            $this->new($id_customer, $id_guest);
            $response = Conn::select('cart', 'id', $where);
        }
        return $response['id'];
    }

    public function new($id_customer, $id_guest = false)
    {
        $response = CartModel::new($id_customer, $id_guest);
        return $response;
    }

    public function remove($id_cart)
    {
        $response = CartModel::remove($id_cart);
        return $response;
    }

    public function emptyCart($id_cart)
    {
        $response = CartModel::emptyCart($id_cart);
        return $response;
    }

    public function getAllItemsCart($id_cart)
    {
        $response = CartModel::getAllItemsCart($id_cart);
        return $response;
    }

    public function getProductsInCart($id_cart)
    {
        $response = CartModel::getProductsInCart($id_cart);
        return $response;
    }

    public function passGuestToCustomerCart($id_cart, $id_customer)
    {
        $response = CartModel::passGuestToCustomerCart($id_cart, $id_customer);
    }

    public static function insertProductInCart($id_product, $id_cart, $qty)
    {
        $response = CartModel::insertProductInCart($id_product, $id_cart, $qty);
        return $response;
    }

    public static function updateCarrier($id_cart, $id_carrier)
    {
        $response = CartModel::updateCarrier($id_cart, $id_carrier);
        return $response;
    }

    public static function cartCarrier($id_cart)
    {
        return Conn::select('cart', 'id_carrier', 'id = '.$id_cart);
    }
}