function customerRegister()
{
    const expValName = /^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$/;
    const expValEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    const expValPassword = /^[a-zA-Z0-9]*$/;
    const divAlert = $('.adviceMensages');
    let name = $('#customerName').val();
    let Surname = $('#customerSurname').val();
    let email = $('#customerEmail').val();
    let password = $('#customerPass').val();
    let politicies = $('#customerPolicies:checked').val();

    if(name !== '')
    {
        if(!expValName.test(name))
        {
            $(divAlert).show().html('<b>ERROR</b> El nombre introducido no es correcto.')
            return false;
        }
    } else {
        $(divAlert).show().html('<b>ATENCIÓN</b> Debe introducir su nombre')
        return false;
    }

    if(Surname !== '')
    {
        if(!expValName.test(Surname))
        {
            $(divAlert).show().html('<b>ERROR</b> El apellido introducido no es correcto.')
            return false;
        }
    } else {
        $(divAlert).show().html('<b>ATENCIÓN</b> Debe introducir su apellido')
        return false;
    }

    if(email !== '')
    {
        if(!expValEmail.test(email))
        {
            $(divAlert).show().html('<b>ERROR</b> El email introducido no es correcto.')
            return false;
        }
    } else {
        $(divAlert).show().html('<b>ATENCIÓN</b> Debe introducir su email')
        return false;
    }

    if(password !== '')
    {
        if(!expValPassword.test(password))
        {
            $(divAlert).show().html('<b>ERROR</b>Solo letras y números sin espacios, tildes ni caracteres especiales')
            return false;
        }
    } else {
        $(divAlert).show().html('<b>ATENCIÓN</b> Debe introducir una contraseña')
        return false;
    }

    if(politicies !== 'on')
    {
        $(divAlert).show().html('<b>ATENCIÓN</b> Debe aceptar nuestas condiciones de uso y politicas de privacidad')
        return false;
    }

    return true;
}

function passwordQuery()
{
    const expValPassword = /^[a-zA-Z0-9]*$/;
    const divAlert = $(".passQueryMensages");
    let pass = $("#passwordQuery").val();
    let token = $("#passwordToken").val();
    let confirm = $("#passwordQueryConfirmation").val();
    let activation = true;

    if(pass !== confirm || pass === '')
    {
        $(divAlert).show().html('<b>ATENCIÓN</b> Ambas contraseñas no coinciden');
        activation = false;
    }
    if(!expValPassword.test(pass) || pass === '')
    {
        $(divAlert).show().html('<b>ERROR</b> Soló puede utilizar letras y numeros sin espacios ni tildes')
        activation = false;
    }
    if(activation === true)
    {
        $.ajax({
            url: "../ajax/customer.ajax.php",
            method: "POST",
            data: {
                "pass": pass,
                "token": token
            },
            success: function(response){
                const data = JSON.parse(response)
                console.log(data.url);
                if(data.result === 'ok')
                {
                    swal({
                            title: "¡Perfecto!",
                            text: "Se ha cambiado la contraseña correctamente.",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                window.location.href = data.url+"myAccount/"+data.data;
                            }
                        });
                } else {
                    swal({
                            title: "¡Error!",
                            text: "Algo salió mal durante el proceso de cambio de contraseña.",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                window.location.href = data.url;
                            }
                        });
                }
            }
        })
    }
}