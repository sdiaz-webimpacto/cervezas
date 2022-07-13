<?php

require_once "models/Conn.php";

class ComentsInProductsModel
{

    public static function getAllComents($id_product, $limit)
    {
        $query = '';
        if(empty($limit))
        {
            $query = "SELECT a.*, b.name FROM coment a LEFT JOIN customer b ON (a.id_user = b.id) WHERE id_product = ".$id_product;
        } else {
            $query = "SELECT a.*, b.name FROM coment a LEFT JOIN customer b ON (a.id_user = b.id) WHERE id_product = ".$id_product." LIMIT ".$limit;
        }
        $stmt = Conn::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function getRating($id_product)
    {
        $query = "SELECT count(id) as valorations, sum(rating) as rating FROM coment WHERE id_product = ".$id_product;
        $stmt = Conn::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }

    public static function existValoration($product, $customer)
    {
        $query = "SELECT count(id) as valorations FROM coment WHERE id_product = ".$product." AND id_user = ".$customer;
        $stmt = Conn::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }

}