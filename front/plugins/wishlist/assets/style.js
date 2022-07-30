function redirectToLogin()
{
    $("#loginModal .modal-body").prepend("<div id='alertLoginWishlist' class='alert alert-info'>Debes estar logueado para poder añadir un producto a tu lista de deseos.</div>");
    $("#loginModal").modal("show");
    setTimeout(function(){
        $.when(slideAlertLogin()).then(function(){
            setTimeout(function(){
                $("#alertLoginWishlist").remove();
            },1000)
        });
    },3000)
}

function ajaxWishList(element)
{
    const user = $("#wishListButton").attr("iduser");
    const product = element;
    $.ajax({
        url : 'plugins/wishlist/assets/ajax.php',
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

function slideAlertLogin()
{
    $("#alertLoginWishlist").slideUp();
}