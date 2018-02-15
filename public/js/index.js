function registrar() {
	var Nombre 		= $('#Nombre').val();
	var Apellido 	= $('#Apellido').val();
	var email 		= $('#email').val();
	var re_email    = $('#correo').val();
	var rol 		= $('#rol').val();
	var canal 		= $('#canal').val();
	var oportunidad = $('#oportunidad').val();
	var cliente     = $('#cliente').val();
	var productos   = $('#productos').val();
	var attach      = $('#attach').val();
	$.ajax({
		data  : { Nombre 	  : Nombre,
				  Apellido 	  : Apellido,
				  email 	  : email,
				  re_email 	  : re_email,
				  rol 		  : rol,
				  canal 	  : canal,
				  oportunidad : oportunidad,
				  cliente 	  : cliente,
				  productos   : productos,
				  attach 	  : attach},
		url   : 'inicio/registrar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
				limpiarCampos();
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function limpiarCampos() {
	var Nombre 		= $('#Nombre').val(null);
	var Apellido 	= $('#Apellido').val(null);
	var email 		= $('#email').val(null);
	var re_email    = $('#correo').val(null);
	var rol 		= $('#rol').val(null);
	var canal 		= $('#canal').val(null);
	var oportunidad = $('#oportunidad').val(null);
	var cliente     = $('#cliente').val(null);
	var productos   = $('#productos').val(null);
	var attach      = $('#attach').val(null);
}