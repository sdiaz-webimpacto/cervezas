<?php

class SlideController
{
    public static function viewSlide(){
        $table = "slider";
        $response = SlideModel::getSlide($table);

        return $response;
    }
}
