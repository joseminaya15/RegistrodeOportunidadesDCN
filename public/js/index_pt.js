function registrar(){
	var Nombre 		= $('#Nombre').val();
	var Apellido 	= $('#apellido').val();
	var email 		= $('#email').val();
	var re_email    = $('#correo').val();
	var rol 		= $('#rol').val();
	var canal 		= $('#canal').val();
	var oportunidad = $('#oportunidad').val();
	var cliente     = $('#cliente').val();
	var productos   = $('#productos').val();
	var attach      = $('#attach').val();
	var fecha		= $('#fecha').val();
	var newdate = fecha.split("/").reverse().join("-");
	if(Nombre == '' && Apellido == '' && email == '' && re_email == '' && rol == '' && canal == '' && oportunidad == '' && cliente == '' && productos == '' && attach == '') {
		validarCampos();
	}
	if(Nombre == null || Nombre == '') {
		$('#Nombre').css('border-color','red');
		msj('error', 'Digite seu nome');
		return;
	}
	if(Apellido == null || Apellido == '') {
		msj('error', 'Digite seu sobrenome');
		$('#Apellido').css('border-color','red');
		return;
	}
	if(email == null || email == '') {
		msj('error', 'Digite seu e-mail');
		$('#email').css('border-color','red');
		return;
	}
	if (!validateEmail(email)) {
		msj('error', 'O formato de e-mail inserido está incorreto');
		$('#email').css('border-color','red');
		return;
	}else {
		$('#email').css('border-color','#C6C9CA');
	}
	if(re_email == null || re_email == '') {
		msj('error', 'Repita seu e-mail');
		$('#correo').css('border-color','red');
		return;
	}
	if (!validateEmail(re_email)) {
		msj('error', 'O formato de e-mail inserido está incorreto');
		$('#correo').css('border-color','red');
		return;
	}else {
		$('#correo').css('border-color','#C6C9CA');
	}
	if(email != re_email) {
		msj('error', 'um dos e-mails inseridos não coincide com o outro');
		return;
	}
	if(rol == null || rol == '') {
		msj('error', 'Ingrese su rol');
		$('#rol').css('border-color','red');
		return;
	}
	if(canal == null || canal == '') {
		msj('error', 'Insira seu papel');
		$('#canal').css('border-color','red');
		return;
	}
	if(oportunidad == null || oportunidad == '') {
		msj('error', 'Insira seu número de oportunidade HPE');
		$('#oportunidad').css('border-color','red');
		return;
	}
	if(cliente == null || cliente == '') {
		msj('error', 'Digite o nome do cliente');
		$('#cliente').css('border-color','red');
		return;
	}
	if(productos == null || productos == '') {
		msj('error', 'Insira os produtos');
		$('#productos').css('border-color','red');
		return;
	}else {
		$('#productos').parents().find('.btn-default').css('border-color','#C6C9CA');
	}
	if(attach == null || attach == '') {
		msj('error', 'Digite o anexo DCN que foi feito');
		$('#attach').css('border-color','red');
		return;
	}else {
		$('#attach').css('border-color','#C6C9CA');
	}
	if(fecha == null || fecha == '') {
		msj('error', 'Insira a data de encerramento');
		$('#fecha').css('border-color','red');
		return;
	}else {
		if(fecha < '2017-11-01') {
			msj('error', 'Selecione uma data maior do que 01/11/2017');
			return;
		}
		if(fecha > '2018-31-10') {
			msj('error', 'Selecione uma data menor do que 31/10/2018');
			return;
		}
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
				  attach 	  : attach,
				  fecha 	  : newdate},
		url   : 'pt/registrar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		modal('ModalQuestion');
				limpiarCampos();
        	}else {return;}
      } catch (err){
        msj('error',err.message);
      }
	});
}
function limpiarCampos(){
	$('#Nombre').val(null);
	$('#apellido').val(null);
	$('#email').val(null);
	$('#correo').val(null);
	$('#rol').val(null);
	$('#canal').val(null);
	$('#oportunidad').val(null);
	$('#cliente').val(null);
	$('#productos').val('0');
	$('.selectpicker').selectpicker('refresh');
	$('#attach').val('0');
	$('.selectpicker').selectpicker('refresh');
	$('#fecha').val(null);
}
function soloLetras(e){
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
 function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validarCampos(){
	var $inputs    = $('form :input');
	var formvalido = true;
	$inputs.each(function() {
		if(isEmpty($(this).val())){
			$(this).css('border-color','red');
			$('.btn-default').css('border-color','#C6C9CA');
			$('#fecha').css('border-color','#C6C9CA');
			formvalido = false;
		}else{
			$(this).css('border-color','#C6C9CA');
			$('#fecha').css('border-color','#C6C9CA');
		}
	});
	return formvalido;
}
function isEmpty(val){
	if(jQuery.trim(val).length != 0)
    	return false;
		return true;
}
function cambiarIdioma(){
	var idioma = $('#idioma').val();
	if(idioma == 'Español'){
		location.href = 'Es';
	}else if(idioma == 'Inglés'){
		location.href = 'En';
	}else if(idioma == 'Portugués'){
		location.href = 'Pt';
	}
	$.ajax({
		data  : {idioma : idioma},
		url   : 'pt/cambiarIdioma',
		type  : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        }else {return;}
      } catch (err){
        msj('error',err.message);
      }
	});
}
function closeModal(){
	modal('ModalQuestion');	
}