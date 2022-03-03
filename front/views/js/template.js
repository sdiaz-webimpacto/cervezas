$.ajax({
	url:"ajax/template.ajax.php",
	success:function(respuesta){
		const topBar = JSON.parse(respuesta).topBar;
		console.log(JSON.parse(respuesta));
	}
})