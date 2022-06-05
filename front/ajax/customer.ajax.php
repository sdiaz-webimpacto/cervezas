<?php

if(file_exists('tools/CustomerTools.php'))
{
    require_once "tools/CustomerTools.php";
    require_once "models/Conn.php";
    require_once "models/Path.php";
} else {
    require_once "../tools/CustomerTools.php";
    require_once "../models/Conn.php";
    require_once "../models/Path.php";
}

class AjaxPassQuery
{
    public function ajaxPassQuery()
    {
        if(isset($_POST['pass']))
        {
            $pass = CustomerTools::encryptation($_POST['pass']);
            $token = $_POST['token'];
            $array = array('password' => $pass);
            $where = 'token = "'.$token.'"';
            $action = Conn::update('customer', $array, $where);
            $response = array("result" => $action,
                "data" => $token,
                "url" => Path::getPath());

            echo json_encode($response);
        }
    }
}

$object = new AjaxPassQuery();
$object->ajaxPassQuery();