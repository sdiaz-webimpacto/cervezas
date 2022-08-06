<?php

require_once dirname(__FILE__).'\sections\elements\breadcrum.php';

$breadcrumb = Breadcrum::printBreadcrum($path, 'cart');

echo $breadcrumb.'
    <div class="container-fluid cart">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading cartHeader">
                    <div class="col-md-6 col-sm-7 col-xs-12 text-center">
                        <h3><small>Producto</small></h3>
                    </div>
                    <div class="col-md-2 col-sm-1 col-xs-0 text-center">
                        <h3><small>Precio</small></h3>
                    </div>
                    <div class="col-md-2 col-xs-0 text-center">
                        <h3><small>Cantidad</small></h3>
                    </div>
                    <div class="col-md-2 col-xs-0 text-center">
                        <h3><small>Subtotal</small></h3>
                    </div>
                </div>
                <div class="panel-body cartBody">
                
                    <div class="row cartItem">
                        <div class="col-sm-1 col-xs-12">
                            <button class="btn btn-default backColor deleteProductCart">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="col-sm-1 col-xs-12">
                            <figure>
                                <img class="img-thumbnail" src="'.$pathBack.'views/img/products/bidasoa.jpg" alt="bidasoa">
                            </figure>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p class="cartTitleProduct text-left">Cerveza bidasoa</p>
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-12 textInMidle">
                            <p class="cartPrice">10€</p>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-12 textInMidle">
                            <div class="col-xs-6 col-sm-12">
                                <input type="number" class="form-control text-center" min="1" value="1">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-12 textInMidle">
                            <p class="cartSubtotal"><b>20€</b></p>
                        </div>
                    </div><hr class="mb-0">
                    
                    <div class="row cartItem">
                        <div class="col-sm-1 col-xs-12">
                            <button class="btn btn-default backColor deleteProductCart">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="col-sm-1 col-xs-12">
                            <figure>
                                <img class="img-thumbnail" src="'.$pathBack.'views/img/products/catrina.jpg" alt="bidasoa">
                            </figure>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <p class="cartTitleProduct text-left">Cerveza Catrina</p>
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-12 textInMidle">
                            <p class="cartPrice">3€</p>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-12 textInMidle">
                            <div class="col-xs-6 col-sm-12">
                                <input type="number" class="form-control text-center" min="1" value="1">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-12 textInMidle">
                            <p class="cartSubtotal"><b>3€</b></p>
                        </div>
                    </div><hr class="mb-0">      
                    
                    <div class="panel-body confirmCart">
                        <div class="col-md-4 col-sm-6 col-xs-12 pull-right well">
                            <div class="col-xs-6">
                                <h4>Total:</h4>
                            </div>
                            <div class="col-xs-6">
                                <h4><b>23€</b></h4>
                            </div>
                        </div>
                    </div>      
                    
                    <div class="panel-heading checkoutHeader">
                        <button class="btn btn-defaiult backColor btn-lg pull-right mb-1">PAGAR</button>
                    </div>   
                    
                </div>
            </div>
        </div>
    </div>
';