<?php

//Datos de formualirio SERVICIOS
$data  =  array ( 
	'name' => 'servicios[titulo]',
	'value' => @$serviciosDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_video  =  array ( 
	'name' => 'servicios[video]',
	'value' => @$serviciosDB->video_general,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_video_portada =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'video_portada'
);


$data_servicio_icono  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'icono',
	'data-conteovalin' =>"servicio",
	'data-conteovalfin' => "_icono",
	'data-conteoval' => "name"
);
$data_servicio_foto  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'foto',
	'data-conteovalin' =>"servicio",
	'data-conteovalfin' => "_foto",
	'data-conteoval' => "name"
);
$data_servicio_titulo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"servicios[servicio][",
	'data-conteovalfin' => "][titulo]",
	'data-conteoval' => "name"
);

$data_servicio_intro  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg hl2 conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"servicios[servicio][",
	'data-conteovalfin' => "][texto]",
	'data-conteoval' => "name"
);

$data_servicio_link  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"servicios[servicio][",
	'data-conteovalfin' => "][enlace]",
	'data-conteoval' => "name"
);






//Datos de formualirio CLIENTES
$data_cliente_titulo_general  =  array ( 
	'name' => 'clientes[titulo]',
	'value' => @$clientesDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_cliente_logo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'logoIMG',
	'data-conteovalin' =>"cliente",
	'data-conteovalfin' => "_logo",
	'data-conteoval' => "name"
);





//Datos de formualirio PORTAFOLIOS
$data_portafolios_titulo_general  =  array ( 
	'name' => 'portafolios[titulo]',
	'value' => @$portafoliosDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_portafolio_fondo =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'portafolio_fondo',
	'data-conteovalin' =>"portafolio",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);
$data_portafolio_titulo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"portafolios[portafolio][",
	'data-conteovalfin' => "][titulo]",
	'data-conteoval' => "name"
);

$data_portafolio_intro  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg hl2 conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"portafolios[portafolio][",
	'data-conteovalfin' => "][texto]",
	'data-conteoval' => "name"
);

$data_portafolio_link  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"portafolios[portafolio][",
	'data-conteovalfin' => "][enlace]",
	'data-conteoval' => "name"
);





//Datos de formualirio NOSOTROS
$data_nosotros_titulo_general  =  array ( 
	'name' => 'nosotros[titulo]',
	'value' => @$nosotrosDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_team_fondo =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'team_fondo',
	'data-conteovalin' =>"team",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);
$data_team_color  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"nosotros[team][",
	'data-conteovalfin' => "][color]",
	'data-conteoval' => "name"
);
$data_team_nombre  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"nosotros[team][",
	'data-conteovalfin' => "][nombre]",
	'data-conteoval' => "name"
);

$data_team_apellido  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"nosotros[team][",
	'data-conteovalfin' => "][apellido]",
	'data-conteoval' => "name"
);

$data_team_puesto  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"nosotros[team][",
	'data-conteovalfin' => "][puesto]",
	'data-conteoval' => "name"
);



?>



<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	
	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<?php 
			echo form_upload( $data_servicio_icono );
			echo form_upload( $data_servicio_foto );
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_icono" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
									
		<div id="servicio_base" class="registro" data-cloneinfo="formServicio">
			<div class="valHead">
				<h5>Servicio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col -md-3">
					<div class="servicio_icono">
						<label>Icono:</label>
						<div class="cleanBox" data-clonetype="icono">
							<?php echo form_upload( $data_servicio_icono ); ?>
						</div>
					</div>
					<div class="servicio_foto">
						<label>Foto:</label>
						<div class="cleanBox" data-clonetype="foto">
							<?php echo form_upload( $data_servicio_foto ); ?>
						</div>
					</div>
				</div>
				
				<div class="col -md-9">
					<div class="servicio_titulo">
						<label>Titulo del Servicio:</label>
						<?php echo form_input( $data_servicio_titulo ); ?>
					</div>
					<div class="servicio_texto">
						<label>Introducción:</label>
						<?php echo form_textarea( $data_servicio_intro ); ?>
					</div>
					<div class="servicio_enlace">
						<label>Enlace del servicio:</label>
						<?php echo form_input( $data_servicio_link ); ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
