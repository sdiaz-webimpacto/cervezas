<?php

class NavigationTools
{
    public static function redirect($url)
    {
        header('location: '.$url);
    }
}

