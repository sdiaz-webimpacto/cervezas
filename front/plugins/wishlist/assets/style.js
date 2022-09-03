

function ajaxWishList(element)
{
    const user = $("#wishListButton").attr("iduser");
    const product = element;
    const url = $("#wishListButton").attr("data-url");
    $.ajax({
        url : url+'plugins/wishlist/assets/ajax.php',
        data: {user: user,
                product: product},
        type: 'POST',
        dataType : 'json',
        success : function(response) {
            if(response[1] == 'addClass')
            {
                const text = "#wishListButton[idproducto='"+response[0]+"']";
                $(text).addClass('productInWishList');
            } else {
                const text = "#wishListButton[idproducto='"+response[0]+"']";
                $(text).removeClass('productInWishList');
            }
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

