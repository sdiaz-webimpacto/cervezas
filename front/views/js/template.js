/**
 * COLORS OF TEMPLATE
 */
$.ajax({
	url:"ajax/template.ajax.php",
	success:function(respuesta){
		const topBar = JSON.parse(respuesta)[0][0].top_bar;
		const topBarText = JSON.parse(respuesta)[0][0].top_bar_text;
		const header = JSON.parse(respuesta)[0][0].header;
		const backcolor = JSON.parse(respuesta)[0][0].backcolor;
		const backcolorText = JSON.parse(respuesta)[0][0].backcolor_text;

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