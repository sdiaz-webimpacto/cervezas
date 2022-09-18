<?php


class CartModel
{
    public static function new($id_customer, $id_guest)
    {
        $field = 'id_guest';
        $value = $id_guest;
        if($id_guest === false)
        {
            $field = 'id_customer';
            $value = $id_customer;
        }
        $insert = array($field => $value);
        $result = Conn::insert('cart', $insert);
        $response = false;
        if($result === 'ok')
        {
            $response = true;
        }
        return $response;
    }

    public static function remove($id_cart)
    {
        $result = Conn::delete('cart', 'id', $id_cart);
        $response = false;
        if($result === 'ok')
        {
            $response = true;
        }
        return $response;
    }

    public static function emptyCart($id_cart)
    {
        $result = Conn::delete('cart_product', 'id_cart', $id_cart);
        $response = false;
        if($result === 'ok')
        {
            $response = true;
        }
        return $response;
    }

    public static function getAllItemsCart($id_cart)
    {
        $where = 'id_cart = '.$id_cart;
        $result = Conn::select('cart_product', 'sum(qty) as qty', $where);
        $return = 0;
        if(!empty($result['qty']))
        {
            $return = $result['qty'];
        }
        return $return;
    }

    public static function getProductsInCart($id_cart)
    {
        $table = 'product a LEFT JOIN cart_product b ON (a.id = b.id_product)';
        $where = 'b.id_cart = '.$id_cart;
        $result = Conn::selectMulti($table, 'a.title, a.cover, a.offer_price, a.offer_discount, a.price, b.qty, b.id_product, (a.weight * b.qty) AS productWeight, (a.price * b.qty) AS productPrice', $where);
        $return = false;
        if(!empty($result))
        {
            $return = $result;
        }
        return $return;
    }

    public static function passGuestToCustomerCart($id_cart, $id_customer)
    {
        $result = Conn::update('cart', array('id_customer' => $id_customer), 'id = '.$id_cart);
        return $result;
    }

    public static function insertProductInCart($id_product, $id_cart, $qty)
    {
        $html = 'INSERT INTO cart_product (id_product, id_cart, qty) VALUES ('.$id_product.', '.$id_cart.','.$qty.')';
        $stmt = Conn::connect()->prepare($html);
        if($stmt->execute())
        {
            $insert = 'ok';
        } else {
            $insert = 'No se ha podido añadir el producto';
        }
        return $insert;
    }

    public static function updateCarrier($id_cart, $id_carrier)
    {
        $return = 'No se ha podido actualizar la tabla';
        $updateFirst = Conn::update('cart', array('id_carrier' => 0), 'id = '.(int)$id_cart);
        if($updateFirst === 'ok')
        {
            $updateSecond = Conn::update('cart', array('id_carrier' => (int)$id_carrier), 'id = '.(int)$id_cart);
            if($updateSecond === 'ok')
            {
                $return = 'ok';
            } else {
                $return = 'No se puede asignar el transportista a este carrito';
            }
        }
        return $return;
    }
}