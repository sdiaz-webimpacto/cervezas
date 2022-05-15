<?php

class ProductController
{
    public static function getProductsMost($value, $type, $init = 0, $limit = 4)
    {
        $response = ProductModel::getProductsMost($value, $type, $init, $limit);
        return $response;
    }

    public static function productsCarousel($id_product, $order, $method, $init, $limit)
    {
        $response = ProductModel::productsCarousel($id_product, $order, $method, $init, $limit);
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
