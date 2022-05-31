<?php

if(!empty($paths[1]))
{
    $data = CustomerController::confirmEmail($paths[1]);
    if ($data == 'ok')
    {
        echo '<script>
                        swal({
                        title: "¡Bienvenido!",
                        text: "Ya se ha validado su cuenta.",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        });
                    </script>';
        $session = new CustomerController();
        $customer = $session->login(null,$paths[1]);
    }
}
