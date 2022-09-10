<?php

class CarrierModel
{
    public static function diponibleCarriers($weight, $state, $mont)
    {
        $where = 'min_weight <= '.$weight.' AND max_weight >= '.$weight;
        $sql = Conn::selectMulti('carrier', 'carrier_name, carrier_logo, carrier_states, IF(mont_to_free <= '.$mont.', 0, carrier_price) AS price, mont_to_free', $where );
        $valid = array();

        foreach ($sql as $item)
        {
            if(!empty($item['carrier_states']))
            {
                $states = explode(',', $item['carrier_states']);
                if(in_array($state, $states))
                {
                    array_push($valid, $item);
                }
            } else {
                array_push($valid, $item);
            }

        }

        return $valid;
    }
}
