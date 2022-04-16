<?php

require_once "Conn.php";

class CategoryModel
{
    public static function main()
    {
        $stmt = Conn::connect()->prepare("SELECT name, id, url, banner FROM category WHERE parent = 0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function sub()
    {
        $stmt = Conn::connect()->prepare("SELECT name, parent, url, banner FROM category WHERE parent != 0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function getUrl($value)
    {
        $stmt = Conn::connect()->prepare("SELECT url FROM category WHERE url = :url");
        $stmt->bindParam(":url", $value, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetchAll();
        return $vals;
        $stmt->close();
        $stmt = null;
    }

    public static function getCategoryId($url)
    {
        $stmt = Conn::connect()->prepare("SELECT id FROM category WHERE url = :url");
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals['id'];
        $stmt->close();
        $stmt = null;
    }

    public static function getCategoryNameUrl($id)
    {
        $stmt = Conn::connect()->prepare("SELECT name, url FROM category WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals;
        $stmt->close();
        $stmt = null;
    }

    public static function getCategory($id)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals;
        $stmt->close();
        $stmt = null;
    }

    public static function getProductsInCategory($id_category, $order, $method, $init, $limit)
    {
        $stmt = Conn::connect()->prepare("
            SELECT a.* FROM product a 
            LEFT JOIN category_product b ON(a.id = b.id_product AND b.id_category = :id_category)
            WHERE b.id_category = :id_category
            ORDER BY :order $method 
            LIMIT :init, :limit");
        $stmt->bindParam(":id_category", $id_category, PDO::PARAM_INT);
        $stmt->bindParam(":order", $order, PDO::PARAM_STR);
        $stmt->bindParam(":init", $init, PDO::PARAM_INT);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->execute();
        $vals = $stmt->fetchAll();
        return $vals;
        $stmt->close();
        $stmt = null;
    }

    public static function getProductList($id_category, $order, $method)
    {
        $stmt = Conn::connect()->prepare("
            SELECT a.* FROM product a 
            LEFT JOIN category_product b ON(a.id = b.id_product AND b.id_category = :id_category)
            WHERE b.id_category = :id_category
            ORDER BY :order $method");
        $stmt->bindParam(":id_category", $id_category, PDO::PARAM_INT);
        $stmt->bindParam(":order", $order, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetchAll();
        return $vals;
        $stmt->close();
        $stmt = null;
    }
}