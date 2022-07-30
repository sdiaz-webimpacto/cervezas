<?php

require_once 'plugins/wishlist/controllers/WihsList.controller.php';
require_once 'models/Path.php';

class WishlistViews
{
    public function wishListProductPageDiv($id_product)
    {
        $verify = WishListController::verifyLogin();
        if(!empty($verify))
        {
            $productInWishList = WishListController::isInWishList($id_product, $verify);
            if(!empty($productInWishList))
            {
                $addClass = 'productInWishList';
            } else {
                $addClass = '';
            }
            $onclick = "ajaxWishList(".$id_product.")";
            $user = "idUser='" . $verify . "'";
        } else {
            $onclick = "redirectToLogin()";
            $user = '';
        }
        echo '
            <button id="wishListButton" type="button" class="btn btn-default btn-xs whishList '.$addClass.'" idProducto="' . $id_product . '" 
            data-toggle="tooltip" data-url="'.Path::getPath().'" title="Agregar a mi lista de deseos" onclick="' . $onclick . '" '. $user .'>
                <i class="fa fa-heart" aria-hidden="true"></i>
            </button>';
    }
}
