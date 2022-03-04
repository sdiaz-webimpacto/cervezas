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
    }

    public function sub()
    {
        $stmt = Conn::connect()->prepare("SELECT name, parent, url FROM category WHERE parent != 0");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}