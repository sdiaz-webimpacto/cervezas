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

/**
 * ADD TO CART
 */
$('.productLess').click(qtyAdjust);
$('.productMore').click(qtyAdjust);
$('.buttonAddToCart').click(addToCartProduct);

function qtyAdjust()
{
	if($('.addToCartButtons').length)
	{
		const id = $(this).attr('data-id');
		const nameInput = '#qty-'+id;
		const stockInput = '#stock-'+id;
		const button = $('.addToCartButtons.product .buttonAddToCart[data-id="'+id+'"]');
		let stock = Number($(stockInput).val());
		let val = Number($(nameInput).val());
		let variation = + 1;
		if($(this).hasClass('productLess') && val >= 2)
		{
			variation = - 1;
		} else if($(this).hasClass('productLess') && val <= 1)
		{
			variation = + 0;
		}
		$(nameInput).val(val+variation);
		if($(nameInput).val() > stock)
		{
			button.attr('disabled', 'disabled');
			button.html(
				'Sin stock'
			)
		} else {
			button.attr('disabled', false);
			button.html(
				'Añadir a la cesta <i class="fa fa-shopping-cart"></i>'
			)
		}
	}
}

function addToCartProduct()
{
	const product = $(this).attr('data-id');
	const cart = $(this).attr('data-cart');
	const qty = $('input#qty-'+product).val();
	$.ajax({
		url: 'ajax/cart.ajax.php',
		method: 'POST',
		data: {
			'addToCart': 1,
			'product': product,
			'cart': cart,
			'qty': qty,
			'dateTime': Date.now()
		},
		success: function(response)
		{
			let actualNb = Number($('.itemsInCart').text());
			const data = JSON.parse(response);
			if(data.result === 'ok')
			{
				$('.itemsInCart').text(actualNb + Number(data.qty));
				$('header').after('' +
					'<div class="container-fluid addToCartBubble">' +
					'	<div class="col-xs-4"><i class="superIcon fa fa-shopping-cart"></i></div>' +
					'	<div class="col-xs-8">' +
						data.qty + ' '+ data.productName + '<br>Añadido al carrito' +
					'   </div>' +
					'</div>');
			}
		},
	})
}