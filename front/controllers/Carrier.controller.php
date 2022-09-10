<?php

class CarrierController
{
    public static function diponibleCarriers($weight, $state, $mont)
    {
        return CarrierModel::diponibleCarriers($weight, $state, $mont);
    }
}
