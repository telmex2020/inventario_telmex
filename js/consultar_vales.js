var ws=$("#ws").html()
var nombre_ws=$("#nombre-ws").html()
var usuario=$("#user").html()

$("#link_ver_vales_dia").click(function(e){
	$("#link-consultar-vales").click()
	e.preventDefault()
	$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/consulta/dia",function(response){

		cargarTabla(response,"VALES DEL DIA")
	})
})


$("#link_ver_vales_mes").click(function(e){

	var fecha=new Date()
	var mes=fecha.getMonth()
	var anio=fecha.getFullYear()

	var meses=['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE']



	$("#link-consultar-vales").click()
	e.preventDefault()
	$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/consulta/mes",function(response){

		cargarTabla(response,"VALES DEL MES, "+meses[mes]+" "+anio)
	})
})

$("#link_ver_vales_rango").click(function(e){
	e.preventDefault()
	$("#link-consultar-vales").click()
	setTimeout(function(){
		$("#li_form_busqueda_rango").attr('hidden',false)
	},500)	
})

$("#form_busqueda_rango").submit(function(e){
	e.preventDefault()
	var fecha_de=$("#txt_fecha_de").val()
	var fecha_a=$("#txt_fecha_a").val()
	
	if (fecha_de>fecha_a)
	{
		alert("ERROR: La fecha inicial no puede ser mayor que la fecha final")
	}
	else
	{
		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/consulta/rango/"+fecha_de+"/"+fecha_a,function(response){

			cargarTabla(response,"VALES  DEL:"+fecha_de+" ----- AL:"+fecha_a)
		})
	}

	$("#li_form_busqueda_rango").attr('hidden',true)
	
})

$("#link_ver_vales_id").click(function(e){
	e.preventDefault()
	$("#link-consultar-vales").click()
	setTimeout(function(){
		$("#li_form_busqueda_id").attr('hidden',false)
	},500)	
})

$("#form_busqueda_id").submit(function(e){
	e.preventDefault()
	var id_buscar=$("#txt_id_buscar").val()		
	
	$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/consulta/id/"+id_buscar,function(response){
		cargarTabla(response,"BUSQUEDA POR ID: "+id_buscar)
	})	

	$("#li_form_busqueda_id").attr('hidden',true)	
})



function dataTables(titulo)
{

	$("#tabla_consulta_vales").DataTable({responsive:true,dom:'Bfrtip',retrieve:true,
	buttons: [
	{extend:'copy', text:'Copiar'},
	 'csv',
	 {extend:'excel', messageTop:titulo},
	 {extend:'pdf',messageTop:titulo,orientation:'vertical'},
	 {extend:'print',text:'Imprimir'}
	 ]

	})
}

