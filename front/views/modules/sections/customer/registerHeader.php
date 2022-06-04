<?php

class RegisterHeader
{
    public function html()
    {
        $path = Path::getPath();
        if(!isset($_SESSION['id']))
        {
            $html = '<li><a href="#loginModal" data-toggle="modal">Ingresar</a></li>
             <li>|</li>
             <li><a href="#registerModal" data-toggle="modal">Crear una cuenta</a></li>';
        } else {
            $html = '<li class="user"><i class="fa fa-user textBase"></i><a href="'.$path.'myAccount">'.$_SESSION['name'].'</a></li>
             <li>|</li>
             <li><a href="'.$path.'logout"><span class="glyphicon glyphicon-log-out textBase"></span></a></li>';
        }
        return $html;
    }
}
