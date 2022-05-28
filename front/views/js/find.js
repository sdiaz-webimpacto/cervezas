if($('#buscador').length > 0)
{
    const regExp = /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]*$/;

    $(document).on('keyup',$('#buscador input').val(), function(){
        let findData = $('#buscador input').val();
        if(!regExp.test(findData)) {
            $('#buscador input').val('');
            $('#finder').css({
                'display':'none'
            })
        } else {
            if(findData.length >= 3)
            {
                $.ajax({
                    method: "POST",
                    url:"ajax/find.ajax.php",
                    data: {
                        "value": findData
                    },
                    success: function(response){
                        let array = JSON.parse(response);
                        let html = '<div class="row">';
                        html += '<div class="col-12 close text-right">X</div>';
                        if(array[0]['title'] === undefined)
                        {
                            html += '<div class="container"><h4>No se han obtenido coincidencias.</h4></div>';
                        } else {
                            for(let e = 0;e < array.length;e++)
                            {
                                html += '<div class="article col-xs-6 col-md-4 col-lg-3">' +
                                    '<figure><a href="'+array[0]['url_front']+array[e][3]+'" class="pixelProduct">'+
                                    '<img src="'+array[0]['url_back']+array[e][9]+'" class="img-responsive" width="300px" height="400px">'+
                                    '</a>'+
                                    '</figure>' +
                                    '<a href="'+array[0]['url_front']+array[e][3]+'" class="pixelProduct"><h4 class="text-center"><smal>'+
                                    array[e][5]+
                                    '</smal></h4></a>'+
                                    '</div>';
                            }
                        }
                        html += '</div>';
                        $('#finder').html(html);
                        $('#finder').css({
                            'display':'block'
                        })
                        console.log(array);
                        $('#finder .close').click(function(){
                            $('#finder').hide();
                        })
                    }
                });
            }
        }
    })
}