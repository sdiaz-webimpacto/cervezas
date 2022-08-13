<?php


class StockModel
{
    public static function hasStock($id_product)
    {
        $whereSelect = 'id_product = '.$id_product;
        $select = Conn::select('stock', 'id, qty, reserved', $whereSelect);
        if(empty($select))
        {


            $html = 'INSERT INTO stock (id_product, qty, reserved, alert) VALUES ('.$id_product.', 0, 0, 0)';
            $stmt = Conn::connect()->prepare($html);
            if($stmt->execute())
            {
                $insert = true;
            } else {
                $insert = false;
            }

            $return = 'Problema insertando el artículo en la tabla de stock';
            if($insert)
            {
                $return = 0;
            }
            return $return;
        } else {
            $return = $select;
            return $return;
        }
        $stmt->close();
        $stmt = null;
    }
}