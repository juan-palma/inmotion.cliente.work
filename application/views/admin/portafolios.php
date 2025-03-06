<?php
//Datos de formualirio NOSOTROS
$data_registro_titulo_general  =  array ( 
	'name' => 'registros[titulo]',
	'value' => @$articuloDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_enlace =  array ( 
	'name' => 'registros[enlace]',
	'value' => @$articuloDB->enlace,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_video_general  =  array ( 
	'name' => 'registros[video]',
	'value' => @$articuloDB->video,
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
$data_bloque_fondo_general =  array ( 
	'name' => 'registro0_fondo',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'registro_fondo'
);
$data_bloque_titulo1  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl1',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][titulo1]",
	'data-conteoval' => "name"
);
$data_bloque_texto1  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl2',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][texto1]",
	'data-conteoval' => "name"
);
$data_bloque_titulo2  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl1',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][titulo2]",
	'data-conteoval' => "name"
);
$data_bloque_texto2  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl2',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][texto2]",
	'data-conteoval' => "name"
);
$data_bloque_fondo =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'bloque_fondo',
	'data-conteovalin' =>"bloque",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);





//Datos de formualirio informes
$data_informe_icono  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'icono',
	'data-conteovalin' =>"informe",
	'data-conteovalfin' => "_icono",
	'data-conteoval' => "name"
);
$data_informe_titulo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"informes[informe][",
	'data-conteovalfin' => "][titulo]",
	'data-conteoval' => "name"
);

$data_informe_intro  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg hl2 conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"informes[informe][",
	'data-conteovalfin' => "][texto]",
	'data-conteoval' => "name"
);






//Datos de formualirio CLIENTES
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
$data_cliente_fondo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'logoIMGFondo',
	'data-conteovalin' =>"cliente",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);


?>













<div class="container area_scroll" data-page="<?php echo($actual); ?>">


<!-- Lista de registros ya existentes. -->
<div id="boxListaRegistros">
	<div class="contenedor clearfix container-fluid">
		<label>Puede editar algún registro anterior de esta lista:</label>
		<div class="row">
			<div class="lista col -md-12">
				<select id="listaRegistros">
					<option value="">- -</option>
					<?php 
					foreach($registroDB as $l){
						?>
						<option value="<?php echo($l->enlace); ?>"><?php echo($l->titulo_general); ?></option>
						<?php
					}
					?>
				</select>
				
				<div id="btnListaReg">Cargar:</div>
				<div id="btnListaRegDel" onclick="delReg('portafolios');">Borrar</div>
			</div>
		</div>
	</div>
</div>






	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		
		<!-- 	Clones para la seccion Portafolios registros general -->	
		<?php
			echo form_upload( $data_video_portada );
			echo form_upload( $data_bloque_fondo_general );
			
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="bloque" data-conteovalfin="_fondo" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
		
		
		
		<div id="formRegistro" class="registro" data-cloneinfo="formRegistro">
			<div class="valHead">
				<h5>Bloque <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="contenedor">
				
				<div class="col1">
					<div class="bloque_titulo1">
						<label>Titulo para bloque 1:</label>
						<?php
							echo form_textarea( $data_bloque_titulo1 );
						?>
					</div>
					<div class="bloque_texto1">
						<label>Cuerpo de texto para bloque 1:</label>
						<?php
							echo form_textarea( $data_bloque_texto1 );
						?>
					</div>
					
					<div class="bloque_titulo2">
						<label>Titulo para bloque 2:</label>
						<?php
							echo form_textarea( $data_bloque_titulo2 );
						?>
					</div>
					<div class="bloque_texto2">
						<label>Cuerpo de texto para bloque 2:</label>
						<?php
							echo form_textarea( $data_bloque_texto2 );
						?>
					</div>
					
				</div>
				
				
				<div class="col2">
					<div class="bloque_fondo">
						<label>Fondo:</label>
						<div class="cleanBox" data-clonetype="bloque_fondo">
						<?php echo form_upload( $data_bloque_fondo );?>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
		
		
		
		
		
		<?php 
			echo form_upload( $data_informe_icono );
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="informe" data-conteovalfin="_icono" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
									
		<div id="informe_base" class="registro" data-cloneinfo="formInforme">
			<div class="valHead">
				<h5>informe <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col -md-3">
					<div class="informe_icono">
						<label>Icono:</label>
						<div class="cleanBox" data-clonetype="icono">
							<?php echo form_upload( $data_informe_icono ); ?>
						</div>
					</div>
				</div>
				
				<div class="col -md-9">
					<div class="informe_titulo">
						<label>Titulo del informe:</label>
						<?php echo form_input( $data_informe_titulo ); ?>
					</div>
					<div class="informe_texto">
						<label>Introducción:</label>
						<?php echo form_textarea( $data_informe_intro ); ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
