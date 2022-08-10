<?php


class CartController
{
    public function getCart($id_customer, $id_guest = false)
    {
        $field = 'id_guest';
        $value = $id_guest;
        if($id_guest === false)
        {
            $field = 'id_customer';
            $value = $id_customer;
        }
        $where = $field." = ".$value." AND completed = 0";
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
}