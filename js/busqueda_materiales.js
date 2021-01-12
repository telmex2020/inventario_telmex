
$.get("http://"+ws+"/"+nombre_ws+"/ws.php/materiales",function(response){

	response.forEach(function(registro){
		$("#tabla-busqueda-materiales tbody").append("<tr id='"+registro.CODIGO+"' descripcion='"+registro.DESCRIPCION+"'><td>"+registro.CODIGO+"</td><td>"+registro.DESCRIPCION+"</td><td>"+registro.UNIDAD_DE_MEDIDA+"</td></tr>")
	})	

	$("#tabla-busqueda-materiales tbody tr").click(function(){

		var id_busqueda=$(this).attr('id')
		var descripcion_busqueda=$(this).attr('descripcion')

		$("#txt-codigo").val(id_busqueda)
		$("#txt-descripcion").val(descripcion_busqueda)
		$("#btn-cerrar-modal-busqueda").click()
		
	})	

	$("#tabla-busqueda-materiales").DataTable({responsive:true})

})

