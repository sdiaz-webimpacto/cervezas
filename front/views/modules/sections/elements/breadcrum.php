<?php

class Breadcrum
{
    public static function printBreadcrum($path, $element, $parent = false)
    {
        $optional = '';
        if(!empty($parent))
        {
            $optional = '<li><a href="'.$parent['url'].'">'.$parent['name'].'</a></li>';
        }
        return '
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <ul class="breadcrumb backgroundBreadcrumb lead">
                            <li><a href="'.$path.'">INICIO</a></li>
                            '.$optional.'
                            <li class="active">'.$element.'</li>
                        </ul>
                    </div>
                </div>
            </div>
            ';
    }
}