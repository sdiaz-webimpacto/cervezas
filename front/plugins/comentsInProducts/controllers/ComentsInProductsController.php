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
                                    ".$coment['id_user']."
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
        $valorations = $data['valorations'];
        $rating =      round($data['rating'] / $valorations, 2);    

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

        return $print;
    }
}