/*
Change the default address
 */
$('.buttonDfAdd').click(defaultAddress)
function defaultAddress()
{
    const id = $(this).attr('data-id');
    try {
        $.ajax({
            url: "ajax/address.ajax.php",
            method: "POST",
            data: {
                "changeDefaultAddress": true,
                "id": id,
                "dateTime": Date.now()
            },
            success: function(response)
            {
                const data = JSON.parse(response);
                if(data.result === 'ok')
                {
                    window.location.reload();
                }
            }
        })
    } catch (e) {
        console.log('error: '+e);
    }
}

/**
 * New Address
 */
$('#submitEditAddress').click(function(e){
    e.preventDefault();
    newAddress();
});
function newAddress()
{
    let name = $('#addressName').val();
    const address = $('#addressAddress').val();
    const zip = $('#addressZip').val();
    const city = $('#addressCity').val();
    const state = $('#addressState').val();

    if(name === '')
    {
        name = 'Address';
    }

    const nameValidation = testText(name, '#addressName');
    const addressValidation = testText(address, '#addressAddress');
    const addressZip = testText(zip, '#addressZip', true);
    const addressCity = testText(city, '#addressCity');
    const addressState = testText(state, '#addressState', true);

    if(nameValidation && addressValidation && addressZip && addressCity && addressState)
    {
        addressFormValidate()
    }
}

function testText(value, selector, number = false)
{
    let expValName = /^[a-zA-Z0-9 ºª/.,áéíóúÁÉÍÓÚñÑ]*$/;
    if(number)
    {
        expValName = /^[0-9]*$/;
    }
    if(expValName.test(value) && value !== '')
    {
        $(selector).css({'background': 'var(--main-color-white)'});
        return true;
    } else {
        $(selector).css({'background': 'rgba(197,56,26,.5)'});
        return false;
    }
}

function addressFormValidate()
{
    $.ajax({
        url: 'ajax/address.ajax.php',
        method: 'POST',
        data: $('#editAddressForm form').serialize(),
        success: function(response){
            const data = JSON.parse(response);
            console.log(data.result);
            if(data.result === 'ok')
            {
                window.location.reload();
            } else {
                console.log('error al devolver el ajax');
            }
        }
    });
}

if($('.carrierContent').length)
{
 $('.carrierContent').click(carrierUpdate);
}
function carrierUpdate()
{
    const id_carrier = $(this).attr('data-carrier-id');
    const id_cart = $('#carrierCartId').val();
    $.ajax({
        url: 'ajax/cart.ajax.php',
        method: 'POST',
        data: {
            'carrierUpdate':1,
            'id_cart':id_cart,
            'id_carrier':id_carrier
        },
        success: function(response){
            const data = JSON.parse(response);
            console.log(data.result);
            if(data.result === 'ok')
            {
                window.location.reload();
            } else {
                console.log('error al devolver el ajax del carrier');
            }
        }
    });
}

function payCompleted(id_customer, method)
{
    /*const id_cart = $('#carrierCartId').val();
    alert('se pagó correctamente la cesta: '+id_cart+' con el método '+method);
    $.ajax({
        url: 'ajax/checkout.ajax.php',
        method: 'POST',
        data: {
            'orderProcess':1,
            'id_customer':id_customer,
            'id_cart':id_cart,
            'price':,
            'tax':21,
            'id_carrier':id_carrier,
            'id_address':,
            'method': method
        },
        success: function(response){
            const data = JSON.parse(response);
            console.log(data.result);
            if(data.result === 'ok')
            {
                window.location.reload();
            } else {
                console.log('error al devolver el ajax del carrier');
            }
        }
    });*/
}