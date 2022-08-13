if($('.cart .cartBody').length)
{
    $('.less').click(less);
    $('.more').click(more);
    $('.deleteProductCart').click(productDelete);
}

function less()
{
    const cartId = $('#cartId').val();
    let productId = $(this).attr('data-id');
    let inputId = '#input-'+productId;
    let valSelect = Number($(inputId).val());

    if(valSelect >= 2) {
        ajaxUpgradeQty('less', cartId, productId, valSelect, inputId);
    }
}

function more()
{
    const cartId = $('#cartId').val();
    let productId = $(this).attr('data-id');
    let inputId = '#input-'+productId;
    let valSelect = Number($(inputId).val());

    ajaxUpgradeQty('more', cartId, productId, valSelect, inputId);

}

function productDelete()
{
    const cartId = $('#cartId').val();
    let productId = $(this).attr('data-id');
    ajaxProductDelete(cartId, productId);
    window.location = window.location.href;
}

function ajaxUpgradeQty(operation, cartId, productId, valSelect, inputId)
{
    let value = 'hola';
    $.ajax({
        url: "ajax/cart.ajax.php",
        method: "POST",
        data: {
            "operation": operation,
            "cart_id": cartId,
            "product_id":  productId,
            "qty": valSelect,
            "dateTime": Date.now()
        },
        success: function(response)
        {
            const data = JSON.parse(response);
            if(data.result === 'ok')
            {
                let valItemsInCart = Number($('.itemsInCart').text());
                let valItem = Number($('.priceWithOutSign[data-id="'+productId+'"]').text());
                let valTotalItems = Number($('.totalWithOutSign[data-id="'+productId+'"]').text());
                let valTotal = Number($('.globalWithOutSign').text());

                if(operation === 'less')
                {
                    $(inputId).val(valSelect - 1);
                    $('.itemsInCart').text(valItemsInCart - 1);
                    $('.totalWithOutSign[data-id="'+productId+'"]').text(valTotalItems - valItem);
                    $('.globalWithOutSign').text(valTotal - valItem);
                } else {
                    $(inputId).val(valSelect + 1);
                    $('.itemsInCart').text(valItemsInCart + 1);
                    $('.totalWithOutSign[data-id="'+productId+'"]').text(valTotalItems + valItem);
                    $('.globalWithOutSign').text(valTotal + valItem);
                }
            } else if(data.result === 'Sin stock') {
                swal({
                        title: "¡Lo sentimos!",
                        text: "Lamentablemente no queda más stock de este producto.",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: true
                    });
            }
        }
    });
}

function ajaxProductDelete(cartId, productId)
{
    $.ajax({
        url: "ajax/cart.ajax.php",
        method: "POST",
        data: {
            "delete": productId,
            "cart_id": cartId,
            "dateTime": Date.now()
        },
        success: function(response)
        {
            const data = JSON.parse(response);
            value = data.result;
        }
    })
}