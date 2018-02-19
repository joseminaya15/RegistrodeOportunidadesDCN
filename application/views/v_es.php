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
							<option value="Español">Espa&ntilde;ol</option>
							<option value="Inglés">Ingl&eacute;s</option>
							<option value="Portugués">Portugu&eacute;s</option>
						</select>
    				</div>
				</div>
				<div class="col-sm-6">
					<div class="contenido-principal">
						<h2 class="subtitle">¡No dejes dinero sobre la mesa!</h2>
						<p>Registra en este portal tus oportunidades ya declaradas en salesforce.com y te apoyaremos con el seguimiento y soporte para cerrar tus negocios lo antes posible y ganes tus puntos via <strong>Engage & Grow</strong></p>
						<small><strong>Nota: </strong>Para poder participar deber&aacute;s estar registrado en en el programa Engage & Grow</small>
					</div>
					<div>
						<h2 class="subtitle">HPE Data Center Networking</h2>
						<p>Las organizaciones quieren arquitecturas de red que sean abiertas y programables y que estén integradas en sus pilas tecnológicas de computación, almacenamiento y nube. El portafolio de redes de centro de datos HPE ofrece estas capacidades para múltiples segmentos y casos de uso.</p>
					</div>
					<div class="contenido m-t-15">
						<h2 class="subtitle">Hybrid IT</h2>
						<p>Data Center Networking</p>
						<div class="contenido-partner right inline">
							<img src="<?php echo RUTA_IMG?>logo_hpe.png">
							<small><strong>Conecta Servidores, Almacenamiento</strong></small>
							<ul>
								<li>Servers</li>
								<li>Storage</li>
								<li>Hyper-Converged Systems</li>
							</ul>
						</div>
						<div class="contenido-partner inline">
							<img src="<?php echo RUTA_IMG?>logo_aruba.png">
							<small><strong>Conecta Usuarios, dispositivos</strong></small>
							<ul>
								<li>Campus & Branch</li>
								<li>IoT (Internet of Things)</li>
								<li>Borde (Intelligent Edge)</li>
								<li>Movilidad (Wireless)</li>
							</ul>
						</div>
					</div>
				</div>
				<form class="formulario col-sm-6 col-xs-12 m-t-20">
					<h2 class="title-formulario">Datos personales</h2>
					<div class="form-group col-xs-12 p-0">
					    <!-- <label for="apellido">Nombre</label> -->
					    <input type="text" class="form-control" id="Nombre" placeholder="Nombre como figura en E&G" onchange="validarCampos()">
				    </div>
					<div class="form-group col-xs-12 p-0">
					    <!-- <label for="apellido">Apellido</label> -->
					    <input type="text" class="form-control" id="apellido" placeholder="Apellido como figura en E&G" onchange="validarCampos()">
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="email">Email</label> -->
					    <input type="email" class="form-control" id="email" placeholder="Email como esta registrado en E&G" onchange="validarCampos()">
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="correo">Confirmar email</label> -->
					    <input type="email" class="form-control" id="correo" placeholder="Confirmar Email" onchange="validarCampos()">
				    </div>
				     <div class="form-group col-xs-12 p-0">
					    <!-- <label for="rol">Rol</label> -->
					    <input type="text" class="form-control" id="rol" placeholder="Rol" onchange="validarCampos()">
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="canal">Nombre del Canal</label> -->
					    <input type="text" class="form-control" id="canal" placeholder="Canal" onchange="validarCampos()">
				    </div>
				    <h2 class="title-formulario">Datos de Oportunidad</h2>
				    <div class="form-group placeholder-static col-xs-12 p-0">
					    <!-- <label for="oportunidad">Oportunidad</label> -->
					    <input type="text" class="form-control" id="oportunidad" placeholder="0000000000" onchange="validarCampos()">
					    <span class="">OPE - </span>
				    </div>
				    <div class="form-group col-xs-12 p-0">
					    <!-- <label for="cliente">Nombre del Cliente</label> -->
					    <input type="text" class="form-control" id="cliente" placeholder="Nombre del Cliente" onchange="validarCampos()">
				    </div>
				    <div class="mdl-select col-xs-12 p-0">
				    	<select class="selectpicker" title="Productos asociados a la oportunidad" id="productos">
							<option value="FlexFabric Promo TOR">FlexFabric Promo TOR</option>
							<option value="FlexFabric TOR (no Promo)">FlexFabric TOR (no Promo)</option>
						</select>
				    </div>
				    <div class="mdl-select col-xs-12 p-0">
				    	<select class="selectpicker" title="El Attach de DCN se realizó sobre" id="attach">
							<option value="Servidores">Servidores</option>
							<option value="Almacenamiento">Almacenamiento</option>
							<option value="Hyperconverged u otros">Hyperconverged u otros</option>
						</select>
				    </div>
				    <div class="col-xs-12 p-0">
                        <div class="form-group">
                        	<label for="cliente">Fecha de Cierre del Negocio</label>
                        	<div class="mdl-input">
                        		<div class="mdl-icon">
		                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon">
		                                <i class="mdi mdi-date_range"></i>
		                            </button>
		                        </div>
                            	<input class="form-control" type="text" id="fecha" name="fecha" maxlength="10" placeholder="dd/mm/aaaa" value="">
                        	</div>
                        </div>
                    </div>
				    <div class="mdl-register col-xs-12 p-0">
			    		<button type="button" name="boton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="registrar()">Registrar Oportunidad</button>
				    </div>
				</form>
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
    <script src="<?php echo RUTA_JS?>index_es.js?v=<?php echo time();?>"></script>
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