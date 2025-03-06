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






// Imagenes para galeria
$data_galeria_titulo1  =  array ( 
	'name' => 'galeria0_titulo1',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl1',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_galeria_texto1  =  array ( 
	'name' => 'galeria0_texto1',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_servicio_galeria  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'galeria_foto',
	'data-conteovalin' =>"galeria",
	'data-conteovalfin' => "_foto",
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
				<div id="btnListaRegDel" onclick="delReg('servicios');">Borrar</div>
			</div>
		</div>
	</div>
</div>






	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		
		<!-- 	Clones para la seccion NOSOTROS -->	
		<?php
			echo form_upload( $data_video_portada );
			echo form_upload( $data_bloque_fondo );
			
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
		
		
		
		
		<!-- 		Clones para la seccion CLIENTES -->
		<?php
			echo form_upload( $data_servicio_galeria );
		?>
		
		<div class="registro" data-cloneinfo="foto">
			<input type="hidden" name="" class="conteo" data-conteovalin="servicios[galeria][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="galeria_foto cleanBox" data-clonetype="galeria_foto">
				<?php echo form_upload( $data_servicio_galeria ); ?>
			</div>
		</div>
		
		
		
		
	</div>
	
	
	
	
	
	
	
	
	
	




<!-- 	Seccion de nosotros -->
	<div id="servicios" class="row"><br/>
		<input type="hidden" id="idRegistro" name="registros[id]" value="<?php echo(@$articuloDB->id) ?>"></input>
		
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">servicios - Registros:</h5>
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
										$data['img'] = base_url('assets/public/img/servicios/registros/'.$articuloDB->video_portada);
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
					</div>
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
														$data['img'] = base_url('assets/public/img/servicios/registros/'.$v->fondo);
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













<!-- 	Seccion de clientes -->
	<div id="galeria" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Galeria:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="contenedor">
					<span>Si coloca contenido de titulo o texto se agregara un cuadro sobre la galería con esta información</span><br /><br />
					<div class="row">
						<div class="col-12 col-sm-6">
							<label>Titulo de bloque galeria:</label>
							<?php echo form_input( $data_galeria_titulo1 ); ?>
						</div>
						<div class="col-12 col-sm-6">
							<label>Texto del bloque galeria :</label>
							<?php echo form_input( $data_galeria_texto1 ); ?>
						</div>
					</div>
				</div>
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar una foto: <div id="galeria_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB) && property_exists($articuloDB, "galeria") && count($articuloDB->galeria) > 0 ){
						foreach ($articuloDB->galeria as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="servicios[galeria][<?php echo($i); ?>]" class="conteo" data-conteovalin="servicios[galeria][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								<div class="galeria_foto cleanBox" data-clonetype="galeria_foto">
								<?php
										if($v->foto !== ''){
											$data['img'] = base_url('assets/public/img/servicios/registros/'.$v->foto);
											$data['name'] = $v->foto;
											$data['hname'] = 'galeria'.$i.'_foto';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="galeria" data-conteovalfin="_foto" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_cliente_logo['name'] = 'galeria'.$i.'_foto';
											echo form_upload( $data_servicio_galeria );
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