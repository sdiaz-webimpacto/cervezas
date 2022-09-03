<?php

class AddressModel
{
    public static function changeDefaultAddress($id_address, $id_customer)
    {
        $allInZero = array('is_default' => 0);
        $queryFirst = Conn::update('address', $allInZero, 'id_customer = '.$id_customer);
        if($queryFirst === 'ok')
        {
            $newDeafult = array('is_default' => 1);
            $update = Conn::update('address', $newDeafult, 'id_address = '.$id_address);
            if($update === 'ok')
            {
                return 'ok';
            } else {
                return 'problema con la nueva dirección por defecto';
            }
        } else {
            return 'No se ha podido quitar la dirección por defecto anterior';
        }
    }
}
