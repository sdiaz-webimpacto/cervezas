<?php

require_once "plugins/comentsInProducts/models/ComentsInProductsModel.php";

class ComentsInProductsController
{
    public static function getAllComents($id_product, $limit = null)
    {
        return ComentsInProductsModel::getAllComents($id_product, $limit);
    }

    public static function printRows($id_product, $limit = null)
    {
        $print = '';
        $coments = self::getAllComents($id_product, $limit);
        if(!empty($coments))
        {
            foreach ($coments as $coment)
            {
                $goldStar = $coment['rating'];
                $grayStar = 5 - $goldStar;
                $print .=   "<div class='col-xs-12 subBlockRow'>
                                <span class='col-xs-6 subBlockTitle'>
                                    ".$coment['name']."
                                </span>
                                <span class='col-xs-6 subBlockStars'>";
                        
                for($i = 1; $i <= $goldStar; $i++)
                {
                    $print .= "<i class='fa fa-star goldStar'></i>";
                }
                for($i = 1; $i <= $grayStar; $i++)
                {
                    $print .= "<i class='fa fa-star grayStar'></i>";
                }

                $print .=       "</span>
                            </div>";
                $print .=   "<span class='subBlockText'>
                                ".$coment['coment']."
                            </span>
                            <hr>";
            }
        } else {
            $print .= "<span class='subBlockInfo'>Aún no hay valoraciones para este producto</span>";
        }

        return $print;
    }

    public static function getRating($id_product)
    {
        $data = ComentsInProductsModel::getRating($id_product);
        if(!empty($data['rating']))
        {
            $valorations = $data['valorations'];
            $rating =      number_format(round($data['rating'] / $valorations, 2),2);

            $stars = explode('.',$rating);
            if(!empty($stars))
            {
                $goldStar = $stars[0];
                if(isset($stars[1]))
                {
                    $partialStar = $stars[1];
                    $grayStar = 5 - ($goldStar + 1);
                } else {
                    $partialStar = null;
                    $grayStar = 5 - $goldStar;
                }
            }

            $print = '';
            for($i = 1; $i <= $goldStar; $i++)
            {
                $print .= "<i class='fa fa-star goldStar'></i>";
            }
            if(!empty($partialStar))
            {
                $print .= "<span style='                    
            background:-moz-linear-gradient(to right, gold ".$partialStar."%,gray ".$partialStar."%); 
            background: -webkit-linear-gradient(to right, gold ".$partialStar."%,gray ".$partialStar."%); 
            background: linear-gradient(to right, gold ".$partialStar."%,gray ".$partialStar."%);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color:transparent;
        '><i class='fa fa-star'></i></span>";
            }
            for($i = 1; $i <= $grayStar; $i++)
            {
                $print .= "<i class='fa fa-star grayStar'></i>";
            }
            $print .= "(".$valorations.")";
            if(isset($_SESSION['id']))
            {
                $valorations = ComentsInProductsModel::existValoration($id_product,CustomerController::isLogged());
            }
            if(isset($valorations['valorations']) && $valorations['valorations'] >= 1)
            {
                $print .= "<div>Muchas gracias por su valoración sobre este producto.</div>";
            }
            if(CustomerController::isLogged() && $valorations['valorations'] === 0) {
                $print .= "<small class='ml-1'>
                    <button id='buttonOpenValorationModal' type='button' class='backColor' data-toggle='modal' data-target='#valorationModal' data-product-id='" . $id_product . "' data-customer-id='" . CustomerController::isLogged() . "'>
                        Valorar
                    </button>
                </small>
                <!-- Modal -->
                <div class='modal fade' id='valorationModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header backColor'>
                                <h5 class='textBase' id='exampleModalLabel'>Valora este producto
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </h5>
                            </div>
                            <div class='modal-body'>
                                <h2 class='text-center'>
                                    <i id='val-1' class='fa fa-star goldStar'></i>
                                    <i id='val-2' class='fa fa-star goldStar'></i>
                                    <i id='val-3' class='fa fa-star goldStar'></i>
                                    <i id='val-4' class='fa fa-star goldStar'></i>
                                    <i id='val-5' class='fa fa-star goldStar'></i>
                                </h2>      
                                <div class='text-center'>
                                    <textarea id='textAreaValoration' placeholder='Dejanos tu comentario ;)' cols='40' rows='10'></textarea>       
                                </div>                                           
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary sendValoration'>Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            return $print;
        }
        return '';
    }
}