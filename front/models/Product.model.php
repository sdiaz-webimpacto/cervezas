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

    public static function getUrl($value)
    {
        $stmt = Conn::connect()->prepare("SELECT id, url FROM product WHERE url = :url");
        $stmt->bindParam(":url", $value, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals;
        $stmt->close();
        $stmt = null;
    }
}