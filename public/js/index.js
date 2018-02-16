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

	if(Nombre == '' && Apellido == undefined && email == '' && re_email == '' && rol == '' && canal == '' && oportunidad == '' && cliente == '' && productos == '' && attach == '') {
		validarCampos();
	}
	if(Nombre == null || Nombre == '') {
		$('#Nombre').css('border-color','red');
		msj('error', 'Ingrese su nombre');
		return;
	}
	if(Apellido == null || Apellido == '') {
		$('#Apellido').css('border-color','red');
		return;
	}
	if(email == null || email == '') {
		$('#email').css('border-color','red');
		return;
	}
	if(email != re_email) {
		msj('error', 'uno de los emails ingresados no coincide con el otro');
		return;
	}
	if (!validateEmail(email)) {
		$('#email').css('border-color','red');
		return;
	}
	if (!validateEmail(re_email)) {
		$('#correo').css('border-color','red');
		return;
	}
	if(rol == null || rol == '') {
		$('#rol').css('border-color','red');
		return;
	}
	if(canal == null || canal == '') {
		$('#canal').css('border-color','red');
		return;
	}
	if(oportunidad == null || oportunidad == '') {
		$('#oportunidad').css('border-color','red');
		return;
	}
	if(cliente == null || cliente == '') {
		$('#cliente').css('border-color','red');
		return;
	}
	if(productos == null || productos == '') {
		$('#productos').css('border-color','red');
		return;
	}
	if(attach == null || attach == '') {
		$('#attach').css('border-color','red');
		return;
	}
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

function soloLetras(e) {
    key 	   = e.keyCode || e.which;
    tecla 	   = String.fromCharCode(key).toLowerCase();
    letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
 function valida(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta números
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validarCampos(){
	var $inputs = $('form :input');
	var formvalido = true;
	$inputs.each(function() {
		if(isEmpty($(this).val())){
				$(this).css('border-color','red');
				formvalido = false;
		}else{
				$(this).css('border-color','');
		}
	});
	return formvalido;
}
function isEmpty(val){
	if(jQuery.trim(val).length != 0)
    	return false;
		return true;
}