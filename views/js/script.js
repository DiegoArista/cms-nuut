

/*=============== VALIDAR MENSAJES====================*/
/*----------------------------------------------------*/

function validarMensaje(){
	nombre = $("#nombre").val();
	mensaje = $("#mensaje").val();

	if(nombre != ""){
		var caracteres = nombre.length; 
		var expresion = /^[a-zA-Z\s]*$/;

		if(!expresion.test(nombre)){
			$("#nombre").after('<div class= "alert alert-warning alerta text-center">El nombre no debe tener números ni caracteres especiales</div>');
			return false;

		}else if (mensaje != "") {
			var caracteres = mensaje.length;
			var expresion = /^[a-zA-Z0-9\s]*$/;
			
			if(!expresion.test(mensaje)){
					
			$("#mensaje").after('<div class= "alert alert-warning alerta text-center">El mensaje no permite números ni caracteres especiales</div>');
			return false;
	
			}
			
		
		}


	}



	return true;
}


/*=============== FIN VALIDAR MENSAJES====================*/
/*----------------------------------------------------*/