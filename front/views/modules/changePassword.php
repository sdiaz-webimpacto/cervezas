<?php

if(!empty($paths[1]))
{
    $customer = new CustomerController();
    $user = $customer->customerFromToken($paths[1]);
    if (!empty($user))
    {
        echo '
        <div class="container passwordQuery mt-1">
            <div class="row">
                <div class="alert alert-danger mt-1 mb-1 passQueryMensages"></div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input id="passwordQuery" type="password" class="form-control" name="pass" placeholder="Introduzca su nueva contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input id="passwordQueryConfirmation" type="password" class="form-control" name="passConfirm" placeholder="Confirme la nueva contraseña">
                        </div>
                    </div>
                    <input type="hidden" id="passwordToken" value="'.$paths[1].'">
                    <button class="btn btn-default backColor width25" onclick="passwordQuery()">Cambiar</button>
            </div>
        </div>
        ';
    }
}
