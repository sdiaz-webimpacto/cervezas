<?php
$register = new CustomerController();
$register->newCustomer();
?>
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header backColor borderTopR">
                <h5 class="col-xs-11 modal-title titleWhite" id="exampleModalLongTitle">Registrarse</h5>
                <button type="button" class="col-xs-1 close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 mb-1">
                    <div class="col-xs-12 col-sm-6 padBasic">
                        <button id="btnFacebook" class="facebook borderR width100">
                            <p class="textInMidle"><i class="fa fa-facebook mr-1"></i>
                                Registro con Facebook
                            </p>
                        </button>
                    </div>
                    <div class="col-xs-12 col-sm-6 padBasic">
                        <button id="btnGoogle" class="google borderR width100">
                            <p class="textInMidle"><i class="fa fa-google mr-1"></i>
                                Registro con Google</p>
                        </button>
                    </div>
                </div>
                <div class="form">
                    <form method="post" class="mt-1">
                        <hr>
                        <div class="form-group">git
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                                <input type="text" class="form-control" id="customerSurname" name="customerSurname" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                <input type="email" class="form-control" id="customerEmail" name="customerEmail" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                                <input type="password" class="form-control" id="customerPass" name="customerPass" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="customerPolicies" type="checkbox">
                            <small>Al registrarse, acepta nuestras condiciones y politicas de privacidad.</small>
                        </div>
                        <input type="submit" class="btn btn-default btn-block backColor" value="ENVIAR">
                    </form>
                </div>
                <div class="alert alert-danger mt-1 mb-1 adviceMensages"></div>
            </div>
            <div class="modal-footer">
                ¿Ya tienes cuenta? | <strong><a href="#modalLogin" data-dismiss="modal" data-toggle="modal">Acceder</a></strong>
            </div>
        </div>
    </div>
</div>
