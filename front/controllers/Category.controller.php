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
}