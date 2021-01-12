$(document).ready(function(){

	//ESTABLECEMOS LA UBICACION DEL WEBSERVICE
	$.getJSON("js/config.json",function(data){
		$("#ws").html(data.ws)
		$("#nombre-ws").html(data.nombre)
	})


	$("#link-generar-vale").click(function(e){
		e.preventDefault()
		$.post("generar_vale.php",function(response){
			$("#contenedor-principal").html(response)
		})
	})

	$("#link-consultar-vales").click(function(e){
		e.preventDefault()
		$.post("consultar_vales.php",function(response){
			$("#contenedor-principal").html(response)
		})
	})

	$("#link-movimientos").click(function(e){
		e.preventDefault()
		$.post("movimientos.php",function(response){
			$("#contenedor-principal").html(response)
		})		
	})
})