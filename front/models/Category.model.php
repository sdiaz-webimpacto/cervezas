<?php

require_once "Conn.php";

class CategoryModel
{
    public static function main()
    {
        $stmt = Conn::connect()->prepare("SELECT name, id, url FROM category WHERE parent = 0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function sub()
    {
        $stmt = Conn::connect()->prepare("SELECT name, parent, url FROM category WHERE parent != 0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function getProductsInCategory($id_category, $order, $method, $init, $limit)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM product WHERE id_category = :id_category OR id_sub_category = :id_category ORDER BY :order $method LIMIT :init, :limit");
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
}