<?php
$footerDB = new stdClass();
$footerDB->titulo_general = 'CONTÁCTANOS';
$footerDB->direccion = $generalDB->direccion;
$footerDB->mail_destino = $generalDB->correo_form;

if(property_exists($generalDB, "facebook") && $generalDB->facebook !== ''){
	$valor = new stdClass();
	$valor->red = 'facebook';
	$valor->nombre = 'Mi Pagina';
	$valor->liga = $generalDB->facebook;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_facebook"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "behance") && $generalDB->behance !== ''){
	$valor = new stdClass();
	$valor->red = 'behance';
	$valor->nombre = 'Mi Portafolio';
	$valor->liga = $generalDB->behance;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_behance"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "instagram") && $generalDB->instagram !== ''){
	$valor = new stdClass();
	$valor->red = 'instagram';
	$valor->nombre = 'Mi Galeria';
	$valor->liga = $generalDB->instagram;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_instagram"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "linkedin") && $generalDB->linkedin !== ''){
	$valor = new stdClass();
	$valor->red = 'linkedIn';
	$valor->nombre = 'Mi Curriculum';
	$valor->liga = $generalDB->linkedin;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_linkedin"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "vimeo") && $generalDB->vimeo !== ''){
	$valor = new stdClass();
	$valor->red = 'vimeo';
	$valor->nombre = 'Mi Canal';
	$valor->liga = $generalDB->vimeo;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_vimeo"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}


//Formulario contacto
$data_footer_nombre  =  array ( 
	'name' => 'nombre',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'NOMBRE',
	'data-validar' => 'texto'
);
$data_footer_tel  =  array ( 
	'name' => 'telefono',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'TELÉFONO',
	'data-validar' => 'telefono'
);
$data_footer_mail  =  array ( 
	'name' => 'correo',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'CORREO',
	'data-validar' => 'correo'
);
$data_servicio_mensaje  =  array ( 
	'name' => 'mensaje',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'MENSAJE',
	'data-validar' => 'texto'
);
?>
		</div>
		
			<footer id="footer" class="mboxG">
				<form id="footerContactoForm" class="mboxC footer1">
					<div class="box">
						<div class="linea1 row">
							<div class="col-md-4">
								<h3 class="titulo noMobile">&nbsp;</h3>
								<dir class="direccion">
									<?php echo($footerDB->direccion); ?>
								</dir>
								<a href="https://www.google.com.mx/maps/preview" class="ubicacion">Ver Ubicación</a>
							</div>
							<div class="col-md-4">
								<h3 class="titulo"><?php echo($footerDB->titulo_general); ?></h3>
								<?php echo form_input( $data_footer_nombre ); ?>
								<?php echo form_input( $data_footer_tel ); ?>
							</div>
							<div class="col-md-4">
								<h3 class="titulo noMobile">&nbsp;</h3>
								<?php echo form_input( $data_footer_mail ); ?>
								<?php echo form_textarea( $data_servicio_mensaje ); ?>
							</div>
							<div class="mboxI_in geo_point">
								<h3 class="titulo noMobile">&nbsp;</h3>
								<img src="<?php echo(base_url('assets/public/img/geo_point.svg')); ?>" />
							</div>
						</div>
						<div class="linea2 row">
							<div class="col-md-4">
								<input type="button" value="DESCARGAR CONTACTO" onclick="descargar_vcard();"></input>
							</div>
							<div class="col-md-4">
								<input type="button" value="TRABAJA CON NOSOTROS" onclick="window.location.href = '<?php echo(base_url('vacantes')); ?>'"></input>
							</div>
							<div class="col-md-4">
								<a href="<?php echo( base_url('politicas_de_privacidad') ); ?>">Políticas de privacidad</a>
								<div id="redes">
									<?php
										foreach ($footerDB->redes as $i=>$v) {
										?>
											<div class="red">
												<a target="_blank" href="<?php echo($v->liga); ?>">
													<?php echo( $v->icono); ?>
												</a>
											</div>
										<?php
										}
									?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="mboxD_in">
						<div id="footerBtnEnviar">
							<div class="celda">
								<img src="<?php echo( base_url('assets/public/img/btnEnviar.png') ); ?>" />
								<span>ENVIAR</span>
							</div>
						</div>
					</div>
				</form>
				
				<div class="mboxC footer2">
					<div class="box clearfix">
						<div id="certificaciones" class="col1">
							<h3>CERTIFICACIONES</h3>
							<div class="cert_iconos">
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_certificacion_icono.svg') ); ?>" /></div>
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_certificacion_icono.svg') ); ?>" /></div>
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_certificacion_icono.svg') ); ?>" /></div>
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_certificacion_icono.svg') ); ?>" /></div>
							</div>
						</div>
						<div id="premios" class="col2">
							<h3>PREMIOS</h3>
							<div class="cert_iconos">
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_premios_icono.svg') ); ?>" /></div>
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_premios_icono.svg') ); ?>" /></div>
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_premios_icono.svg') ); ?>" /></div>
								<div class="icono"><img src="<?php echo( base_url('assets/public/img/footer_premios_icono.svg') ); ?>" /></div>
							</div>
						</div>
					</div>
					
					<div class="mboxI_in">
						<div class="logoBox">
							<img src="<?php echo( base_url('assets/public/img/footer_logo.jpg') ); ?>" />
						</div>
					</div>
					<div class="mboxD_in"></div>
				</div>
				<div class="mboxI"></div>
				<div class="mboxD"></div>
			</footer>

		
		
		
		<!-- Carga de librerias !!.. -->
<!-- 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<!--
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
-->

		<script src="https://player.vimeo.com/api/player.js"></script>
		
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.js"></script>
		<!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.helper.ie8.js"></script><![endif]-->
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/formvalid.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/public/js/owner/main.js')) ?>"></script>
		
		<?php
		?>

	</body>
</html>