<!-- 		Clones para la seccion CLIENTES -->
		<?php
			echo form_upload( $data_cliente_logo );
			echo form_upload( $data_video_portada );
		?>
		
		<div class="registro" data-cloneinfo="logo">
			<input type="hidden" name="" class="conteo" data-conteovalin="clientes[logos][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>logo: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="cleanBox" data-clonetype="logoIMG">
				<?php echo form_upload( $data_cliente_logo ); ?>
			</div>
		</div>
		
		
		
		
<!-- 	Clones para la seccion PORTAFOLIOS -->	
		<?php echo form_upload( $data_portafolio_fondo ); ?>
		
		<div id="portafolio_base" class="registro" data-cloneinfo="formPortafolio">
			<div class="valHead">
				<h5>PORTAFOLIO <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col -md-3">
					<div class="portafolio_fondo">
						<label>Fondo:</label>
						<div class="cleanBox" data-clonetype="portafolio_fondo">
							<?php echo form_upload( $data_portafolio_fondo ); ?>
						</div>
					</div>
				</div>
				
				<div class="col -md-9">
					<div class="portafolio_titulo">
						<label>Titulo del portafolio:</label>
						<?php echo form_input( $data_portafolio_titulo ); ?>
					</div>
					<div class="portafolio_enlace">
						<label>Enlace del portafolio:</label>
						<?php echo form_input( $data_portafolio_link ); ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
