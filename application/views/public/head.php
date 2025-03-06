<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="es" class="no-js lt-ie9 lt-ie8 lt-ie7" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 7]>         <html lang="es" class="no-js lt-ie9 lt-ie8" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 8]>         <html lang="es" class="no-js lt-ie9" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es" class="no-js"> <!--<![endif]-->
	<head itemscope itemtype="http://schema.org/Person" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# profile: http://ogp.me/ns/profile#">
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
		
		<meta http-equiv="Content-Encoding" content="gzip" />
		<meta http-equiv="Accept-Encoding" content="gzip, deflate" />
				
		<link rel="shortcut icon" href="<?php echo(base_url('assets/public/img/favicon.ico')); ?>?v1" />
		<link rel="icon" href="<?php echo(base_url('assets/public/img/favicon.ico')); ?>?v1" />
		<link rel="apple-touch-icon" href="<?php echo(base_url('assets/public/img/apple-touch-icon.png')); ?>" />
				
		<title><?php echo($titulo); ?> | INMOTION</title>
		<meta name="description" content="<?php echo($desc); ?>" />
	
					
		<meta name="dcterms.audience" content="Global" />
		<meta name="rating" content="General" />
		
	
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
	<!-- 		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	    <link href="<?php echo(base_url('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.1')) ?>" rel="stylesheet" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/tiny-slider.css">
		
		<link href="<?php echo(base_url('assets/public/css/main.css')) ?>" rel="stylesheet" type="text/css">
				
		
		<!-- Meta Data de verificacion de sitios web. -->
		<meta name="msvalidate.01" content="ED387E3F99B5758EB607324E9928F951" />
		<meta name="p:domain_verify" content="92115dc4d60becb13618274218b951f2"/>
		
		
		<?php if(isset($actual) && $actual !== ''){
			?>
		<script type="text/javascript"> 
			var pageActual = '<?php echo($actual); ?>';
			var baseDir = '<?php echo(base_url()); ?>';
		</script>
			<?php
		}
		?>
		
		
<?php
$headerDB = new stdClass();
//$headerDB->titulo_general = 'CONTÁCTANOS';
//$headerDB->direccion = $generalDB->direccion;
//$headerDB->mail_destino = $generalDB->correo;

if(property_exists($generalDB, "facebook") && $generalDB->facebook !== ''){
	$valor = new stdClass();
	$valor->red = 'facebook';
	$valor->nombre = 'Mi Pagina';
	$valor->liga = $generalDB->facebook;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_facebook"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "behance") && $generalDB->behance !== ''){
	$valor = new stdClass();
	$valor->red = 'behance';
	$valor->nombre = 'Mi Portafolio';
	$valor->liga = $generalDB->behance;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_behance"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "instagram") && $generalDB->instagram !== ''){
	$valor = new stdClass();
	$valor->red = 'instagram';
	$valor->nombre = 'Mi Galeria';
	$valor->liga = $generalDB->instagram;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_instagram"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "linkedin") && $generalDB->linkedin !== ''){
	$valor = new stdClass();
	$valor->red = 'linkedIn';
	$valor->nombre = 'Mi Curriculum';
	$valor->liga = $generalDB->linkedin;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_linkedin"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
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
	$headerDB->redes[] = $valor;
}	
	

?>
						
	</head>
	<div id="lineaIzquierda"></div>
	<div id="lineaDerecha"></div>
	<body id="<?php echo($actual); ?>" itemscope="itemscope" itemtype="http://schema.org/WebPage" >
		<div id="bodyBackFix" style="background-image: url(<?php echo(base_url( 'assets/public/img/general/'.$generalDB->fondo[0]->img )); ?>);"></div>
		<style type="text/css">
			<?php if(property_exists($generalDB, "color_fondo") && $generalDB->color_fondo !== ''){ echo('body{background-color:'.$generalDB->color_fondo.' !important;}'); } ?>
			<?php 
				if(property_exists($generalDB, "color_principal") && $generalDB->color_principal !== ''){
					echo('.colDin1{color:'.$generalDB->color_principal.' !important; fill:'.$generalDB->color_principal.' !important;}');
					echo('.colDin1-back{background-color:'.$generalDB->color_principal.' !important;}');
					echo('#menu .red svg{color:'.$generalDB->color_principal.' !important; fill:'.$generalDB->color_principal.' !important;}');
				}
				if(property_exists($generalDB, "color_contraste") && $generalDB->color_contraste !== ''){
					echo('.colDin1-op{color:'.$generalDB->color_contraste.' !important; fill:'.$generalDB->color_contraste.' !important;}');
					echo('.colDin1-back-op{background-color:'.$generalDB->color_contraste.' !important;}');
				}
			?>
		</style>


