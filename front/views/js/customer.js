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