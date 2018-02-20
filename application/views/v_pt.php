<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Registro de Oportunidades DCN">
    <meta name="keywords"               content="Registro de Oportunidades DCN">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="Febrero 15, 2018"/>
    <meta name="language"               content="pt-br">
    <meta name="theme-color"            content="#000000">
	<title>Registro de Oportunidades DCN</title>
	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>favicon.png">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
</head>
<body>
	<section id="principal">
		<div class="container">
			<div class="row">
				<div class="header">
					<div class="header-imagen inline">
						<img src="<?php echo RUTA_IMG?>logo.png">
					</div>
					<div class="header-contenido inline">
						<p>Registro de Oportunidades DCN - LAT</p>
					</div>
				</div>
				<div class="col-xs-12 text-right">
					<div class="mdl-idioma">
						<select class="selectpicker" id="idioma"  name="idioma" onchange="cambiarIdioma()">
							<option value="Portugués">Portugu&ecirc;s</option>
							<option value="Español">Espanhol</option>
							<option value="Inglés">Ingl&ecirc;s</option>
						</select>
    				</div>
				</div>
				<div class="col-sm-6">
					<div class="contenido-principal">
						<h2 class="subtitle">¡N&atilde;o deixe dinheiro na mesa!</h2>
						<p>Registre suas oportunidades j&aacute; declaradas no salesforce.com neste portal e n&oacute;s o apoiaremos com acompanhamento e suporte para fechar o seu neg&oacute;cio o mais rápido poss&iacute;vel e ganhar seus pontos via <strong>Engage & Grow</strong></p>
						<small><strong>Nota: </strong>Para participar voc&ecirc; deve estar registrado no programa Engage & Grow</small>
					</div>
					<div>
						<h2 class="subtitle">HPE Data Center Networking</h2>
						<p>As organiza&ccedil;&ntilde;es querem arquiteturas de rede abertas e program&aacute;veis e integradas em suas pilhas de computa&ccedil;&atilde;o, armazenamento e computa&ccedil;&atilde;o em nuvem. O portf&oacute;lio de rede do centro de dados HPE oferece esses recursos para m&uacute;ltiplos segmentos e casos de uso.</p>
					</div>
					<div class="contenido m-t-15">
						<h2 class="subtitle">Hybrid IT</h2>
						<p>Data Center Networking</p>
						<div class="contenido-partner right inline">
							<div class="partner-left">
								<img src="<?php echo RUTA_IMG?>logo_hpe.png">
							</div>
							<div class="partner-right">
								<small><strong>Connect Servidores, Storage</strong></small>
								<ul>
									<li>Servers</li>
									<li>Storage</li>
									<li>Hyper-Converged Systems</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<form class="formulario col-sm-6 col-xs-12 m-t-20">
					<h2 class="title-formulario">Dados Pessoais</h2>
					<div class="form-group col-xs-12 p-0">
					    <!-- <label for="apellido">Nombre</label> -->
					    <input type="text" class="form-control" id="Nombre" placeholder="Nome" onchange="validarCampos()">
				    </div>
					<div class="form-group col-xs-12 p-0">
					    <!-- <label for="apellido">Apellido</label> -->
					    <input type="text" class="form-control" id="apellido" placeholder="Sobrenome" onchange="validarCampos()">
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="email">Email</label> -->
					    <input type="email" class="form-control" id="email" placeholder="Email" onchange="validarCampos()">
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="correo">Confirmar email</label> -->
					    <input type="email" class="form-control" id="correo" placeholder="Confirmar Email" onchange="validarCampos()">
				    </div>
				     <div class="form-group col-xs-12 p-0">
					    <!-- <label for="rol">Rol</label> -->
					    <input type="text" class="form-control" id="rol" placeholder="Papel" onchange="validarCampos()">
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="canal">Nombre del Canal</label> -->
					    <input type="text" class="form-control" id="canal" placeholder="Canal" onchange="validarCampos()">
				    </div>
				    <h2 class="title-formulario">Dados de Oportunidade</h2>
				    <div class="form-group placeholder-static col-xs-12 p-0">
					    <!-- <label for="oportunidad">Oportunidad</label> -->
					    <input type="text" class="form-control" id="oportunidad" placeholder="0000000000" onchange="validarCampos()" maxlength="10">
					    <span class="">OPE - </span>
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="cliente">Nombre del Cliente</label> -->
					    <input type="text" class="form-control" id="cliente" placeholder="Nome do cliente" onchange="validarCampos()">
				    </div>
				    <div class="mdl-select col-xs-12 p-0">
				    	<select class="selectpicker" title="Produtos associados &agrave; oportunidade" id="productos">
							<option value="FlexFabric Promo TOR">FlexFabric Promo TOR</option>
							<option value="FlexFabric TOR (no Promo)">FlexFabric TOR (no Promo)</option>
						</select>
				    </div>
				    <div class="mdl-select col-xs-12 p-0">
				    	<select class="selectpicker" title="O DCN Attach foi realizado em" id="attach">
							<option value="Servidores">Servidores</option>
							<option value="Armazenamento">Armazenamento</option>
							<option value="Hyperconverged u otros">Hyperconverged ou outros</option>
						</select>
				    </div>
				    <div class="col-xs-12 p-0">
                        <div class="form-group">
                        	<label for="cliente">Data de encerramento do neg&oacute;cio</label>
                        	<div class="mdl-input">
                        		<div class="mdl-icon">
		                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon">
		                                <i class="mdi mdi-date_range"></i>
		                            </button>
		                        </div>
                            	<input class="form-control" type="text" id="fecha" name="fecha" maxlength="10" placeholder="dd/mm/aaaa" value="" style="pointer-events: none">
                        	</div>
                        </div>
                    </div>
				    <div class="mdl-register col-xs-12 p-0">
			    		<button type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="registrar()">Registre-se Oportunidade</button>
				    </div>
				</form>
			</div>
		</div>
		<!--MODAL-->
		<div class="modal fade" id="ModalQuestion" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	        <div class="modal-dialog modal-md text-center">
	            <div class="modal-content">
	                <div class="mdl-card" >
	                    <div class="mdl-card__title p-0">
							<img alt="" src="">
						</div>
					    <div class="mdl-card__supporting-text">
	                        <p>Tu registro a sido enviado satisfactoriamente nos pondremos en contacto contigo a la brevedad</p>
	                        <small>Equipo DCN Latinoamerica</small>
						</div> 
	    				<div class="mdl-card__menu">        				    
	                        <button class="mdl-button mdl-js-button mdl-button--icon" onclick="closeModal()"><i class="mdi mdi-close"></i></button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index_pt.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        initButtonCalendarDaysRange('fecha','01/11/2017','31/10/2018');
        initMaskInputs('fecha');
    </script>
</body>
</html>