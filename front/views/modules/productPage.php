<?php
$id = ProductController::getProductId($values['url']);
$product = ProductController::getProduct($id['id']);
$imgs = explode(',', $product['multimedia']);
$cat = CategoryController::getCategoryNameUrl($product['id_category']);
$numImg = 2;
$numSlider = 2;

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
            
            </div>
        </div>
    </div>
</div>
';
