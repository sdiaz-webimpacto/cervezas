<?php
    $getOrders = new OrdersController();
    $orders = $getOrders->getOrderForCustomer($_SESSION['id']);
    echo '
    <div class="col-xs-12">
    <h3>Últimos pedidos</h3>
    <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%">               
                     <tr>
                        <th>Pedido</th>
                        <th>Precio (sin impuestos ni envío)</th>
                        <th>Estado</th>
                        <th>Método de pago</th>
                        <th>Productos y cantidad</th>
                        <th>Fecha</th>
                     </tr>                    
    ';
    foreach ($orders as $order)
    {
        $products = explode(',',$order['product']);
        echo '
     
                    
                     <tr>
                         <td>'.$order['id_order'].'</td>
                         <td>'.$order['price'].'€</td>
                         <td>'.$order['status'].'</td>
                         <td>'.$order['pay_method'].'</td><td>';
                        foreach($products as $product)
                        {
                            echo $product."<br>";
                        }
                         echo '</td><td>'.date("d-m-Y",strtotime($order["date_add"])).'</td>
                     </tr>
                    
               
        ';
    }
    echo '</table>
            </div>
        </div>
        </div>';

