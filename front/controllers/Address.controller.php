<?php

class AddressController
{
    public function getAllAddress($id_customer)
    {
        return  Conn::selectMulti('address a LEFT JOIN states b ON (a.state = b.id_state)', 'a.*, b.name AS stateName', 'a.id_customer = '.(int)$id_customer);
    }

    public function changeDefaultAddress($id_address, $customer)
    {
        return AddressModel::changeDefaultAddress($id_address, $customer);
    }

    public function newAddress($array)
    {
        $update = Conn::update('address', array('is_default' => 0), 'id_customer = '.(int)$array['id_customer']);
        if(empty($update))
        {
            return 'Error actualizando las direcciones';
        }
        $country = Conn::select('states', 'country', 'id_state = '.(int)$array['state']);
        $array['country'] = $country['country'];
        $return = Conn::insert('address', $array);
        if($return === 'ok')
        {
            return 'ok';
        }
        return 'Error al crear la dirección';
    }

    public function updateAddress($array, $id_address)
    {
        $country = Conn::select('states', 'country', 'id_state = '.(int)$array['state']);
        $array['country'] = $country['country'];
        $return = Conn::update('address', $array, 'id_address = '.(int)$id_address);
        if($return === 'ok')
        {
            return 'ok';
        }
        return 'Error al actualizar la dirección';
    }

    public static function getStates()
    {
        return Conn::selectMulti('states', '*', 'id_state > 0');
    }
}
