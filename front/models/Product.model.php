<?php


class ProductModel
{
    public static function getProductsMost($value, $type)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM product ORDER BY $value $type LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
}