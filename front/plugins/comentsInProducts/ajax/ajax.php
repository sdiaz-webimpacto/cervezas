<?php

if(file_exists('tools/CustomerTools.php'))
{
    require_once "models/Conn.php";
} else {
    require_once "../../../models/Conn.php";
}

class AjaxValoration
{
    public function ajaxValoration()
    {
        if(isset($_POST['rating']))
        {


            $response = array($_POST['commit'],$_POST['rating']);

            $query = Conn::insert('coment', array('id_user' => $_POST['customer'],
                                                        'id_product' => $_POST['product'],
                                                        'coment' => $_POST['commit'],
                                                        'rating' => $_POST['rating'],
                                                        'date_add' => date('Y-m-d H:i:s')));

            echo json_encode($query);
        }
    }
}

$object = new AjaxValoration();
$object->ajaxValoration();