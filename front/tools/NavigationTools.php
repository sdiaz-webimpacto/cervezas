<?php

class NavigationTools
{
    public static function redirect($url = false)
    {
        if(empty($url))
        {
            echo '<script>history.back(-1);</script>';
        }
        echo '<script>window.location.href = "'.$url.'";</script>';
    }
}