<!-- 		Clones para la seccion CLIENTES -->
		<?php
			echo form_upload( $data_cliente_logo );
			echo form_upload( $data_cliente_fondo );
		?>
		
		<div class="registro" data-cloneinfo="logo">
			<input type="hidden" name="" class="conteo" data-conteovalin="clientes[logos][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>Marca: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="cliente_logo cleanBox" data-clonetype="logoIMG">
				<label>Logo:</label>
				<?php echo form_upload( $data_cliente_logo ); ?>
			</div>
			<div class="cliente_fondo cleanBox" data-clonetype="logoIMGFondo">
				<label>Fondo:</label>
				<?php echo form_upload( $data_cliente_fondo ); ?>
			</div>
		</div>

		
		
		
	</div>
	
	
	
	
	
	
	
	
	
	




<!-- 	Seccion de PORTAFOLIOS -->
	<div id="portafolios" class="row"><br/>
		<input type="hidden" id="idRegistro" name="registros[id]" value="<?php echo(@$articuloDB->id) ?>"></input>
		
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Portafolios - Registros:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="contenedor">
					<div class="row">
						<div class="col-12">
							<label>Titulo del registro:</label>
							<?php echo form_input( $data_registro_titulo_general ); ?>
						</div>
						<div class="col-12 col-sm-6">
							<label>Enlace :</label>
							<?php echo form_input( $data_registro_enlace ); ?>
						</div>
						<div class="col-12 col-sm-6">
							<label>Video general:</label>
							<?php echo form_textarea( $data_registro_video_general ); ?>
						</div>
						
						<div class="col-12 col-sm-6">
							<label>En caso de no colocar un video suba una portada:</label>
							<div class="video_portada cleanBox" data-clonetype="video_portada">
							<?php
								if(isset($articuloDB)){
									if(property_exists($articuloDB, "video_portada") && $articuloDB->video_portada !== ""){
										$data['img'] = base_url('assets/public/img/portafolios/registros/'.$articuloDB->video_portada);
										$data['name'] = $articuloDB->video_portada;
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
						
						<div class="col-12">
							<label>Fondo general:</label>
							<div class="registro_fondo cleanBox" data-clonetype="registro_fondo">
							<?php
								if(isset($articuloDB)){
									if(property_exists($articuloDB, "fondo") && $articuloDB->fondo !== ""){
										$data['img'] = base_url('assets/public/img/portafolios/registros/'.$articuloDB->fondo);
										$data['name'] = $articuloDB->fondo;
										$data['hname'] = 'registro0_fondo';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										$data_bloque_fondo_general['name'] = 'registro0_fondo';
										echo form_upload( $data_bloque_fondo_general );
									}
								} else{
									$data_bloque_fondo_general['name'] = 'registro0_fondo';
									echo form_upload( $data_bloque_fondo_general );
								}
							?>
							</div>
						</div>
					</div>
					<hr class="colorgraph">
				</div>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un bloque: <div id="bloque_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB)){
						if(property_exists($articuloDB, "bloques") && count($articuloDB->bloques) > 0 ){
							foreach ($articuloDB->bloques as $i=>$v) {
								
								?>
								<div class="registro">
									<div class="valHead">
										<h5>Bloque <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
									
									<div class="contenedor">
										
										<div class="col1">
											<div class="bloque_titulo1">
												<label>Titulo para bloque 1:</label>
												<?php
													$data_bloque_titulo1['name'] = 'registros[bloque]['.$i.'][titulo1]';
													$data_bloque_titulo1['value'] = $v->titulo1;
													echo form_textarea( $data_bloque_titulo1 );
												?>
											</div>
											<div class="bloque_texto1">
												<label>Cuerpo de texto para bloque 1:</label>
												<?php
													$data_bloque_texto1['name'] = 'registros[bloque]['.$i.'][texto1]';
													$data_bloque_texto1['value'] = $v->texto1;
													echo form_textarea( $data_bloque_texto1 );
												?>
											</div>
											
											<div class="bloque_titulo2">
												<label>Titulo para bloque 2:</label>
												<?php
													$data_bloque_titulo2['name'] = 'registros[bloque]['.$i.'][titulo2]';
													$data_bloque_titulo2['value'] = $v->titulo2;
													echo form_textarea( $data_bloque_titulo2 );
												?>
											</div>
											<div class="bloque_texto2">
												<label>Cuerpo de texto para bloque 2:</label>
												<?php
													$data_bloque_texto2['name'] = 'registros[bloque]['.$i.'][texto2]';
													$data_bloque_texto2['value'] = $v->texto2;
													echo form_textarea( $data_bloque_texto2 );
												?>
											</div>
										</div>
										
										
										<div class="col2">
											<div class="bloque_fondo">
												<label>Fondo:</label>
												<div class="cleanBox" data-clonetype="bloque_fondo">
												<?php
													if(property_exists($v, "fondo") && $v->fondo !== ""){
														$data['img'] = base_url('assets/public/img/portafolios/registros/'.$v->fondo);
														$data['name'] = $v->fondo;
														$data['hname'] = 'bloque'.$i.'_fondo';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = ' data-conteovalin="bloque" data-conteovalfin="_fondo" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														$data_bloque_fondo['name'] = 'bloque'.$i.'_fondo';
														echo form_upload( $data_bloque_fondo );
													}
												?>
												</div>
											</div>
										</div>
										
										
									</div>
								</div>
								<?php
							}
						}
					}
					?>
				</div>
				
			</div>
		</div>
	</div>













<!-- 	Seccion de informes -->
	<div id="informes" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">informes:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un informe: <div id="informe_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB) && property_exists($articuloDB, "informes")){
					if(count($articuloDB->informes) > 0 ){
						foreach ($articuloDB->informes as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="valHead">
									<h5>informe <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
								</div>
								
								<div class="row">
									<div class="col -md-3">
										<div class="informe_icono">
											<label>Icono:</label>
											<div class="cleanBox" data-clonetype="icono">
											<?php
												if(property_exists($v, "icono") && $v->icono !== ""){
													$data['img'] = base_url('assets/public/img/portafolios/registros/'.$v->icono);
													$data['name'] = $v->icono;
													$data['hname'] = 'informe'.$i.'_icono';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = ' data-conteovalin="informe" data-conteovalfin="_icono" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													$data_informe_icono['name'] = 'informe'.$i.'_icono';
													echo form_upload( $data_informe_icono );
												}
											?>
											</div>
										</div>
									</div>
									
									<div class="col -md-9">
										<div class="informe_titulo">
											<label>Titulo del informe:</label>
											<?php
												$data_informe_titulo['name'] = 'informes[informe]['.$i.'][titulo]';
												$data_informe_titulo['value'] = $v->titulo;
												echo form_input( $data_informe_titulo );
											?>
										</div>
										<div class="informe_texto">
											<label>Introducción:</label>
											<?php
												$data_informe_intro['name'] = 'informes[informe]['.$i.'][texto]';
												//$encontrar = array("<br />");
												//$remplazar = '\r\n ';
												//$nuevoValor = str_replace($encontrar, $remplazar, $v->texto);
												$data_informe_intro['value'] = $v->texto;
												echo form_textarea( $data_informe_intro );
											?>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					}
					?>
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
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un cliente: <div id="clientes_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB) && property_exists($articuloDB, "logos") && count($articuloDB->logos) > 0 ){
						foreach ($articuloDB->logos as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="clientes[logos][<?php echo($i); ?>]" class="conteo" data-conteovalin="clientes[logos][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>Marca: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								<div class="cliente_logo cleanBox" data-clonetype="logoIMG">
								<label>Logo:</label>
								<?php
										if($v->logo !== ''){
											$data['img'] = base_url('assets/public/img/portafolios/registros/'.$v->logo);
											$data['name'] = $v->logo;
											$data['hname'] = 'cliente'.$i.'_logo';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="cliente" data-conteovalfin="_logo" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_cliente_logo['name'] = 'cliente'.$i.'_logo';
											echo form_upload( $data_cliente_logo );
										}
								?>
								</div>
								<div class="cliente_fondo cleanBox" data-clonetype="logoIMGFondo">
								<label>Fondo:</label>
								<?php
										if($v->fondo !== ''){
											$data['img'] = base_url('assets/public/img/portafolios/registros/'.$v->fondo);
											$data['name'] = $v->fondo;
											$data['hname'] = 'cliente'.$i.'_fondo';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="cliente" data-conteovalfin="_fondo" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_cliente_fondo['name'] = 'cliente'.$i.'_fondo';
											echo form_upload( $data_cliente_fondo );
										}
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


</form>