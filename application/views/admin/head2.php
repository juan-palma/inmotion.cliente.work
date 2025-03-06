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
		
<!-- 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
		<link href="https://fonts.googleapis.com/css?family=Abel|Anton|Fjalla+One&display=swap" rel="stylesheet">
<!-- 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
		
		
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo(base_url('assets/common/css/bootstrap.min.css')) ?>" rel="stylesheet" />
	    <link href="<?php echo(base_url('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.1')) ?>" rel="stylesheet" />
		<link href="<?php echo(base_url('assets/admin/css/main.css')) ?>" rel="stylesheet" type="text/css">
				
		
		<!-- Meta Data de verificacion de sitios web. -->
		<meta name="msvalidate.01" content="ED387E3F99B5758EB607324E9928F951" />
		<meta name="p:domain_verify" content="92115dc4d60becb13618274218b951f2"/>
		
		<!-- direct info -->
		<style type="text/css">
			<?php if(isset($fondo) && $fondo !== ''){  ?>
			.theme-sistem{
			    background-image: url(<?php echo(base_url('assets/admin/img/loginBackground/'.$fondo)); ?>);
			}
			<?php } ?>
		</style>
		
		<?php if(isset($actual) && $actual !== ''){
			?>
		<script type="text/javascript">
			var pageActual = '<?php echo($actual); ?>';
			var baseDir = '<?php echo(base_url()); ?>';
		</script>
			<?php
		} ?>
						
	</head>
	<body itemscope="itemscope" itemtype="http://schema.org/WebPage" class="deep-space" data-theme="deep-space">
		
		<!-- Add your site or application content here -->
        <main id="<?php echo($actual); ?>" class="primaryContainer">
			    <div class="wrapper">
			        <div class="sidebar" data-color="black" data-image="<?php echo(base_url('assets/common/img/sideBack.jpg')); ?>"> <!-- imagen de la barra lateral del panel -->
			            <div class="sidebar-wrapper">
			                <div class="branding">
				                <div class="sistemLogo">
					                <?php $img = (!empty($db->adminLogo)) ? 'assets/admin/img/'.$db->adminLogo : 'assets/admin/img/adminLogoBase.png'; ?>
									<img src="<?php echo(base_url($img)); ?>" />
				                </div>
			                </div>
			                <div class="logo">
			                    <a href="#" class="simple-text logo-mini">
			                        CMS
			                    </a>
			                    <a href="#" class="simple-text logo-normal">
			                        Panel Control
			                    </a>
			                </div>
			                <div class="user">
			                    <div class="photo">
									<?php $img = (isset($_SESSION['userAvatar'])) ? 'assets/admin/img/'.$_SESSION['userAvatar'] : 'assets/admin/img/avatar_default.svg'; ?>
			                        <img src="<?php echo(base_url($img)); ?>" />
			                    </div>
			                    <div class="info ">
			                        <a data-toggle="collapse" href="#collapseProfile" class="collapsed">
			                            <span><?php echo($_SESSION['nombre'] . ' ' . $_SESSION['apaterno']) ?>
			<!--                                 <b class="caret"></b> -->
			                            </span>
			                        </a>
			<!--
			                        <div class="collapse" id="collapseProfile">
			                            <ul class="nav">
			                                <li>
			                                    <a class="profile-dropdown" href="#">
			                                        <span class="sidebar-mini">MP</span>
			                                        <span class="sidebar-normal">Mi Perfil</span>
			                                    </a>
			                                </li>
			                                <li>
			                                    <a class="profile-dropdown" href="#">
			                                        <span class="sidebar-mini">PE</span>
			                                        <span class="sidebar-normal">Personalizar</span>
			                                    </a>
			                                </li>
			                            </ul>
			                        </div>
			-->
			                    </div>
			                </div>
			                
			                
			                <ul class="nav">
				                <?php
					                require_once(VIEWPATH.'admin/customers_modules.php');
					                foreach($_SESSION['modulos'] as $m){
						                $colaps = false;
						                if($m->permiso_sub !== ''){
							                $sub = explode(":", $m->permiso_sub);
							                if(count($sub) > 0){
								                $colaps = true;
							                }
						                }
						                
										$label = str_replace('_', ' ', $m->permiso_modulo);
										$icono = 'nc-icon nc-grid-45';
										
										if(isset($customModuleIcon[$m->permiso_modulo])){
											if($customModuleIcon[$m->permiso_modulo] !== ''){
												if(isset($customModuleIcon[$m->permiso_modulo]->label)){
													if($customModuleIcon[$m->permiso_modulo]->label !== ''){
														$label = $customModuleIcon[$m->permiso_modulo]->label;
													}
												}
												if(isset($customModuleIcon[$m->permiso_modulo]->icono)){
													if($customModuleIcon[$m->permiso_modulo]->icono !== ''){
														$icono = $customModuleIcon[$m->permiso_modulo]->icono;
													}
												}
											}
										}
							                
						                if($colaps === false){
							                ?>
							                <li class="nav-item ">
						                        <a class="nav-link" href="<?php echo(base_url('admin/'.$m->permiso_modulo)); ?>">
						                            <i class="<?php echo($icono); ?>"></i>
						                            <p><?php echo($label); ?></p>
						                        </a>
						                    </li>
							                <?php
						                } else{
							                $label = 'nc-layers-3';
							                ?>
							                <li class="nav-item">
						                        <a class="nav-link" data-toggle="collapse" href="#modulo<?php echo($m->permiso_modulo); ?>">
						                            <i class="nc-icon <?php echo($icono); ?>"></i>
						                            <p>
						                                <?php echo($label); ?>
						                                <b class="caret"></b>
						                            </p>
						                        </a>
						                        <div class="collapse " id="modulo<?php echo($m->permiso_modulo); ?>">
						                            <ul class="nav">
							                            <?php
								                            foreach($sub as $s){
									                            $subLabel = str_replace('_', ' ', $s);
																$subIcono = 'nc-grid-45';
																
																if(isset($customModuleIcon[$m->permiso_modulo])){
																	if($customModuleIcon[$m->permiso_modulo] !== ''){
																		if(isset($customModuleIcon[$m->permiso_modulo]->sub)){
																			if($customModuleIcon[$m->permiso_modulo]->sub !== '' && count($customModuleIcon[$m->permiso_modulo]->sub) > 0){
																				$subArray = $customModuleIcon[$m->permiso_modulo]->sub;
																				if(isset($subArray[$s]->label)){
																					if($subArray[$s]->label !== ''){
																						$subLabel = $subArray[$s]->label;
																					}
																				}
																				if(isset($subArray[$s]->icono)){
																					if($subArray[$s]->icono !== ''){
																						$subIcono = $subArray[$s]->icono;
																					}
																				}
																			}
																		}
																	}
																}
																
																?>
																<li class="nav-item ">
								                                    <a class="nav-link" href="<?php echo(base_url('admin/'.$s)); ?>">
								                                        <span class="sidebar-mini"><?php echo strtoupper(substr($subLabel, 0, 1)); ?></span>
								                                        <span class="sidebar-normal"><?php echo($subLabel); ?></span>
								                                    </a>
								                                </li>
																<?php
								                            }
								                        ?>
							                        </ul>
						                        </div>
						                    </li>
							                <?php
						                }
					                }
				                ?>
			                </ul>
			            </div>
			        </div>
			        
			        
			        
			        <div class="main-panel">
			            <!-- Navbar -->
			            <nav class="navbar navbar-expand-lg ">
			                <div class="container-fluid">
			                    <div class="navbar-wrapper">
			                        <div class="navbar-minimize">
			                            <button id="minimizeSidebar" class="btn btn-info btn-fill btn-round btn-icon d-none d-lg-block">
			                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
			                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
			                            </button>
			                        </div>
			                    </div>
			                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			                        <span class="navbar-toggler-bar burger-lines"></span>
			                        <span class="navbar-toggler-bar burger-lines"></span>
			                        <span class="navbar-toggler-bar burger-lines"></span>
			                    </button>
			                    <div class="collapse navbar-collapse justify-content-end">
			<!--
			                        <ul class="nav navbar-nav mr-auto">
			                            <form class="navbar-form navbar-left navbar-search-form" role="search">
			                                <div class="input-group">
			                                    <i class="nc-icon nc-zoom-split"></i>
			                                    <input type="text" value="" class="form-control" placeholder="Search...">
			                                </div>
			                            </form>
			                        </ul>
			-->
			                        <ul class="navbar-nav">
			                            <li class="dropdown nav-item">
			                                <ul class="dropdown-menu">
			                                    <a class="dropdown-item" href="#">Create New Post</a>
			                                    <a class="dropdown-item" href="#">Manage Something</a>
			                                    <a class="dropdown-item" href="#">Do Nothing</a>
			                                    <a class="dropdown-item" href="#">Submit to live</a>
			                                    <li class="divider"></li>
			                                    <a class="dropdown-item" href="#">Another action</a>
			                                </ul>
			                            </li>
			<!--
			                            <li class="dropdown nav-item">
			                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
			                                    <i class="nc-icon nc-bell-55"></i>
			                                    <span class="notification">5</span>
			                                    <span class="d-lg-none">Notification</span>
			                                </a>
			                                <ul class="dropdown-menu">
			                                    <a class="dropdown-item" href="#">Notification 1</a>
			                                    <a class="dropdown-item" href="#">Notification 2</a>
			                                    <a class="dropdown-item" href="#">Notification 3</a>
			                                    <a class="dropdown-item" href="#">Notification 4</a>
			                                    <a class="dropdown-item" href="#">Notification 5</a>
			                                </ul>
			                            </li>
			-->
			                            <li class="nav-item dropdown">
			                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                                    <i class="nc-icon nc-bullet-list-67"></i>
			                                </a>
			                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			<!--
			                                    <a class="dropdown-item" href="#">
			                                        <i class="nc-icon nc-email-85"></i> Messages
			                                    </a>
			                                    <a class="dropdown-item" href="#">
			                                        <i class="nc-icon nc-umbrella-13"></i> Help Center
			                                    </a>
			                                    <a class="dropdown-item" href="#">
			                                        <i class="nc-icon nc-settings-90"></i> Settings
			                                    </a>
			                                    <div class="divider"></div>
			                                    <a class="dropdown-item" href="#">
			                                        <i class="nc-icon nc-lock-circle-open"></i> Lock Screen
			                                    </a>
			-->
			                                    <a href="<?php echo(base_url('admin/panel/out')); ?>" class="dropdown-item text-danger">
			                                        <i class="nc-icon nc-button-power"></i> Salir
			                                    </a>
			                                </div>
			                            </li>
			                        </ul>
			                    </div>
			                </div>
			            </nav>
			            <!-- End Navbar -->
			            <div class="content">
			                <div class="container-fluid">

		
		
