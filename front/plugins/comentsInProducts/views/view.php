<?php

require_once "plugins/comentsInProducts/controllers/ComentsInProductsController.php";
$coments = ComentsInProductsController::printRows($product['id']);

?>

<div class="dropbox col-12" type="button" data-toggle="collapse" data-target="#coments" aria-expanded="false" aria-controls="coments">
    Valoraciones
    <i class="fa fa-angle-down"></i>
</div>
<div class="collapse" id="coments">
    <div class="card card-body">
        <?php
        echo $coments;
        ?>
    </div>
</div>