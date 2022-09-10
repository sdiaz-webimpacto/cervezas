<?php

require_once "Conn.php";

class OrdersModel
{
    public function getOrderForCustomer($id_customer)
    {
        $sql = '
            SELECT a.id_order, a.price, a.pay_method, e.title as status, a.date_add, GROUP_CONCAT(DISTINCT f.title," ", b.qty SEPARATOR ",") as product FROM orders a 
            LEFT JOIN orders_product b ON (a.id_order = b.id_order) 
            LEFT JOIN orders_status c ON (a.id_order = c.id_order) 
            LEFT JOIN carrier d ON (a.id_carrier = d.id) 
            LEFT JOIN status e ON (c.id_status = e.id_status) 
            LEFT JOIN product f ON (f.id = b.id_product) 
            WHERE a.id_customer = '.$id_customer.'
        ';

        $stmt = Conn::connect()->prepare($sql);
        $stmt->execute();
        $vals = $stmt->fetchAll();
        if(!empty($vals) && count($vals) >= 1)
        {
            return $vals;
        } else {
            return false;
        }
        $stmt->close();
        $stmt = null;
    }
}