
$(document).ready(function(){

	//ESTABLECEMOS LA UBICACION DEL WEBSERVICE
	$.getJSON("js/config.json",function(data){
		$("#ws").html(data.ws)
		$("#nombre-ws").html(data.nombre)
	})
	
	$("#form-login").submit(function(e){
		e.preventDefault()

		var usuario=$("#form-login input[name=usuario]").val()
		var password=$("#form-login input[name=password]").val()
		var ws=$("#ws").html()
		var nombre_ws=$("#nombre-ws").html()
		password=CryptoJS.MD5(password)

		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/login/"+usuario+"/"+password,function(response){
			
				if(response[0].status==1)
				{
					//USUARIO VALIDO , SEGENERAN VARIABLES DE SESION Y SE REDIRIGE A SISTEMA
					$.post("ws_aplicacion.php",{'peticion':'iniciar_sesion','usuario':usuario},function(response){

						$(location).attr('href','principal.php')
					})
				}
				else
				{
					//USUARIO NO VALIDO
					alert(response[0].mensaje)
				}
		})



	})
})