<?php

require_once 'plugins/wishlist/controllers/WihsList.controller.php';
require_once 'plugins/wishlist/views/WishListViews.php';
require_once 'controllers/Product.controller.php';
require_once 'models/Path.php';

class userWishList
{
    public function getWishListProduct($id_customer)
    {
        $products = WishListController::getAllWishListProduct($id_customer);
        echo '
        <div class="col-xs-12">
            <h3>Lista de deseos</h3>
            <ul>
        ';
        foreach ($products as $product)
        {
            $productDatas = ProductController::getProduct($product['id_product']);
            $this->productCromo($productDatas);
        }
        echo '
            </ul>
        </div>
        ';
    }

    protected function productCromo($array)
    {
        $back = Path::getPathBack();
        echo '<li class="col-md-3 col-sm-6 col-xs-12 article">
                <figure>
                    <a href="' . $array['url'] . '" class="pixelProduct">
                        <img src="' . $back . $array['cover'] .'" class="img-responsive">
                    </a>
                </figure>
                <h4>
                <small>
                    <a href="' . $array['url'] . '" class="pixelProduct">
                        ' .$array['title']. '<div class="col-12"><span class="label label-warning fontSize">' .$array['offer_discount']. '%</span></div>
                    </a>
                </small>
                </h4>
                <div class="col-xs-6 price">';
                    if($array['offer_price'] != 0)
                {
                    echo '<small><strong class="oferta">'.$array['price'].'</strong></small>
                         <small>'.$array['offer_price'].'</small>';
                } else {
                    echo '<small > ';
                    if ($array['price'] <= 0) {
                        echo "GRATIS";
                    } else {
                        echo $array['price'] . "€";
                    }
                        echo ' </small >';
                }
                    echo '
                </div>
                <div class="col-xs-6 links">
                    <div class="btn-group pull-right">';
        $template = new WishlistViews();
        $template->wishListProductPageDiv($array['id']);
                    echo '
                        <a href="' .$array['url']. '" class="pixelProduct">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Ver producto">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </li>';
    }
}