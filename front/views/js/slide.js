let item = 0;
var itemList = $('#pagination li');
const time = $('ul.slideShow').attr("second") * 1000;


$('#pagination li').click(function(){
    item = $(this).attr("item") - 1;
    moveSlide(item);
});

$('#slide #next').click(function(){
    next();
});

$('#slide #back').click(function(){
    if(item == 0)
    {
        item = itemList.length - 1;
    } else {
        item--;
    }
    moveSlide(item);
});

setInterval(function(){
    next();
},time);

function moveSlide(item)
{
    $("#slide ul.slideShow").animate({
        "left": item * -100 + "%"
    }, 500);
    $('#pagination li').css({'opacity':.5});
    $(itemList[item]).css({'opacity':1});
}

function next()
{
    if(item == itemList.length - 1)
    {
        item = 0;
    } else {
        item++;
    }
    moveSlide(item);
}