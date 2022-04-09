<?php

class ProductController
{
    public static function getProductsMost($value, $type)
    {
        $response = ProductModel::getProductsMost($value, $type);
        return $response;
    }
}