function cargarTabla(response,titulo)
{

	$("#tabla_consulta_vales tbody").empty()

	if (response.status=='1')
	{
		$("#titulo_tabla_consulta").empty()
		$("#titulo_tabla_consulta").html(titulo)

		response.registros.forEach(function(registro)
		{
			$("#tabla_consulta_vales tbody").append("<tr name='"+registro.ID_VALE+"'><td>"+registro.ID_VALE+"</td><td>"+registro.FECHA+"</td><td>"+registro.HORA+"</td><td>"+registro.NOMBRE_USUARIO+"</td><td>"+registro.NOMBRE_EMPLEADO+"</td><td class='status_vale_"+registro.STATUS_VALE+"'>"+registro.STATUS_VALE+"</td><td><abbr title='Ver detalle de vale'><a name='"+registro.ID_VALE+"' class='link_detalle_vale' href='#'><i class='fas fa-eye'></a></abbr></td></tr>")

		})

	}
	else
	{
		alert(response.mensaje)
	}

	$(".link_detalle_vale").click(function(e){
		var id_vale=$(this).attr('name')

		$("#modal_danger").attr('hidden',true)

		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/consulta/detalle/"+id_vale,function(response){

			if (response.status=='1')
			{
				var info_vale=response.info_vale
				var detalle_vale=response.detalle_vale

				if (info_vale.STATUS_VALE=='PENDIENTE')
				{
					$("#modal_danger").attr('hidden',false)	
				}

				//seteamos la info del vale

				//llenamos el select de empleados
				$.get("http://"+ws+"/"+nombre_ws+"/ws.php/empleados/lista_simple",function(response){	

				$("#select_modal_empleado_vale").empty()				
					response.forEach(function(empleado){						
						$("#select_modal_empleado_vale").append("<option name='"+empleado.ID_EMPLEADO+"'>"+empleado.NOMBRE_COMPLETO+"</option>")
					})
				}).promise().done(function(){
					$("#txt_modal_id_vale").val(info_vale.ID_VALE)
					$("#txt_modal_status_vale").val(info_vale.STATUS_VALE)
					$("#date_modal_fecha_vale").val(info_vale.FECHA)
					$("#time_modal_hora_vale").val(info_vale.HORA)
					$("#txt_modal_usuario_vale").val(info_vale.NOMBRE_USUARIO)			
					$("#select_modal_empleado_vale").val(info_vale.NOMBRE_EMPLEADO)

				})


				//llenamos la tabla

				$("#modal_tabla_detalle_vale tbody").empty()

				detalle_vale.forEach(function(registro){				

				$("#modal_tabla_detalle_vale tbody").append("<tr id='tr_"+registro.ID_MOVIMIENTO+"'><td>"+registro.CODIGO+"</td><td>"+registro.DESCRIPCION+"</td><td>"+registro.CANTIDAD+"</td><td>"+registro.UNIDAD_DE_MEDIDA+"</td><td>"+(info_vale.STATUS_VALE=='PENDIENTE'?"<a href='#' class='link_eliminar_item' name="+registro.ID_MOVIMIENTO+"><i class='fas fa-trash'></a>":"---")+"</td><tr>")
				})
			}
			else
			{
				alert(response.mensaje)
			}

			$(".link_eliminar_item").click(function(e){
				e.preventDefault()
				id_item=$(this).attr('name')

				//eliminamos item

				$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales_materiales/eliminar_item/"+id_item,function(response){

					if(response.status=='1')
					{
						alert(response.mensaje)					

						$("#tr_"+id_item).remove()
					}
				})
			})	

		})

	
		
		$("#modalDetalleVale .modal-header p").html("DETALLE DE VALE: "+id_vale)
		$("#btn-modal-detalle").click()

	})



	dataTables(titulo)
}
	
$("#btn-cancelar-vale-detalle").unbind('click')	
$("#btn-cancelar-vale-detalle").click(function(e){
	e.preventDefault()
	var id_vale_cancelar=$("#txt_modal_id_vale").val()

	if (confirm("¿Desea cancelar este vale?"))
	{
		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/cancelar/"+id_vale_cancelar+"/"+usuario,function(response){
			if (response.status=='1')
			{
				alert(response.mensaje)
				$("#btn-cerrar-modal-detalle").click()
			}
			else
			{
				alert(response.mensaje)
			}
		})		
	}

})

$("#btn-guardar-cambios-detalle").unbind('click')
$("#btn-guardar-cambios-detalle").click(function(e){
	e.preventDefault()
	var status_vale=$("#txt_modal_status_vale").val()
	var empleado=$("#select_modal_empleado_vale").val()
	var id_vale=$("#txt_modal_id_vale").val()
	switch(status_vale)
	{
		case 'PENDIENTE':
		//se cambia el nombre del empleado y se descuenta vale de inventario
		$.post("http://"+ws+"/"+nombre_ws+"/ws.php/vales/actualizar_empleado",{'id_vale':id_vale,'empleado':empleado},function(response){
			alert("INFO VALE, "+response.mensaje)
			
		})

		$.get("http://"+ws+"/"+nombre_ws+"/ws.php/vales/descontar/"+id_vale+"/"+usuario,function(response){

			alert("DETALLE VALE, "+response.mensaje)
			$("#btn-cerrar-modal-detalle").click()
		})

		break
		case 'SURTIDO':
		//se cambia solo el nombre del empleado
		$.post("http://"+ws+"/"+nombre_ws+"/ws.php/vales/actualizar_empleado",{'id_vale':id_vale,'empleado':empleado},function(response){
				alert(response.mensaje)
				$("#btn-cerrar-modal-detalle").click()
			})
		break
		case 'CANCELADO':
		alert('ESTE VALE SE ENCUENTRA CANCELADO, NO SE PUEDEN HACER CAMBIOS')
		break		
	}
})