<!-- 	Elementos SVG a utilizar en el sitio web. -->
		<div class="hide">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_facebook" >
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
					<path class="st0" d="M17.2,32.3c0-0.1,0-0.1,0-0.2c0-3.4,0-6.8,0-10.2v-0.1c-0.1,0,0,0-0.1,0c-1.1,0-2.2,0-3.3,0
						c-0.2,0-0.2,0-0.2-0.1c0-1.3,0-2.5,0-3.8c0-0.1,0-0.1,0.1-0.1c1.1,0,2.2,0,3.3,0c0,0,0.1,0,0.2,0v-0.1c0-1.1,0-2.1,0-3.2
						c0-0.9,0.2-1.7,0.6-2.4c0.5-1,1.3-1.8,2.4-2.2c0.7-0.3,1.5-0.4,2.3-0.4c0.9,0,1.8,0.1,2.7,0.1c0.2,0,0.3,0,0.5,0
						c0.1,0,0.1,0,0.1,0.1c0,0.5,0,1.1,0,1.6c0,0.6,0,1.2,0,1.9c0,0.1,0,0.1-0.1,0.1c-0.7,0-1.3,0-2,0c-0.3,0-0.6,0-0.9,0.1
						c-0.6,0.1-0.9,0.5-1,1.1c0,0.2-0.1,0.5-0.1,0.7c0,0.9,0,1.7,0,2.6v0.1c0.1,0,0.1,0,0.1,0c1.2,0,2.5,0,3.7,0c0.2,0,0.2,0,0.1,0.2
						c-0.1,0.7-0.2,1.4-0.3,2c-0.1,0.6-0.1,1.1-0.2,1.7c0,0.2,0,0.2-0.2,0.2c-1.1,0-2.1,0-3.2,0h-0.1c0,0.1,0,0.1,0,0.2
						c0,3.4,0,6.7,0,10.1c0,0.1,0,0.2,0,0.2L17.2,32.3z"/>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_behance" >
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
					<g>
						<path id="Behance" class="st0" d="M28.9,15h-5.6v-1.4h5.6V15L28.9,15z M19.7,20.7c0.4,0.6,0.5,1.2,0.5,2s-0.2,1.6-0.6,2.2
							c-0.3,0.4-0.6,0.8-1,1.1c-0.4,0.3-1,0.6-1.6,0.7s-1.2,0.2-1.9,0.2H8.9V13.1h6.7c1.7,0,2.9,0.5,3.6,1.5c0.4,0.6,0.6,1.3,0.6,2.1
							c0,0.8-0.2,1.5-0.6,2c-0.2,0.3-0.6,0.5-1.1,0.8C18.8,19.7,19.3,20.1,19.7,20.7z M12.1,18.5H15c0.6,0,1.1-0.1,1.5-0.3
							c0.4-0.2,0.6-0.6,0.6-1.2s-0.2-1.1-0.7-1.3c-0.4-0.1-1-0.2-1.6-0.2h-2.6L12.1,18.5L12.1,18.5z M17.3,22.5c0-0.7-0.3-1.2-0.9-1.5
							c-0.3-0.2-0.8-0.2-1.4-0.2h-3v3.7h3c0.6,0,1.1-0.1,1.4-0.2C17,23.9,17.3,23.4,17.3,22.5z M31,20.3c0.1,0.5,0.1,1.1,0.1,2h-7.2
							c0,1,0.4,1.7,1,2.1c0.4,0.2,0.9,0.4,1.4,0.4c0.6,0,1.1-0.1,1.4-0.5c0.2-0.2,0.4-0.4,0.5-0.7h2.6c-0.1,0.6-0.4,1.2-1,1.8
							c-0.9,1-2.1,1.4-3.7,1.4c-1.3,0-2.5-0.4-3.5-1.2c-1-0.8-1.5-2.1-1.5-4c0-1.7,0.5-3,1.4-3.9s2.1-1.4,3.5-1.4c0.9,0,1.6,0.2,2.3,0.5
							c0.7,0.3,1.3,0.8,1.7,1.5C30.6,18.8,30.9,19.5,31,20.3z M28.4,20.5c0-0.7-0.3-1.2-0.7-1.6c-0.4-0.4-0.9-0.5-1.5-0.5
							c-0.7,0-1.2,0.2-1.5,0.6c-0.4,0.4-0.6,0.9-0.7,1.5H28.4L28.4,20.5z"/>
					</g>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_instagram" >
					<g>
						<path class="st0" d="M20,16.7c-1.8,0-3.3,1.5-3.3,3.3s1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3C23.3,18.1,21.8,16.7,20,16.7"/>
						<path class="st0" d="M23.8,10.6h-7.7c-2.9,0-5.4,2.4-5.4,5.4v8.2c0,2.9,2.4,5.4,5.4,5.4h7.7c2.9,0,5.4-2.4,5.4-5.4V16
							C29.2,13,26.8,10.6,23.8,10.6 M20,25.1c-2.8,0-5.1-2.3-5.1-5.1s2.3-5.1,5.1-5.1s5.1,2.3,5.1,5.1S22.8,25.1,20,25.1 M25.2,16
							c-0.7,0-1.2-0.5-1.2-1.2s0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C26.4,15.5,25.8,16,25.2,16"/>
					</g>
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_linkedin" >
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
					<path class="st1" d="M15,28.7h-3.9V16.9H15V28.7z M13,15.3L13,15.3c-1.3,0-2.2-0.9-2.2-2c0-1.2,0.9-2,2.2-2s2.2,0.9,2.2,2
						S14.4,15.3,13,15.3 M29.1,28.7h-3.9v-6.3c0-1.6-0.6-2.7-2-2.7c-1.1,0-1.7,0.7-2,1.4c-0.1,0.3-0.1,0.6-0.1,1v6.6h-3.9
						c0,0,0.1-10.7,0-11.8h3.9v1.7c0.5-0.8,1.5-2,3.5-2c2.6,0,4.5,1.7,4.5,5.3V28.7z"/>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_vimeo" >
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
					<g>
						<path class="st0" d="M30.7,16.1c-0.1,0.4-0.2,0.9-0.3,1.3c-0.3,1.2-0.9,2.3-1.5,3.4c-1.3,2.1-2.8,4.1-4.5,6c-0.9,1-1.8,1.9-3,2.6
							c-0.6,0.4-1.2,0.7-1.9,0.8c-1,0.2-1.8-0.1-2.4-0.9c-0.8-1-1.3-2.2-1.6-3.4c-0.5-2-1.1-4.1-1.7-6.1c-0.2-0.8-0.5-1.5-1-2.2
							c-0.1-0.1-0.2-0.3-0.3-0.4c-0.3-0.3-0.5-0.3-0.9-0.1c-0.5,0.3-0.9,0.6-1.4,0.9c0,0,0,0-0.1-0.1c-0.3-0.4-0.6-0.8-0.9-1.2
							c0,0,0,0,0-0.1c1.3-1.2,2.6-2.3,4-3.5c0.5-0.4,1-0.7,1.5-1c1.2-0.6,2.5-0.2,3.2,1c0.4,0.7,0.5,1.4,0.7,2.2c0.3,1.8,0.7,3.7,1,5.5
							c0.1,0.7,0.4,1.4,0.7,2c0.4,0.7,0.8,0.8,1.4,0.2c0.5-0.5,0.9-1.1,1.2-1.6c0.5-0.8,1-1.7,1.4-2.6c0.2-0.4,0.2-0.9,0.2-1.4
							c-0.1-0.6-0.4-1-1.1-1.1c-0.6-0.1-1.1,0-1.6,0.2c-0.1,0-0.2,0.1-0.3,0.1c0.1-0.4,0.3-0.7,0.4-1.1c0.4-1,1-1.9,1.8-2.7
							c0.8-0.7,1.8-1.1,3-1.2c0.6-0.1,1.2-0.1,1.7,0.1c1.1,0.3,1.8,1,2.1,2c0.1,0.4,0.1,0.7,0.2,1.1C30.7,15.4,30.7,15.8,30.7,16.1z"/>
					</g>
				</symbol>
			</svg>
			
		</div>
