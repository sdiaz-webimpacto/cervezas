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
            include "modules/category.php";
        }
        elseif ($paths[0] == 'myAccount')
        {
            if(file_exists("plugins/modules/myAccount.php"))
            {
                include "plugins/modules/myAccount.php";
            } else {
                include "modules/myAccount.php";
            }
        }
        elseif ($values = ProductController::isProd($paths[0]))
        {
            if(file_exists("plugins/modules/productPage.php"))
            {
                include "plugins/modules/productPage.php";
            } else {
                include "modules/productPage.php";
            }
        }
        else {
            include "modules/error404.php";
        }
    } else {
        include "modules/slide.php";
        include "modules/hightlight.php";
    }

/* 
FOOTER    
*/
    include "modules/footer.php";
?>
