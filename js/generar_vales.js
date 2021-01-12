
var ws=$("#ws").html()
var nombre_ws=$("#nombre-ws").html()
var user=$("#user").html()


$.get("http://"+ws+"/"+nombre_ws+"/ws.php/empleados/lista_simple",function(response){
	
	response.forEach(function(datos){
	
		$("#select-empleado").append("<option name='"+datos.ID_EMPLEADO+"'>"+datos.NOMBRE_COMPLETO+"</option>")
			
	})
})

$("#generar_vale").submit(function(e){
	e.preventDefault()

	var id_empleado=$("#select-empleado option:selected").attr('name');

	// alert("http://"+ws+"/"+nombre_ws+"/ws.php/vales/nuevo_vale/"+id_empleado)

	$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/nuevo_vale/"+id_empleado+"/"+user,function(response){
		$("#txtID").val(response)
		bloquearForm1()
		$("#div-form-add-materiales").attr('hidden',false)
		
	})


})

$("#txt-codigo").change(function(){
	var codigo=$(this).val()

	$.get("http://"+ws+"/"+nombre_ws+"/ws.php/materiales/"+codigo,function(response){

		if (response.status=='1')
		{
			$("#txt-descripcion").val(response.registro.DESCRIPCION)
		}
		else
		{
			alert("No existe un registro con este código")
			$("#txt-descripcion").val('')
			$("#txt-codigo").focus()

		}
	})

})

$("#txt-descripcion").change(function(){
	var descripcion=$(this).val()

	$.post("http://"+ws+"/"+nombre_ws+"/ws.php/materialesxdescripcion",{'descripcion':descripcion},function(response){
		
		if (response.status=='1')
		{
			$("#txt-codigo").val(response.registro.CODIGO)
		}
		else
		{
			alert("No existe un registro con esa descripción")
		}
	})
})

$("#btn-buscar-materiales").click(function(e){
	e.preventDefault()

	$.post("busqueda_materiales.php",function(response){
		$("#body-busqueda-materiales").html(response)
		$("#btn-modal-busqueda").click()
	})
	
})

$("#btn-guardar-cambios").click(function(e){
	e.preventDefault()
	if (confirm("Se descontará la lista de materiales del inventario"))
	{
		var id_vale=$("#txtID").val()
		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/descontar/"+id_vale+"/"+user,function(response){
			if(response.status=='1')
			{
				alert("Vale descontado del inventario")
				$("#link-generar-vale").click() 
			}
			else
			{
				alert("Error: "+response.mensaje);
			}
		})
	}
})

$("#btn-cancelar-vale").click(function(e){
	e.preventDefault()
	if (confirm("¿Desea cancelar este vale?"))
	{
		var id_vale=$("#txtID").val()
		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/cancelar/"+id_vale+"/"+user,function(response){
			if (response.status=='1')
			{
				alert(response.mensaje)
				$("#link-generar-vale").click() 
			}
			else
			{
				alert(response.mensaje)
			}
		})
	}
})


$("#form-agregar-materiales").submit(function(e){
	e.preventDefault()
	var codigo=$("#txt-codigo").val()
	var cantidad=$("#txt-cantidad").val()
	var id_vale=$("#txtID").val()

	$.post("http://"+ws+"/"+nombre_ws+"/ws.php/insertar_item",{'id_vale':id_vale,'codigo':codigo,'cantidad':cantidad},function(response){


		if(response.status=='1')
		{
			$.get("http://"+ws+"/"+nombre_ws+"/ws.php/detalle_vale/"+id_vale,function(response){


				
				if(response.status='1')
				{
					$("#tabla-detalle-vale tbody").empty();

					response.registros.forEach(function(registro){

						$("#tabla-detalle-vale tbody").append("<tr><td>"+registro.CODIGO+"</td><td>"+registro.DESCRIPCION+"</td><td>"+registro.CANTIDAD+"</td><td>"+registro.UNIDAD_DE_MEDIDA+"</td><td><i class='fas fa-trash'></td></tr>")
					})
				}
			})
		}
	
	})


})

function bloquearForm1()
{
	$("#txtID").attr('disabled',true)
	$("#select-empleado").attr('disabled',true)
	$("#btn-add-vale").attr('disabled',true)
	$("#btn-guardar-cambios").attr('hidden',false)
	$("#btn-cancelar-vale").attr('hidden',false)
}


//llenamos lista de empleados





