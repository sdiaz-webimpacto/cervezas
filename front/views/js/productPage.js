if($('.flexslider').length > 0)
{

    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5
    });

    $('.flexslider ul li img').click(function(){
        let index = $(this).attr("value");
        $('.productPage figure.visor img').hide();
        $('.productPage figure.visor img:nth-child('+index+')').show();
    })

    if($('.dropbox').length > 0)
    {
        $('.dropbox').click(function(){
            if($(this).attr('aria-expanded') == "true")
            {
                $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                $(this).css({
                    'box-shadow': 'none'
                })
            } else {
                $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
                $(this).css({
                    'box-shadow': '1px 1px 2px black'
                })
            }
        })
    }

    $('.productPage figure.visor img').mouseover(zoomIn);
    $('figure.zoom img').mouseout(zoomOut);
    $('figure.zoom').mousemove(zoomAction);
    function zoomIn(event)
    {
        let captureImg = $(this).attr('src');
        $('figure.zoom img').attr('src', captureImg);
        $('figure.zoom').fadeIn('fast');
        $('figure.zoom').css({
            'height': $('.productPage figure.visor').height()+"px",
            'width': $('.productPage figure.visor').width()+"px"
        });
    }
    function zoomOut()
    {
        $('figure.zoom').fadeOut('fast');
        $('figure.zoom').css({"display": "none"})
    }
    function zoomAction(event)
    {
        let posX = event.offsetX;
        let posY = event.offsetY;
        $('figure.zoom img').css({
            "margin-left": -posX/2+"px",
            "margin-top": -posY/2+"px",
        });
    }

}
