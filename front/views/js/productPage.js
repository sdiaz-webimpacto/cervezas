$('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
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