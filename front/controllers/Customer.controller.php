<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'tools/CustomerTools.php';

class CustomerController
{
    public function newCustomer()
    {
        date_default_timezone_set("Europe/Madrid");
        $path = Path::getPath();
        $mail = new PHPMailer;
        if(isset($_POST['customerName']))
        {
            $mailCrypt = md5($_POST['customerEmail']);
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
                    'password' => CustomerTools::encryptation($_POST['customerName']),
                    'token' => $mailCrypt
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
                        $mail->CharSet = 'UTF-8';
                        $mail->isMail();
                        $mail->setFrom('santidiazto@gmail.com', 'Santi');
                        $mail->addReplyTo('santidiazto@gmail.com', 'Santi');
                        $mail->Subject = "Por favor verifique su dirección de correo electrónico";
                        $mail->addAddress($_POST['customerEmail']);
                        $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">						
						<center>							
							<img style="padding:20px; width:10%" src="http://tutorialesatualcance.com/tienda/logo.png">
						</center>
						<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">						
							<center>							
							<img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">
							<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
							<hr style="border:1px solid #ccc; width:80%">
							<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de Tienda Virtual, debe confirmar su dirección de correo electrónico</h4>
							<a href="'.$path.'/'.$mailCrypt.'" target="_blank" style="text-decoration:none">
							<div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>
							</a>
							<br>
							<hr style="border:1px solid #ccc; width:80%">
							<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
							</center>
						</div>
					</div>');

                        $sendMail = $mail->Send();
                        if(!$sendMail)
                        {
                            echo '<script>
                        swal({
                        title: "¡Error!",
                        text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$data["customerEmail"].$mail->ErrorInfo.'!",
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

    public static function confirmEmail($token)
    {
        $array = array('validation' => 1);
        $where = 'token = "'.$token.'"';
        $update = CustomerModel::confirmMail($array, $where);
        return $update;
    }

    public function login($id = null, $token = null)
    {
        if($id === null && $token !== null)
        {
            $object = new CustomerModel();
            $id = $object->tokenTransform($token);
        }
        $customer = false;
        $datas = $this->getCustomeDatas($id);
        if($datas)
        {
            $customer = array(
                'id' => $_SESSION['id'] = $datas['id'],
                'name' => $_SESSION['name'] = $datas['name'],
                'surname' => $_SESSION['surname'] = $datas['surname']
            );
        }
        if(!empty($customer))
        {
            return $customer;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }

    protected function getCustomeDatas($id)
    {
        $datas = CustomerModel::getUser($id);
        return $datas;
    }
}
