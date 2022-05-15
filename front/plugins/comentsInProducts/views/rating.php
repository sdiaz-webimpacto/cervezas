<?php

require_once "plugins/comentsInProducts/controllers/ComentsInProductsController.php";
$rating = ComentsInProductsController::getRating($product['id']);

?>

<div class="ratingBlock">
        <?php
        echo $rating;
        ?>
</div>