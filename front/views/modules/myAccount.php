<?php

if(!empty($paths[1]))
{
    $data = CustomerController::confirmEmail($paths[1]);
    if ($data == 'ok')
    {
        $url = Path::getPath()."myAccount";
        echo '<script>
                        swal({
                        title: "¡Bienvenido!",
                        text: "Ya se ha validado su cuenta.",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                window.location.href = "'.$url.'";
                            }
                        });
                    </script>';
        $session = new CustomerController();
        $customer = $session->login(null,$paths[1]);
    }
}
