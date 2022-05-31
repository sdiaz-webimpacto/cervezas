<?php

class RegisterHeader
{
    public function html()
    {
        $path = Path::getPath();
        if(!isset($_SESSION['id']))
        {
            $html = '<li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
             <li>|</li>
             <li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>';
        } else {
            $html = '<li class="user"><i class="fa fa-user titleBase"></i><a href="'.$path.'myAccount">'.$_SESSION['name'].'</a></li>
             <li>|</li>
             <li><a href="'.$path.'logout"><span class="glyphicon glyphicon-log-out titleBase"></span></a></li>';
        }
        return $html;
    }
}
