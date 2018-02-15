<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Registro de Oportunidades DCN">
    <meta name="keywords"               content="Registro de Oportunidades DCN">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="Febrero 15, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>Registro de Oportunidades DCN</title>
	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.ico">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
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
				<div class="col-xs-12">
					<h2 class="title">Moor insights: Hybrid IT helps businesses navigate through digital transformation</h2>
				</div>
				<div class="contenido col-sm-6 col-xs-12">
					<p>As businesses drive for agility in the era of digital disruption, many are finding public cloud security, compliance, and performance may not meet their needs. Instead, they need a flexible, software-defined, scalable and composable hybrid IT environment to operate across datacenter, private and public clouds and the edge of the network.</p>
					<p>Download the paper to learn more.</p>
					<img src="public/img/imagen.jpg">
				</div>
				<div class="formulario col-sm-6 col-xs-12">
					<div class="form-group col-xs-12">
					    <label for="apellido">Nombre</label>
					    <input type="text" class="form-control" id="Nombre" placeholder="Nombre">
				    </div>
					<div class="form-group col-xs-12">
					    <label for="apellido">Apellido</label>
					    <input type="text" class="form-control" id="apellido" placeholder="Apellido">
				    </div>
				    <div class="form-group col-xs-12">
					    <label for="email">Email</label>
					    <input type="email" class="form-control" id="email" placeholder="Email">
				    </div>
				    <div class="form-group col-xs-12">
					    <label for="correo">Confirmar email</label>
					    <input type="email" class="form-control" id="correo" placeholder="Email">
				    </div>
				     <div class="form-group col-xs-12">
					    <label for="rol">Rol</label>
					    <input type="text" class="form-control" id="rol" placeholder="Rol">
				    </div>
				    <div class="form-group col-xs-12">
					    <label for="canal">Nombre del Canal</label>
					    <input type="text" class="form-control" id="canal" placeholder="Canal">
				    </div>
				    <div class="form-group col-xs-12">
					    <label for="oportunidad">Oportunidad</label>
					    <input type="text" class="form-control" id="oportunidad" placeholder="Oportunidad">
				    </div>
				    <div class="form-group col-xs-12">
					    <label for="cliente">Nombre del Cliente</label>
					    <input type="text" class="form-control" id="cliente" placeholder="Cliente">
				    </div>
				    <div class="mdl-select col-xs-12">
				    	<select class="selectpicker" title="Productos asociados a la oportunidad" id="productos">
							<option value="FlexFabric Promo TOR">FlexFabric Promo TOR</option>
							<option value="FlexFabric TOR (no Promo)">FlexFabric TOR (no Promo)</option>
						</select>
				    </div>
				    <div class="mdl-select col-xs-12">
				    	<select class="selectpicker" title="El Attach de DCN se realizó sobre" id="attach">
							<option value="Servidores">Servidores</option>
							<option value="Almacenamiento">Almacenamiento</option>
							<option value="Hyperconverged u otros">Hyperconverged u otros</option>
						</select>
				    </div>
				    <div class="col-xs-12">
			    		<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="registrar()">Registrarse</button>
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
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
    </script>
</body>
</html>