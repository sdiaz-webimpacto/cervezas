<?php

class CategoryController
{

    public static function getCategories($type)
    {
        $response = CategoryModel::$type();
        return $response;
    }

    public static function isCat($url)
    {
        $response = CategoryModel::getUrl($url);
        if(count($response) >= 1)
        {
            return true;
        } else {
            return false;
        }
    }

    public static function getProductsInCategory($id_category, $order = 'id', $method = 'DESC', $init = 0, $limit = 12)
    {
        $response = CategoryModel::getProductsInCategory($id_category, $order, $method, $init, $limit);
        if(count($response) >= 1)
        {
            return $response;
        } else {
            return "No hay ningún producto en esta categoria";
        }
    }
}