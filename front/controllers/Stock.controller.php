<?php


class StockController
{
    public function hasStock($id_product)
    {
        $response = StockModel::hasStock($id_product);
        if($response)
        {
            return $response;
        }
        return 'No se ha podido acceder al controlador';
    }

    public function reserveStock($id_product, $qty)
    {
        $fields = array('reserved' => $qty);
        $where = 'id_product = '.$id_product;
        $query = Conn::update('stock', $fields, $where);
        $return = 'No se ha podido actualizar la tabla de stock';
        if($query)
        {
            $return = 'ok';
        }
        return $return;
    }
}