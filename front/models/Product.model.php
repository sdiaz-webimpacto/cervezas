<?php

require_once "Conn.php";

class ProductModel
{
    public static function getProductsMost($value, $type, $init = 0, $limit = 4)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM product ORDER BY $value $type LIMIT $init, $limit");
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

    public static function getFindProduct($string)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM product WHERE title LIKE '%$string%' OR description like '%$string%' OR short_description like '%$string%' OR detail LIKE '%$string%'");
        $stmt->execute();
        $vals = $stmt->fetchAll();
        return $vals;
        $stmt->close();
        $stmt = null;
    }

    public static function getProductId($url)
    {
        $stmt = Conn::connect()->prepare("SELECT id FROM product WHERE url = :url");
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals;
        $stmt->close();
        $stmt = null;
    }

    public static function getProduct($id)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals;
        $stmt->close();
        $stmt = null;
    }
}