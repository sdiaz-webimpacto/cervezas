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
        if(count($vals) >= 1)
        {
            return true;
        } else {
            return false;
        }
        $stmt->close();
        $stmt = null;
    }

    public static function getUser($id)
    {
        $stmt = Conn::connect()->prepare("SELECT * FROM customer WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $vals = $stmt->fetch();
        if(count($vals) >= 1)
        {
            return $vals;
        } else {
            return false;
        }
        $stmt->close();
        $stmt = null;
    }

    public static function confirmMail($array, $where)
    {
        $data = Conn::update('customer', $array, $where);
        return $data;
    }

    public function tokenTransform($token)
    {
        $stmt = Conn::connect()->prepare("SELECT id FROM customer WHERE token = :token");
        $stmt->bindParam(":token", $token, PDO::PARAM_STR);
        $stmt->execute();
        $vals = $stmt->fetch();
        if(count($vals) >= 1)
        {
            return $vals['id'];
        } else {
            return false;
        }
        $stmt->close();
        $stmt = null;
    }
}
