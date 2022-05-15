<?php

require_once "models/Conn.php";

class ComentsInProductsModel
{

    public static function getAllComents($id_product, $limit)
    {
        $query = '';
        if(empty($limit))
        {
            $query = "SELECT * FROM coment WHERE id_product = ".$id_product;
        } else {
            $query = "SELECT * FROM coment WHERE id_product = ".$id_product." LIMIT ".$limit;
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

}