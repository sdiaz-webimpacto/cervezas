<?php

require_once 'tools/CustomerTools.php';

class CustomerController
{
    public function newCustomer()
    {
        if(isset($_POST['customerName']))
        {
            $flag = true;
            if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST['customerName']))
            {
                echo '<script>
                        swal({
                        title: "¡Error!",
                        text: "Error en el nombre de pila.",
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
                $flag = false;
            }
                if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST['customerSurname']))
                {
                    echo '<script>
                        swal({
                        title: "¡Error!",
                        text: "Error en el apellido.",
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
                    $flag = false;
                }
                if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['customerEmail']))
                {
                    echo '<script>
                        swal({
                        title: "¡Error!",
                        text: "Error en email.",
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
                    $flag = false;
                }
                if(!preg_match('/^[a-zA-Z0-9]*$/', $_POST['customerPass']))
                {
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
                    $flag = false;
                }
            if($flag)
            {
                $data = array(
                    'name' => $_POST['customerName'],
                    'surname' => $_POST['customerSurname'],
                    'email' => $_POST['customerEmail'],
                    'password' => CustomerTools::encryptation($_POST['customerName'])
                );
                $isRegistered = CustomerModel::isCustomer($data['email']);
                if(!empty($isRegistered))
                {
                    echo '<script>
                        swal({
                        title: "¡Error!",
                        text: "Ya hay un usuario registrado con ese email",
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
                } else {
                    $insert = CustomerModel::customer($data);
                    if ($insert == 'ok')
                    {
                        echo '<script>
                        swal({
                        title: "¡Bienvenido!",
                        text: "Ya se ha creado su cuenta de usuario. Debe verificarla mediante un email que se ha enviado a su cuenta '.$data['email'].'. También revise su carpeta de spam.",
                        type: "success",
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
    }
}
