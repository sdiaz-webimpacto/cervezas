<?php

$productsPerPage = 2;
$id = CategoryController::getCategoryId($paths[0]);
$cat = CategoryController::getCategory($id);
$products = CategoryController::getProductsInCategory($id, 'id', 'DESC', '0', $productsPerPage);
$parentCat = false;
$productList = CategoryController::getProductList($id, 'id', 'DESC');

if($cat['parent'] !== 0)
{
    $parent = CategoryController::getCategoryNameUrl($cat['parent']);
}

if($cat['banner'] ==! '')
{
    /**
     * BANNER
     */
    echo '
<figure class="banner categoryBanner">
    <img src="'.$pathBack.'/views/img/banner/'.$cat['banner'].'" class="img-responsive" width="100%">
    <div class="bannerText centerText">
        <h1>'.$cat['name'].'</h1>
    </div>
</figure>
';
}

if(!is_array($products))
{
    echo "<div class='container'><div class='col-12 alert alert-danger'>".$products."</div></div>";
} else {
    if($cat['description'] ==! '')
    {
        echo '
        <div class="container">
            <div class="productListDescription">'.$cat['description'].'</div>    
        </div>
        ';
    }
    echo '
    <div class="container-fluid well well-sm productBar">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            ORDENAR POR <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Lo más reciente</a></li>
                            <li><a href="#">Lo más antiguo</a></li>
                        </ul>
                    </div>
                </div>            
                <div class="col-sm-6 productShow">
                    <div class="btn-group pull-right">
                        <button class="btn btn-default btnGrid backColor" id="btnGrid0">
                            <i class="fa fa-th" aria-hidden="true"></i>
                            <span class="col-xs-0 pull-right"> GRID</span>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn btn-default btnList" id="btnList0">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="col-xs-0 pull-right"> LIST</span>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>';
    /**
     * BREADCRUM
     */
    echo '
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb backgroundBreadcrumb lead">
                <li><a href="'.$path.'">INICIO</a></li>';

    if(isset($parent))
    {
        echo '<li><a href="'.$parent['url'].'">'.$parent['name'].'</a></li>';
    }

    echo '<li class="active">'.$cat['name'].'</li>
            </ul>
        </div>
    </div>
</div>
';
    echo '
        <div class="container">
        <ul class="grid grid0">';
        foreach($products as $pr) {
            echo '
            <li class="col-md-3 col-sm-6 col-xs-12 article">
                <figure>
                    <a href="'.$pr['url'].'" class="pixelProduct">
                        <img src="' . $pathBack . $pr['cover'] . '" class="img-responsive">
                    </a>
                </figure>
                <h4>
                <small>
                    <a href="'.$pr['url'].'" class="pixelProduct">
                        ' . $pr['title'];
                        echo '<div class="col-12">';
                        if($pr['new'] == 1){
                            echo '<span class="label label-warning fontSize">Nuevo</span>';
                        } else {
                            echo '<span style="opacity:0">-</span>';
                        }

                        if($pr['offer_discount'] > 0){
                            echo '<span class="label label-warning fontSize">'.$pr['offer_discount'].'%</span>';
                        } else {
                            echo '<span style="opacity:0">-</span>';
                        }

                        echo '</div>
                    </a>
                </small>
                </h4>
                <div class="col-xs-6 price">
                    <h2>';
                    if($pr['offer_price'] != 0)
                    {
                        echo '<small><strong class="oferta">'.$pr['price'].'</strong></small>
                        <small>'.$pr['offer_price'].'</small>';
                    } else {
                        echo '<small > ';
                        if ($pr['price'] <= 0) {
                            echo "GRATIS";
                        } else {
                            echo $pr['price'] . "€";
                        }
                        echo ' </small >';
                    }
                    echo '</h2>
                </div>
                <div class="col-xs-6 links">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs whishList" idProducto="' . $pr['id'] . '" data-toggle="tooltip" title="Agregar a mi lista de deseos">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </button>
                        <a href="'.$pr['url'].'" class="pixelProduct">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </li>';
        }
        echo '</ul>
        <ul class="list list0">';

        foreach($products as $pl) {
            echo '
            <li class="col-xs-12">
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <figure>
                        <a href="'.$pl['url'].'" class="pixelProduct"><img src="'.$pathBack . $pl['cover'].'" class="img-responsive"></a>
                    </figure>
                </div>
                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
                    <h1>
                        <small>
                            <a href="'.$pl['url'].'" class="pixelProduct">'.$pl['title'];
                if($pr['new'] == 1){
                    echo '<span class="label label-warning fontSize">Nuevo</span>';
                }

                if($pr['offer_discount'] > 0){
                    echo '<span class="label label-warning fontSize">'.$pr['offer_discount'].'%</span>';
                }
                echo '</a>
                        </small>
                    </h1>
                    <p class="text-muted">'.$pl['short_description'].'</p>
                    <h2>';

                if($pl['offer_price'] != 0)
                {
                    echo '<small><strong class="oferta">'.$pl['price'].'</strong></small>
                         <small>'.$pl['offer_price'].'</small>';
                } else {
                    echo '<small > ';
                    if ($pl['price'] <= 0) {
                        echo "GRATIS";
                    } else {
                        echo $pl['price'] . "€";
                    }
                    echo ' </small >';
                }

                    echo '</h2>
                    <div class="btn-group pull-left links">
                        <button type="button" class="btn btn-default btn-xs whishList"  idProducto="'.$pl['id'].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </button>
                        <a href="'.$pl['url'].'" class="pixelProduct">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12">
                    <hr>
                </div>
            </li>
                    ';
    }
    echo '</ul></div>';

    /**
     * PAGINATION
     */
    if(count($productList) > 0)
    {
     $pages = ceil(count($productList) / $productsPerPage);
     echo '
     <div class="container text-center">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
     ';

     if($pages <= 4)
     {
         for($i = 1; $i<= $pages; $i++)
         {
             echo '
             <li class="page-item">
                <a class="page-link" href="#">'.$i.'</a>
             </li>
             ';
         }
     } else {
         echo '
         <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
         </li>
         ';

         for($i = 1; $i<= 4; $i++)
         {
             echo '
             <li class="page-item">
                <a class="page-link" href="#">'.$i.'</a>
             </li>
             ';
         }

         if($pages >= 8)
         {
             echo '
             <li class="page-item disabled">
                <a class="page-link" href="#">...</a>
             </li>
             <li class="page-item">
                <a class="page-link" href="#">'.$pages.'</a>
             </li>
             ';
         }

         echo '
         <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
         </li>
         ';
     }

        echo '
            </ul>
          </nav>
     </div>
     ';
    }
}