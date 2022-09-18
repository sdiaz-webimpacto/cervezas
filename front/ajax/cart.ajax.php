<?php

if(file_exists('tools/CustomerTools.php'))
{
    require_once "models/Conn.php";
    require_once "controllers/Stock.controller.php";
    require_once "models/Stock.model.php";
    require_once "models/Cart.model.php";
    require_once "controllers/Cart.controller.php";
} else {
    require_once "../models/Conn.php";
    require_once "../controllers/Stock.controller.php";
    require_once "../models/Stock.model.php";
    require_once "../models/Cart.model.php";
    require_once "../controllers/Cart.controller.php";
}

class AjaxCart
{
    public function ajaxUpdateQty()
    {
        if(isset($_POST['operation']))
        {
            $qtyInit = $_POST['qty'];
            $qty = $qtyInit + 1;
            if($_POST['operation'] === 'less')
            {
                $qty = $qtyInit - 1;
            }

            $stock = new StockController();
            $revision = $stock->hasStock($_POST['product_id']);

            if($_POST['operation'] === 'more')
            {
                if($revision && ($revision['qty'] - $revision['reserved']) >= $qty)
                {
                    $update = array('qty' => $qty);
                    $where = 'id_cart = '.$_POST['cart_id'].' AND id_product = '.(int)$_POST['product_id'];
                    $result = Conn::update('cart_product', $update, $where);
                    if($result === 'ok')
                    {
                        $stock->reserveStock((int)$_POST['product_id'], ($revision['reserved'] + 1));
                    }
                } else {
                    $result = 'Sin stock';
                }
            } else {
                $update = array('qty' => $qty);
                $where = 'id_cart = '.$_POST['cart_id'].' AND id_product = '.(int)$_POST['product_id'];
                $result = Conn::update('cart_product', $update, $where);
                if($result === 'ok')
                {
                    $stock->reserveStock((int)$_POST['product_id'], ($revision['reserved'] - 1));
                }
            }


            $response = array(
                "result" => $result,
            );
            echo json_encode($response);
        }
    }

    public function deleteProduct()
    {
        if(isset($_POST['delete']))
        {
            $product = $_POST['delete'];
            $cart = $_POST['cart_id'];

            $stock = new StockController();
            $revision = $stock->hasStock($product);

            $whereShow = 'id_cart = '.$cart.' AND id_product = '.$product;
            $showInTable = Conn::select('cart_product', 'id, qty', $whereShow);

            $and = $product.' AND id_cart = '.$cart;
            $result = Conn::delete('cart_product', 'id_product', $and);
            if ($result === 'ok')
            {
                $stock->reserveStock($product, ($revision['reserved'] - $showInTable['qty']));
            }
            $response = array(
                "result" => $result
            );

            echo json_encode($response);
        }
    }

    public function ajaxAddToCart()
    {
        if(isset($_POST['addToCart']))
        {
            $stock = new StockController();
            $revision = $stock->hasStock($_POST['product']);

            $product = $_POST['product'];
            $cart = $_POST['cart'];
            $qty = $_POST['qty'];
            $productName = '';

            $whereShow = 'a.id_cart = '.$cart.' AND a.id_product = '.$product;
            $showInTable = Conn::select('cart_product a LEFT JOIN product b ON (a.id_product = b.id)', 'a.id as id, a.qty as qty, b.title as title', $whereShow);

            if(!empty($showInTable))
            {
                $newQty = array('qty' => $showInTable['qty'] + $qty);
                $newWhere = 'id = '.$showInTable['id'];
                $result = 'No se pudo actualizar la cantidad del producto';
                $query = Conn::update('cart_product', $newQty, $newWhere);
                $productName = $showInTable['title'];
                if($query == 'ok')
                {
                    $reservedStok = $stock->reserveStock($product, ($revision['reserved'] + $qty));
                    $result = 'ok';
                }
            } else {
                $query = CartController::insertProductInCart($product, $cart, $qty);
                $result = "No se pudo añadir el producto a la cesta";
                if($query == 'ok')
                {
                    $reservedStok = $stock->reserveStock($product, ($revision['reserved'] + $qty));
                    $result = 'ok';
                }
            }
            $response = array(
                "result" => $result,
                "qty" => $qty,
                "productName" => $productName
            );

            echo json_encode($response);
        }
    }

    public function updateCarrier()
    {
        if($_POST && isset($_POST['carrierUpdate']))
        {
            $result = CartController::updateCarrier($_POST['id_cart'], $_POST['id_carrier']);
            $response = array(
                "result" => $result
            );

            echo json_encode($response);
        }
    }
}

$object = new AjaxCart();
$object->ajaxUpdateQty();
$object->deleteProduct();
$object->ajaxAddToCart();
$object->updateCarrier();
