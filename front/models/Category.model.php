<?php

require_once "Conn.php";

class CategoryModel
{
    public function main()
    {
        $stmt = Conn::connect()->prepare("SELECT name, id, url FROM category WHERE parent = 0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public function sub()
    {
        $stmt = Conn::connect()->prepare("SELECT name, parent, url FROM category WHERE parent != 0");
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
}