<?php

class NavigationTools
{
    public static function redirect($url)
    {
        echo '<script>window.location.href = "'.$url.'";</script>';
    }
}