<!-- 	FIN SVG -->
		
		
		
		<div id="menuItems" class="dnone">
			<div id="menuItemClose"><i class="fas fa-times"></i></div>
			
			<div class="redes">
				<?php
					foreach ($headerDB->redes as $i=>$v) {
						if($v->liga !== ''){
					?>
						<div class="red">
							<a target="_blank" href="<?php echo($v->liga); ?>">
								<?php echo( $v->icono); ?>
							</a>
						</div>
					<?php
						}
					}
				?>
			</div>
				
			<div class="boxCentro">
				<div class="boxCentrado">
					<div class="menuHi"><a href="<?php echo(base_url('servicios') ); ?>">SERVICIOS</a></div><br />
					<?php
					foreach ($serviciosDB->servicios as $i=>$v) {
						?>
						<div class="menuLow"><a href="<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>"><?php echo($v->titulo); ?></a></div><br />
						<?php
					}
					?>
					<div id="menuPortafolio" class="menuHi"><a href="<?php echo(base_url('portafolio') ); ?>">PORTAFOLIO</a></div><br />
				</div>
			</div>
		</div>
		<!-- Add your site or application content here -->
        <div id="primaryContainer">
	        
			<div id="logo" class="mboxI">
				<a href="<?php echo(base_url()); ?>"><img src="<?php echo(base_url('assets/public/img/logo_inmotion.jpg')); ?>" /></a>
			</div>
			<div id="menu" class="mboxD">
				<div id="btnMenu" class="colDin1-back"><i class="fas fa-bars colDin1-op"></i></div>
				<div class="redes">
					<?php
						foreach ($headerDB->redes as $i=>$v) {
							if($v->liga !== ''){
						?>
							<div class="red">
								<a target="_blank" href="<?php echo($v->liga); ?>">
<!-- 									<object type="image/svg+xml" data="<?php echo( base_url('assets/public/img/'.$v->icono) ); ?>">SVG</object> -->
<!-- 									<img src="<?php echo( base_url('assets/public/img/'.$v->icono) ); ?>" /> -->
										<?php echo( $v->icono); ?>
								</a>
							</div>
						<?php
							}
						}
					?>
				</div>
			</div>










