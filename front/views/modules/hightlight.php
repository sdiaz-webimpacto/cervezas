<!--
BANNER
-->
<figure class="banner">
    <img src="<?php echo $pathBack;?>/views/img/banner/default.jpg" class="img-responsive" width="100%">
    <div class="bannerText rightText">
        <h1 style="color:#fff">OFERTAS ESPECIALES</h1>
        <h3 style="color:#fff">Subtitulo</h3>
        <p style="color:#fff">Texto del banner de ofertas especiales</p>
    </div>
</figure>

<?php
    $modules = array(
            array('title' => 'Artículos gratuitos', 'url' => 'free-articles', 'value' => 'price', 'type' => 'ASC'),
            array('title' => 'Lo más vendido', 'url' => 'most-sales', 'value' => 'sales', 'type' => 'DESC'),
            array('title' => 'Lo más visto', 'url' => 'most-view', 'value' => 'views', 'type' => 'DESC')
    );

    for($i = 0; $i < count($modules); $i++)
    {
        echo '
        <div class="container-fluid well well-sm productBar">
            <div class="container">
            <div class="row">
                <div class="col-xs-12 productShow">
                    <div class="btn-group pull-right">
                        <button class="btn btn-default btnGrid backColor" id="btnGrid'.$i.'">
                            <i class="fa fa-th" aria-hidden="true"></i>
                            <span class="col-xs-0 pull-right"> GRID</span>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn btn-default btnList" id="btnList'.$i.'">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="col-xs-0 pull-right"> LIST</span>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
        <div class="container-fluid products">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 highLightTitle">
                        <div class="col-sm-6 col-xs-12">
                            <h1><small>'.$modules[$i]['title'].'</small></h1>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="'.$modules[$i]['url'].'">
                                <button class="btn btn-default backColor pull-right">
                                    VER MÁS <span class="fa fa-chevron-right"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
                <ul class="grid grid'.$i.'">';

                $productsGrid = ProductController::getProductsMost($modules[$i]['value'], $modules[$i]['type']);
                foreach($productsGrid as $pr) {
                    echo '
                    <li class="col-md-3 col-sm-6 col-xs-12">
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

                                echo '</div></a>
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
                                <a href="#" class="pixelProduct">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>';
                }

                echo '</ul>
                <ul class="list list'.$i.'">';

                foreach($productsGrid as $pl) {
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
            echo '</ul>
            </div>
        </div>
        ';
    }
?>