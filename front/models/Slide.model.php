<?php

require_once "Conn.php";

class SLideModel
{
    public static function getSlide($table)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
}
