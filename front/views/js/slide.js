let item = 0;
var itemList = $('#pagination li');
const time = $('ul.slideShow').attr("second") * 1000;
let stopCircle = false;

const imgProduct = $('.imgProduct');
const title1 = $('.textSlide');

const arrows = $('.arrows');

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
    if(stopCircle)
    {
        stopCircle = false;
    } else {
        next();
    }
},time);

function moveSlide(item)
{
    $("#slide ul.slideShow").animate({
        "left": item * -100 + "%"
    }, 1000, "easeInOutCirc");
    $('#pagination li').css({'opacity':.5});
    $(itemList[item]).css({'opacity':1});
    stopCircle = true;
    animation(item);
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

function animation(item)
{
    $(imgProduct[item]).animate({
        "left": -10 + "%",
        "opacity": 0
    },800);
    $(imgProduct[item]).animate({
        "left": 0 + "px",
        "opacity": 1
    },600);
    $(title1[item]).animate({
        "top": -10 + "%",
        "opacity": 0
    },800);
    $(title1[item]).animate({
        "top": 30 + "px",
        "opacity": 1
    },1000, "easeOutCubic");
}