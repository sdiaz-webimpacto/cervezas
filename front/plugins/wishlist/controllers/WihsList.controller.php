<?php

class WishListController
{
    public static function verifyLogin()
    {
        if($_SESSION && isset($_SESSION['id']))
        {
            return $_SESSION['id'];
        }
        return false;
    }
    public static function isInWishList($id_product, $id_customer)
    {
        $where = 'id_customer = '.$id_customer.' AND id_product = '.$id_product;
        $product = Conn::select('wish_list', '*', $where);
        return $product;
    }
    public static function getAllWishListProduct($id_customer)
    {
        $where = 'id_customer = '.$id_customer.' ORDER BY id_whish_list';
        $product = Conn::select('wish_list', 'id_product', $where);
        return $product;
    }
}
