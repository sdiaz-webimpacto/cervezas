<?php

$socials = TemplateController::TemplateStyleController();
$social = $socials[1];
require_once "views/modules/sections/customer/registerHeader.php";

// Cart options
$cart = new CartController();
$qtyInCart = 0;
if($_SESSION && isset($_SESSION['id']))
{
    if(isset($_SESSION['id_cart']))
    {
        $showProductInGuestCart = $cart->getAllItemsCart($_SESSION['id_cart']);
        if($showProductInGuestCart >= 1)
        {
            $cart->passGuestToCustomerCart($_SESSION['id_cart'], $_SESSION['id']);
            unset($_SESSION['id_cart']);
            $cart_id = $cart->getCart($_SESSION['id']);
            $qtyInCart = $cart->getAllItemsCart($cart_id);
        } else {
            unset($_SESSION['id_cart']);
            $cart_id = $cart->getCart($_SESSION['id']);
            $qtyInCart = $cart->getAllItemsCart($cart_id);
        }
    } else {
        $cart_id = $cart->getCart($_SESSION['id']);
        $qtyInCart = $cart->getAllItemsCart($cart_id);
    }

} else {
    $remoteIp = $_SERVER['REMOTE_ADDR'];
    if($_SERVER['SERVER_NAME'] == 'localhost')
    {
    $remoteIp = '127.0.0.1';
    }
    $id_guest = GuestController::getGuest($remoteIp);
    $cart_id = $cart->getCart(false, $id_guest['id']);
    $qtyInCart = $cart->getAllItemsCart($cart_id);
    $_SESSION['id_cart'] = $cart_id;
}
//End cart options

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.', user-scalable=no">
    <meta name="title" content="Cervezas y más">
    <meta name="description" content="cervezas artesanales de todas las partes del mundo">
    <meta name="keyword" content="cerveza,artesanal,mundo">

    <?php
        $path = Path::getPath();
        $pathBack = Path::getPathBack();
    ?>

    <title>Cervezas y más</title>

    <link rel="stylesheet" href="<?php echo $path;?>views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/plugins/flexslider.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/plugins/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="<?php echo $path;?>views/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/header.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/slider.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/products.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/category.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/productPage.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/cart.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/checkout.css">
    <link rel="stylesheet" href="<?php echo $path;?>views/css/myaccount.css">
    <?php
        include "plugins/pluginsStyle.php";
    ?>

    <link rel="icon" type="image/jpg" href="<?php echo $pathBack;?><?php echo $socials[0][0]['favicon'] ?>"/>

    <script src="<?php echo $path;?>views/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $path;?>views/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $path;?>views/js/plugins/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const path = "<?php echo $path; ?>";
        const user = "<?php echo $_SESSION['id'];?>";
    </script>

</head>
<body>
<!-- TOP -->
<div id="top" class="container-fluid topBar">
    <div class="container">
        <div class="row">
            <!-- SOCIAL -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
                <ul>
                    <?php

                    foreach ($social as $s)
                        {
                            echo "
                            <li>
                            <a href=".$s['url']." target='_blank'>
                            <i class='fa ".$s['logo']." redSocial ".$s['class']."' aria-hidden='true'></i>
                            </a>
                            </li>
                            ";
                        }

                    ?>
                </ul>
            </div>
            <!--REGISTRO-->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
                <ul>
                    <?php
                    $registerHeader = new RegisterHeader();
                    echo $registerHeader->html();
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="container-fluid">
    <div class="container">
        <div id ="header" class="row d-flex flex-sm-column flex-md-row">
            <!-- LOGO -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
                <a href="<?php echo $path;?>">
                    <img src="<?php echo $pathBack;?><?php echo $socials[0][0]['logo'] ?>" class="img-responsive">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <!-- BOTON CATEGORIAS -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">
                    <p clas="tBlack">CATEGORÍAS
                        <span class="pull-right">
                        <i class="fa fa-align-justify"></i>
						</span>
                    </p>
                </div>
                <!-- BUSCADOR -->
                <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="buscador">
                    <input type="search" name="buscar" class="form-control tBlack" placeholder="Buscar...">
                    <span class="input-group-btn">
						<a href="#">
							<button class="btn btn-default backColor" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</a>
					</span>
                </div>
            </div>
            <!-- CARRITO -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
                <a href="<?php echo $path;?>cart">
                    <button class="btn btn-default pull-left backColor">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                </a>
                <div class="itemsInCart">
                    <?php echo $qtyInCart; ?>
                </div>
            </div>
        </div>
        <!-- CATEGORÍAS -->
        <div class="col-xs-12 backColor" id="categorias">            
        <?php
            $mainCat = CategoryController::getCategories('main');
            $mainSub = CategoryController::getCategories('sub');
    
            foreach ($mainCat as $main)
            {
                echo '
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <h4>
                    <a href="'.$path.$main['url'].'" class="pixelCategorias">'.$main['name'].'</a>
                </h4>
                <hr>
                <ul>
                    ';
                foreach ($mainSub as $sub)
                {
                    if($sub['parent'] === $main['id'])
                    {
                        echo '<li><a href="'.$path.$sub['url'].'" class="pixelSubCategorias">'.$sub['name'].'</a></li>';
                    }
                }
                echo '
                </ul>
                </div>
                ';
            }
        ?>
        </div>
    </div>
</header>
<div id="finder" class="container"></div>