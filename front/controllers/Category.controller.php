<?php

class CategoryController
{

    public static function getCategories($type)
    {
        $response = CategoryModel::$type();
        return $response;
    }
}