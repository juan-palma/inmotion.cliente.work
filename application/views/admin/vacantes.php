<?php

//Datos de formualirio vacantes
$data  =  array ( 
	'name' => 'vacantes[titulo]',
	'value' => @$vacantesDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_video  =  array ( 
	'name' => 'vacantes[video]',
	'value' => @$vacantesDB->video_general,
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


$data_vacante_foto  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'foto',
	'data-conteovalin' =>"vacante",
	'data-conteovalfin' => "_foto",
	'data-conteoval' => "name"
);
$data_vacante_titulo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"vacantes[vacante][",
	'data-conteovalfin' => "][titulo]",
	'data-conteoval' => "name"
);

$data_vacante_intro  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg hl2 conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"vacantes[vacante][",
	'data-conteovalfin' => "][texto]",
	'data-conteoval' => "name"
);

$data_vacante_link  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"vacantes[vacante][",
	'data-conteovalfin' => "][enlace]",
	'data-conteoval' => "name"
);




?>



<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	
	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<?php 
			echo form_upload( $data_video_portada );
			echo form_upload( $data_vacante_foto );
			
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="vacante" data-conteovalfin="_icono" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
									
		<div id="vacante_base" class="registro" data-cloneinfo="formvacante">
			<div class="valHead">
				<h5>vacante <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col -md-3">
					<div class="vacante_foto">
						<label>Foto:</label>
						<div class="cleanBox" data-clonetype="foto">
							<?php echo form_upload( $data_vacante_foto ); ?>
						</div>
					</div>
				</div>
				
				<div class="col -md-9">
					<div class="vacante_titulo">
						<label>Titulo del vacante:</label>
						<?php echo form_input( $data_vacante_titulo ); ?>
					</div>
					<div class="vacante_texto">
						<label>Introducción:</label>
						<?php echo form_textarea( $data_vacante_intro ); ?>
					</div>
					<div class="vacante_enlace">
						<label>Correo a donde dirigir la vacante:</label>
						<?php echo form_input( $data_vacante_link ); ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de vacantes -->
	<div id="vacantes" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Vacantes:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="contenedor">
					<div class="row">
						<div class="col-12">
							<label>Titulo de la sección:</label>
							<?php echo form_input( $data ); ?>
						</div>
						
						<div class="col-12 col-sm-6">
							<label>Video general:</label>
							<?php echo form_textarea( $data_video ); ?>
						</div>
				
						<div class="col-12 col-sm-6">
							<label>En caso de no colocar un video suba una portada:</label>
							<div class="video_portada cleanBox" data-clonetype="video_portada">
							<?php
								if(isset($vacantesDB)){
									if(property_exists($vacantesDB, "video_portada") && $vacantesDB->video_portada !== ""){
										$data['img'] = base_url('assets/public/img/vacantes/'.$vacantesDB->video_portada);
										$data['name'] = $vacantesDB->video_portada;
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
					<div class="boxMainClone">Agregar un vacante: <div id="vacante_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(property_exists($vacantesDB, "vacantes") && count($vacantesDB->vacantes) > 0 ){
						foreach ($vacantesDB->vacantes as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="valHead">
									<h5>vacante <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
								</div>
								
								<div class="row">
									<div class="col -md-3">
										<div class="vacante_foto">
											<label>Foto:</label>
											<div class="cleanBox"  data-clonetype="foto">
											<?php
												if(property_exists($v, "foto") && $v->foto !== ""){
													$data['img'] = base_url('assets/public/img/vacantes/'.$v->foto);
													$data['name'] = $v->foto;
													$data['hname'] = 'vacante'.$i.'_foto';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = ' data-conteovalin="vacante" data-conteovalfin="_foto" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													$data_vacante_foto['name'] = 'vacante'.$i.'_foto';
													echo form_upload( $data_vacante_foto );
												}
											?>
											</div>
										</div>
									</div>
									
									<div class="col -md-9">
										<div class="vacante_titulo">
											<label>Titulo del vacante:</label>
											<?php
												$data_vacante_titulo['name'] = 'vacantes[vacante]['.$i.'][titulo]';
												$data_vacante_titulo['value'] = $v->titulo;
												echo form_input( $data_vacante_titulo );
											?>
										</div>
										<div class="vacante_texto">
											<label>Introducción:</label>
											<?php
												$data_vacante_intro['name'] = 'vacantes[vacante]['.$i.'][texto]';
												$data_vacante_intro['value'] = $v->texto;
												echo form_textarea( $data_vacante_intro );
											?>
										</div>
										<div class="vacante_enlace">
											<label>Correo a donde dirigir la vacante:</label>
											<?php
												$data_vacante_link['name'] = 'vacantes[vacante]['.$i.'][enlace]';
												$data_vacante_link['value'] = $v->enlace;
												echo form_input( $data_vacante_link );
											?>
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


</form>