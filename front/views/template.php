<?php

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
        if(CategoryController::isCat($paths[0]))
        {
            include "modules/products.php";
        } else {
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