<!-- 	Clones para la seccion NOSOTROS -->	
		<?php echo form_upload( $data_team_fondo ); ?>
		
		<div id="nosotros_team_base" class="registro" data-cloneinfo="formNosotros">
			<div class="valHead">
				<h5>Integrante <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col -md-3">
					<div class="team_fondo">
						<label>Fondo:</label>
						<div class="cleanBox" data-clonetype="team_fondo">
							<?php echo form_upload( $data_team_fondo ); ?>
						</div>
					</div>
					<div class="team_color">
						<label>Color para el fondo de la foto: (formato web = #ffffff)</label>
						<?php echo form_input( $data_team_color ); ?>
					</div>
				</div>
				
				<div class="col -md-9">
					<div class="team_nombre">
						<label>Nombre del integrante:</label>
						<?php echo form_input( $data_team_nombre ); ?>
					</div>
					<div class="team_apellido">
						<label>Apellido del integrante:</label>
						<?php echo form_input( $data_team_apellido ); ?>
					</div>
					<div class="team_puesto">
						<label>Puesto del integrante:</label>
						<?php echo form_input( $data_team_puesto ); ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de servicios -->
	<div id="servicios" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Servicios:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php echo form_input( $data ); ?>
				
				<label>Video general:</label>
				<?php echo form_textarea( $data_video ); ?>
				
				<div class="">
					<label>En caso de no colocar un video suba una portada:</label>
					<div class="video_portada cleanBox" data-clonetype="video_portada">
					<?php
						if(isset($serviciosDB)){
							if(property_exists($serviciosDB, "video_portada") && $serviciosDB->video_portada !== ""){
								$data['img'] = base_url('assets/public/img/servicios/'.$serviciosDB->video_portada);
								$data['name'] = $serviciosDB->video_portada;
								$data['hname'] = 'base0_video_portada';
								$this->load->view('admin/plantillas/img_block', $data);
							} else{
								$data_video_portada['name'] = 'base0_video_portada';
								echo form_upload( $data_video_portada );
							}
						} else{
							$data_video_portada['name'] = 'base0_video_portada';
							echo form_upload( $data_video_portada );
						}
					?>
					</div>
				</div>
				
				<div class="boxRepeat">
					<div class="boxMainClone"> Agregar un servicio: <div id="servicio_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<div class="boxDrag">
					<?php
					if(count($serviciosDB->servicios) > 0 ){
						foreach ($serviciosDB->servicios as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="boxShow">
									<div class="valHead">
										<h5>Servicio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1). ' - ' .$v->titulo; ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
								</div>
								
								<div class="boxHide">
									<div class="row">
										<div class="col -md-3">
											<div class="servicio_icono">
												<label>Icono:</label>
												<div class="cleanBox" data-clonetype="icono">
												<?php
													if(property_exists($v, "icono") && $v->icono !== ""){
														$data['img'] = base_url('assets/public/img/servicios/'.$v->icono);
														$data['name'] = $v->icono;
														$data['hname'] = 'servicio'.$i.'_icono';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_icono" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														$data_servicio_icono['name'] = 'servicio'.$i.'_icono';
														echo form_upload( $data_servicio_icono );
													}
												?>
												</div>
											</div>
											<div class="servicio_foto">
												<label>Foto:</label>
												<div class="cleanBox"  data-clonetype="foto">
												<?php
													if(property_exists($v, "foto") && $v->foto !== ""){
														$data['img'] = base_url('assets/public/img/servicios/'.$v->foto);
														$data['name'] = $v->foto;
														$data['hname'] = 'servicio'.$i.'_foto';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_foto" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														$data_servicio_foto['name'] = 'servicio'.$i.'_foto';
														echo form_upload( $data_servicio_foto );
													}
												?>
												</div>
											</div>
										</div>
										
										<div class="col -md-9">
											<div class="servicio_titulo">
												<label>Titulo del Servicio:</label>
												<?php
													$data_servicio_titulo['name'] = 'servicios[servicio]['.$i.'][titulo]';
													$data_servicio_titulo['value'] = $v->titulo;
													echo form_input( $data_servicio_titulo );
												?>
											</div>
											<div class="servicio_texto">
												<label>Introducción:</label>
												<?php
													$data_servicio_intro['name'] = 'servicios[servicio]['.$i.'][texto]';
													//$encontrar = array("<br />");
													//$remplazar = '\r\n ';
													//$nuevoValor = str_replace($encontrar, $remplazar, $v->texto);
													$data_servicio_intro['value'] = $v->texto;
													echo form_textarea( $data_servicio_intro );
												?>
											</div>
											<div class="servicio_enlace">
												<label>Enlace del servicio:</label>
												<?php
													$data_servicio_link['name'] = 'servicios[servicio]['.$i.'][enlace]';
													$data_servicio_link['value'] = $v->enlace;
													echo form_input( $data_servicio_link );
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	

	
<!-- 	Seccion de clientes -->
	<div id="clientes" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Clientes:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php echo form_input( $data_cliente_titulo_general ); ?>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un cliente: <div id="clientes_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<div class="boxDrag">
					<?php
					if(property_exists($clientesDB, "logos") && count($clientesDB->logos) > 0 ){
						foreach ($clientesDB->logos as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="clientes[logos][<?php echo($i); ?>]" class="conteo" data-conteovalin="clientes[logos][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>logo: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								<div class="cleanBox" data-clonetype="logoIMG">
								<?php
										$data['img'] = base_url('assets/public/img/clientes/'.$v->logo);
										$data['name'] = $v->logo;
										$data['hname'] = 'cliente'.$i.'_logo';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = ' data-conteovalin="cliente" data-conteovalfin="_logo" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
								?>
								</div>
							</div>
							<?php
						}
					}
					?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de portafolios -->
	<div id="portafolios" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Portafolios:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php echo form_input( $data_portafolios_titulo_general ); ?>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un portafolio: <div id="portafolios_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<div class="boxDrag">
					
					<?php
					if(property_exists($portafoliosDB, "portafolios") && count($portafoliosDB->portafolios) > 0 ){
						foreach ($portafoliosDB->portafolios as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="boxShow">
									<div class="valHead">
										<h5>Portafolio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1). ' - ' .$v->enlace; ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
								</div>
								
								<div class="boxHide">
									<div class="row">
										<div class="col -md-3">
											<div class="portafolio_fondo">
												<label>Fondo:</label>
												<div class="cleanBox" data-clonetype="portafolio_fondo">
												<?php
													if(property_exists($v, "fondo") && $v->fondo !== ""){
														$data['img'] = base_url('assets/public/img/portafolios/'.$v->fondo);
														$data['name'] = $v->fondo;
														$data['hname'] = 'portafolio'.$i.'_fondo';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = ' data-conteovalin="portafolio" data-conteovalfin="_fondo" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														$data_portafolio_fondo['name'] = 'portafolio'.$i.'_fondo';
														echo form_upload( $data_portafolio_fondo );
													}
												?>
												</div>
											</div>
										</div>
										
										<div class="col -md-9">
											<div class="portafolio_titulo">
												<label>Titulo del portafolio:</label>
												<?php
													$data_portafolio_titulo['name'] = 'portafolios[portafolio]['.$i.'][titulo]';
													$data_portafolio_titulo['value'] = $v->titulo;
													echo form_input( $data_portafolio_titulo );
												?>
											</div>
											<div class="portafolio_enlace">
												<label>Enlace del servicio:</label>
												<?php
													$data_portafolio_link['name'] = 'portafolios[portafolio]['.$i.'][enlace]';
													$data_portafolio_link['value'] = $v->enlace;
													echo form_input( $data_portafolio_link );
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
					</div>
				</div>
				
			</div>
		</div>
	</div>










<!-- 	Seccion de nosotros -->
	<div id="nosotros" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Nosotros:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php echo form_input( $data_nosotros_titulo_general ); ?>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un integrante: <div id="team_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<div class="boxDrag">
					
					<?php
					if(property_exists($nosotrosDB, "team") && count($nosotrosDB->team) > 0 ){
						foreach ($nosotrosDB->team as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="boxShow">
									<div class="valHead">
										<h5>Integrante <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1).' - '.$v->nombre.' '.$v->apellido; ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
								</div>
								
								<div class="boxHide">
									<div class="row">
										<div class="col -md-3">
											<div class="team_fondo">
												<label>Fondo:</label>
												<div class="cleanBox" data-clonetype="team_fondo">
												<?php
													if(property_exists($v, "fondo") && $v->fondo !== ""){
														$data['img'] = base_url('assets/public/img/nosotros/'.$v->fondo);
														$data['name'] = $v->fondo;
														$data['hname'] = 'team'.$i.'_fondo';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = ' data-conteovalin="team" data-conteovalfin="_fondo" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														$data_team_fondo['name'] = 'team'.$i.'_fondo';
														echo form_upload( $data_team_fondo );
													}
												?>
												</div>
											</div>
											<div class="team_color">
												<label>Color para el fondo de la foto:  (formato web = #ffffff)</label>
												<?php
													$data_team_color['name'] = 'nosotros[team]['.$i.'][color]';
													$data_team_color['value'] = $v->color;
													echo form_input( $data_team_color );
												?>
											</div>
										</div>
										
										<div class="col -md-9">
											<div class="team_nombre">
												<label>Nombre del integrante:</label>
												<?php
													$data_team_nombre['name'] = 'nosotros[team]['.$i.'][nombre]';
													$data_team_nombre['value'] = $v->nombre;
													echo form_input( $data_team_nombre );
												?>
											</div>
											<div class="team_apellido">
												<label>Apellido del integrante:</label>
												<?php
													$data_team_apellido['name'] = 'nosotros[team]['.$i.'][apellido]';
													$data_team_apellido['value'] = $v->apellido;
													echo form_input( $data_team_apellido );
												?>
											</div>
											<div class="team_puesto">
												<label>Puesto del integrante</label>
												<?php
													$data_team_puesto['name'] = 'nosotros[team]['.$i.'][puesto]';
													$data_team_puesto['value'] = $v->puesto;
													echo form_input( $data_team_puesto );
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	
	
	
	
	
	
	
	
	
	
</div>


</form>