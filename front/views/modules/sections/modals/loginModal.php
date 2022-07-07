<?php
$auth = new CustomerController();
$auth->auth();
?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header backColor borderTopR">
                <h5 class="col-xs-11 modal-title titleWhite" id="exampleModalLongTitle">Ingresar</h5>
                <button type="button" class="col-xs-1 close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--<div class="col-xs-12 mb-1">
                    <div class="col-xs-12 col-sm-6 padBasic">
                        <button id="btnFacebook" class="facebook borderR width100">
                            <p class="textInMidle"><i class="fa fa-facebook mr-1"></i>
                                Login Facebook
                            </p>
                        </button>
                    </div>
                    <div class="col-xs-12 col-sm-6 padBasic">
                        <button id="btnGoogle" class="google borderR width100">
                            <p class="textInMidle"><i class="fa fa-google mr-1"></i>
                                Login Google</p>
                        </button>
                    </div>
                </div>-->
                <div class="form">
                    <form method="post" action="" class="mt-1">
                        <hr>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                                <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="textInMidle"><a href="#passwordModal" data-dismiss="modal" data-toggle="modal">¿Has olvidao la conraseña?</a></div>
                        <input type="submit" id="login" class="btn btn-default btn-block backColor" value="ACCEDER">
                    </form>
                </div>
                <div class="alert alert-danger mt-1 mb-1 loginMensages"></div>
            </div>
            <div class="modal-footer">
                ¿Aún no tienes una cuenta? | <strong><a href="#registerModal" data-dismiss="modal" data-toggle="modal">Crear una</a></strong>
            </div>
        </div>
    </div>
</div>
