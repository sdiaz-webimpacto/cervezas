<?php

require_once "Conn.php";

class TemplateModel
{
    public static function mdlTemplate($table)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
}