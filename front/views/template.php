<?php

session_start();
/**
 * REDIRECTS
 */
if(isset($_GET["ruta"]))
{
    $urls = explode('/', $_GET['ruta']);
    if ($urls[0] == 'logout')
    {
        $customer = new CustomerController();
        $customer->logout();
    }
}

/*
HEADER
*/
    include "modules/header.php";

/*
FRIENDLY URLS
*/
    $paths = array();

    if(isset($_GET["ruta"]))
    {
        $paths = explode('/', $_GET['ruta']);

        if(CategoryController::isCat($paths[0]) ||
            $paths[0] == 'free-articles' ||
            $paths[0] == 'most-sales' ||
            $paths[0] == 'most-view')
        {
            if(file_exists("plugins/modules/category.php"))
            {
                include "plugins/modules/category.php";
            } else {
                include "modules/category.php";
            }
        }
        elseif ($paths[0] == 'myAccount'
        || $paths[0] == 'changePassword'
        || $paths[0] == 'cart')
        {
            if(file_exists("plugins/modules/".$paths[0].".php"))
            {
                include "plugins/modules/".$paths[0].".php";
            } else {
                include "modules/".$paths[0].".php";
            }
        }
        elseif ($values = ProductController::isProd($paths[0]))
        {
            if($values != false)
            {
                if(file_exists("plugins/modules/productPage.php"))
                {
                    include "plugins/modules/productPage.php";
                } else {
                    include "modules/productPage.php";
                }
            } else {
                include "modules/error404.php";
            }
        }
        else {
            include "modules/error404.php";
        }
    } else {
        // HOME
        include "modules/slide.php";
        if(file_exists("plugins/modules/hightlight.php"))
        {
            include "plugins/modules/hightlight.php";
        } else {
            include "modules/hightlight.php";
        }
    }

/* 
FOOTER    
*/
    include "modules/footer.php";
?>
