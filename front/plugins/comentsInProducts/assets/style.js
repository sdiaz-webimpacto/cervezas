$(document).ready(action);

function action()
{
changeStars();
}

function changeStars()
{
    if($('#valorationModal .modal-body i').length >= 1)
    {
        $('#val-1').mouseover(function(){
            fullStar('#val-1');
            emptyStar('#val-2');
            emptyStar('#val-3');
            emptyStar('#val-4');
            emptyStar('#val-5');
        });
        $('#val-2').mouseover(function(){
            fullStar('#val-1');
            fullStar('#val-2');
            emptyStar('#val-3');
            emptyStar('#val-4');
            emptyStar('#val-5');
        });
        $('#val-3').mouseover(function(){
            fullStar('#val-1');
            fullStar('#val-2');
            fullStar('#val-3');
            emptyStar('#val-4');
            emptyStar('#val-5');
        });
        $('#val-4').mouseover(function(){
            fullStar('#val-1');
            fullStar('#val-2');
            fullStar('#val-3');
            fullStar('#val-4');
            emptyStar('#val-5');
        });
        $('#val-5').mouseover(function(){
            fullAllStar();
        });
    }
}

function emptyStar(id)
{
    $(id).removeClass('fa-star').addClass('fa-star-o');
}
function fullStar(id)
{
    $(id).removeClass('fa-star-o').addClass('fa-star');
}
function fullAllStar()
{
    $('.fa-star-o').removeClass('fa-star-o').addClass('fa-star');
}

$('.sendValoration').click(function(){
    const star = $('#valorationModal .modal-body i.fa-star').length;
    const commit = $('#textAreaValoration').val();
    const token = Date.now();
    $.ajax({
        url: "../front/plugins/comentsInProducts/ajax/ajax.php",
        method: "POST",
        data: {
            "rating": star,
            "token": token,
            "commit": commit,
            "customer": $('#buttonOpenValorationModal').attr('data-customer-id'),
            "product": $('#buttonOpenValorationModal').attr('data-product-id')
        },
        success: function(response){
            const data = JSON.parse(response);
            if(data === 'ok')
                {

                    swal({
                            title: "¡Muchas gracias!",
                            text: "Se ha publicado su comentario sobre este producto.",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                window.location.href = window.location;
                            }
                        });
                } else {
                swal({
                        title: "¡Error!",
                        text: "No pudo enviar su valoración",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    },
                    function(isConfirm)
                    {
                        if(isConfirm)
                        {
                            window.location.href = window.location;
                        }
                    });

                }
        }
    })
})