<?php

class ProductController
{
    public static function getProductsMost($value, $type)
    {
        $response = ProductModel::getProductsMost($value, $type);
        return $response;
    }

    public static function isProd($url)
    {
        $response = ProductModel::getUrl($url);
        if(count($response) >= 1)
        {
            return $response;
        } else {
            return false;
        }
    }

    public static function getFindProduct($string)
    {
        $response = ProductModel::getFindProduct($string);
        return $response;
    }

    public static function getProductId($url)
    {
        $response = ProductModel::getProductId($url);
        return $response;
    }

    public static function getProduct($id)
    {
        $response = ProductModel::getProduct($id);
        return $response;
    }
}
