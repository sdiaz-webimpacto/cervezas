<?php

$page = 'product';
$id = ProductController::getProductId($values['url']);
$product = ProductController::getProduct($id['id']);
$imgs = explode(',', $product['multimedia']);
$cat = CategoryController::getCategoryNameUrl($product['id_category']);
$numImg = 2;
$numSlider = 2;
$today = date('Y-m-d');
include_once "sections/products/moreInfoProduct.php";
include_once "sections/products/zoom.php";
include_once "sections/addToCart.php";

echo '
<!-- BREADCRUMB -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb backgroundBreadcrumb lead">
                <li><a href="'.$path.'">INICIO</a></li>
                <li><a href="'.$cat['url'].'">'.$cat['name'].'</a></li>
                <li>'.$product['title'].'</li>
            </ul>
        </div>
    </div>
</div>        
';

echo '
<div class="container-fluid productPage">
    <div class="container">
        <div class="row">
            <!-- LEFT COLUMN -->
            <div class="col-md-5 col-sm-6 col-xs-12 visorImg">
            ';

$zoom = new Zoom();
$zoom->zoomImage();

echo '
                <figure class="visor">
                    <img class="img-thumbnail zoom" src="'.$pathBack.$product['cover'].'" alt="img-01">';
                    if($imgs[0] != '')
                    {
                        foreach ($imgs as $image)
                        {
                            echo '
                            <img class="img-thumbnail zoom" src="'.$pathBack.$image.'" alt="img-'.$numImg.'">
                            ';
                            $numImg++;
                        }
                    }
echo '                
                </figure>';
if($imgs[0] != '')
{
    echo '
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img value="1" class="img-thumbnail" src="'.$pathBack.$product['cover'].'" alt="img-1">
                        </li>
    ';
    foreach ($imgs as $image)
    {
        echo '
                        <li>
                            <img value="'.$numSlider.'" class="img-thumbnail" src="'.$pathBack.$image.'" alt="img-'.$numSlider.'">
                        </li>    
                            ';
        $numSlider++;
    }
    echo '
                    </ul>
                </div>
    ';
};
echo '                    
            </div>
            <!-- RIGHT COLUMN -->
            <div class="col-md-7 col-sm-6 col-xs-12 datasProduct">
                <div class="col-12">
                    <div class="productTitleBlock">
                        <h2 class="title text-uppercase">'.$product['title'].'</h2>
                        <h6 class="reference">'.$product['reference'].'</h6>
                    </div>
                    <div class="productPriceBlock">
                        <div class="sticksBlock">';
$generalPrice = '';
$finalPrice = $product['price'].' €';
if($product['offer'] === 1)
{
    $generalPrice = $product['price'].' €';
    $finalPrice = $product['offer_price'].' €';
    echo '<span class="label label-warning fontSize">'.$product['offer_discount'].' %</span>';
}
if($product['new'] === 1)
{
    echo '<span class="label label-warning fontSize">Nuevo</span>';
}
 echo '                </div>
                       <div class="prices">
                           <div class="globalPrice">'.$generalPrice.'</div>
                           <div class="finalPrice">'.$finalPrice.'</div>
                       </div>
                    </div>
                    <div class="shortDescriptionBlock">
                        <p class="shortDescription">'.$product['short_description'].'</p>
                    </div>
                    <div class="deliveryDateBlock">
                        <div class="dateDelivery">
                            <i class="fa fa-clock-o"></i>
                            Compra ya y recibelo el dia '.date('d-m', strtotime($today.' + '.$product['delivery'].' days')).'
                        </div>
                    </div>';
$info = new MoreInfoProduct();
$info->selectors($product['detail']);
$cart = new AddToCart();
$cart->printAddToCart($id['id'], $cart_id, $page);
$info->getMoreInfo($product['description'],$product['detail']);
echo '          </div>
            </div>
        </div>
    </div>
</div>
';
