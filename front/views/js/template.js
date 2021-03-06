/**
 * TOOLTIPS
 */
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});

/**
 * COLORS OF TEMPLATE
 */
$.ajax({
	url:"ajax/template.ajax.php",
	success:function(respuesta){
		const topBar = respuesta[0][0].top_bar;
		const topBarText = respuesta[0][0].top_bar_text;
		const header = respuesta[0][0].header;
		const backcolor = respuesta[0][0].backcolor;
		const backcolorText = respuesta[0][0].backcolor_text;

		$('header').css('background', header);
		$('.topBar, .topBar a').css({
			'background-color': topBar,
			'color': topBarText
		});
		$('.backColor, .backColor a').css({
			'background-color': backcolor,
			'color': backcolorText
		});
	}
})


/**
 * LIST OR GRID
 */

if($('.list').length >= 1)
{
	for(let i = 0; i < $('.list').length; i++)
	{
		$('#btnList'+i).click(function(){
			$('.list'+i).show();
			$('.grid'+i).hide();
			$('#btnList'+i).addClass('backColor');
			$('#btnGrid'+i).removeClass('backColor');
		});
		$('#btnGrid'+i).click(function(){
			$('.list'+i).hide();
			$('.grid'+i).show();
			$('#btnGrid'+i).addClass('backColor');
			$('#btnList'+i).removeClass('backColor');
		});
	}
}

/**
 * PARALLAX
 */

$(window).scroll(function(){
	if($(".banner").length > 0)
	{
		let scrollY = window.pageYOffset;

		if(scrollY < ($(".banner").offset().top+250) && scrollY > 200)
		{
			$('.banner img').css({
				"margin-top":(scrollY-200)/2+"px"
			})
		} else {
			scrollY = 0;
			$('.banner img').css({
				"margin-top":"0px"
			})
		}
	}
})

$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easing: "easeOutQuint"
})