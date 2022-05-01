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