<?php

require_once "Conn.php";

class CustomerModel
{
    public static function customer($array = false)
    {
            Conn::insert('customer', $array);
                return "ok";
    }

    public static function isCustomer($email)
    {
        $stmt = Conn::connect()->prepare("SELECT email FROM customer WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        return $vals;
        $stmt->close();
        $stmt = null;
    }
}
