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
				
<!-- 		<link rel="shortcut icon" href="favicon.ico?v1" /> -->
<!-- 		<link rel="icon" href="favicon.ico?v1" /> -->
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
				
		<title><?php echo($titulo); ?> | Sistema AMEX - GAM</title>
		<meta name="description" content="Sistema AMEX - GAM | Sistema de administración, control y seguimiento de la información" />

					
		<meta name="dcterms.audience" content="Global" />
		<meta name="rating" content="General" />
		
		<link href="https://fonts.googleapis.com/css?family=Abel|Anton|Fjalla+One&display=swap" rel="stylesheet">
		
		<link href="<?php echo(base_url('assets/admin/css/boostrap.css')) ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo(base_url('assets/admin/css/animate.css')) ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo(base_url('assets/admin/css/metismenu.css')) ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo(base_url('assets/admin/css/initial.css')) ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo(base_url('assets/admin/css/font_awesome.css')) ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo(base_url('assets/admin/css/theme.css')) ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo(base_url('assets/admin/css/sweet-alert.css')) ?>" rel="stylesheet" />
		<link href="<?php echo(base_url('assets/admin/css/main.css')) ?>" rel="stylesheet" type="text/css">
		
		<?php
		//$this->load->view('admin/head-c');
		?>
		
		<!-- Meta Data de verificacion de sitios web. -->
		<meta name="msvalidate.01" content="ED387E3F99B5758EB607324E9928F951" />
		<meta name="p:domain_verify" content="92115dc4d60becb13618274218b951f2"/>
		
		
		<!-- direct info -->
		<style type="text/css">
			/*login*/
			.login-box{
				width: 600px;
    			margin: 20vh auto;
    			padding: 2%;
    			color: #454d55!important;
    			background-color: #d6d7db;
    			background-size: 150px;
    			background-image: url('<?php echo(base_url('assets/admin/img/background-login-box.png'));?>');
			}
			.btn{
				background-color: #007bff!important;
			}
			
			<?php if(isset($fondo) && $fondo !== ''){  ?>
			.theme-sistem{
			    background-image: url(<?php echo(base_url('assets/admin/img/loginBackground/'.$fondo)); ?>);
			}
			<?php } ?>
		</style>
		
		<?php if(isset($actual) && $actual !== ''){
			?>
		<script type="text/javascript"> var pageActual = '<?php echo($actual) ?>'; </script>
			<?php
		} ?>
						
	</head>
	<body itemscope="itemscope" itemtype="http://schema.org/WebPage" class="theme-sistem">
		
		<!-- Add your site or application content here -->
        <main id="primaryContainer">
		
		
