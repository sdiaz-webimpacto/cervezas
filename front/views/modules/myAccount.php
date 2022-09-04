<?php

$page = 'myaccount';

if(!empty($paths[1]))
{
    $data = CustomerController::confirmEmail($paths[1]);
    if ($data == 'ok')
    {
        $url = Path::getPath()."myAccount";
        echo '<script>
                        swal({
                        title: "¡Bienvenido!",
                        text: "Ya se ha validado su cuenta.",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                window.location.href = "'.$url.'";
                            }
                        });
                    </script>';
        $session = new CustomerController();
        $customer = $session->login(null,$paths[1]);
    }
}
if(isset($_SESSION['id']))
{

    echo '
    <div class="container">
        <div class="row mt-2 mb-2">
          <a href="'.Path::getPath().'"><i class="fa fa-home"></i> Home</a>  
        </div>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#pedidos"><i class="fa fa-shopping-basket"></i> Mis pedidos</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#datos"><i class="fa fa-user"></i> Mis datos</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#directions"><i class="fa fa-home"></i> Mis direcciones</a>
                </li>';
    if(file_exists("plugins/wishlist/controllers/WihsList.controller.php"))
    {
        echo '
                <li>
                    <a data-toggle="tab" href="#favoritos"><i class="fa fa-star"></i> Mis favoritos</a>
                </li>
        ';
    }
    echo '
            </ul>

            <div class="tab-content">
                <div id="pedidos" class="tab-pane fade in active">
                    ';
    include_once 'sections/customer/userOrders.php';
    echo '
                </div>
                <div id="datos" class="tab-pane fade">
                    ';
    include_once 'sections/customer/userDatas.php';
    echo '
                </div>';
    echo '
                <div id="directions" class="tab-pane fade">
                ';
    include_once 'sections/customer/userDirections.php';
    echo '
                </div>';
    if(file_exists("plugins/wishlist/controllers/WihsList.controller.php"))
    {
        echo '            
                <div id="favoritos" class="tab-pane fade">
                    ';
        include_once 'plugins/wishlist/views/userWishList.php';
        $wishlist = new userWishList();
        $wishlist->getWishListProduct($_SESSION['id']);
        echo '
                </div>';
    }
    echo '
            </div>
        </div>
    </div>
    ';

} else {
    echo "
    <script>
    window.location.href = '".Path::getPath()."';
</script>
    ";
}
