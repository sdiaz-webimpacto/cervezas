<?php

class CustomerController
{
    public function newCustomer()
    {
        if(isset($_POST['customerName']))
        {
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['customerName']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['customerSurname']) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['customerEmail']) &&
                preg_match('/^[a-zA-Z09]+$/', $_POST['customerPass'])
            )
            {

            } else {
                echo '<script>
                        swal({
                        title: "¡Error!",
                        text: "No se permiten caracteres especiales.",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                history.back();
                            }
                        });
                    </script>';
            }
        }
    }
}
