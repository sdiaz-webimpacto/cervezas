<?php
$password = new CustomerController();
$password->passwordQuery();
?>
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header backColor borderTopR">
                <h5 class="col-xs-11 modal-title titleWhite" id="exampleModalLongTitle">Recuperar contraseña</h5>
                <button type="button" class="col-xs-1 close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form method="post" action="" class="mt-1">
                        <hr>
                        <label for="passwordEmail">Introduce el email con el que creaste la cuenta.</label>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                <input type="email" class="form-control" id="passwordEmail" name="passwordEmail" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default btn-block backColor" value="ACCEDER">
                    </form>
                </div>
                <div class="alert alert-danger mt-1 mb-1 passwordMensages"></div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>