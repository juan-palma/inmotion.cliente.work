<?php

//Datos de formualirio PORTAFOLIOS
$data_team_fondo =  array ( 
	'name' => 'general0_fondo',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'general_fondo',
	'data-conteovalin' =>"general",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);
$data_general_telefono  =  array ( 
	'name' => 'general[telefono]',
	'value' => @$generalDB->telefono,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_correo  =  array ( 
	'name' => 'general[correo]',
	'value' => @$generalDB->correo,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_mapa  =  array ( 
	'name' => 'general[mapa]',
	'value' => @$generalDB->mapa,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_correo_form  =  array ( 
	'name' => 'general[correo_form]',
	'value' => @$generalDB->correo_form,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_direccion  =  array ( 
	'name' => 'general[direccion]',
	'value' => @$generalDB->direccion,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_facebook  =  array ( 
	'name' => 'general[facebook]',
	'value' => @$generalDB->facebook,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_instagram  =  array ( 
	'name' => 'general[instagram]',
	'value' => @$generalDB->instagram,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_linkedin  =  array ( 
	'name' => 'general[linkedin]',
	'value' => @$generalDB->linkedin,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_behance  =  array ( 
	'name' => 'general[behance]',
	'value' => @$generalDB->behance,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_vimeo  =  array ( 
	'name' => 'general[vimeo]',
	'value' => @$generalDB->vimeo,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general  =  array ( 
	'name' => 'general[behance]',
	'value' => @$generalDB->behance,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);



?>



<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	
	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<?php 
			echo form_upload( $data_team_fondo );
			
			$data['classAdd'] = '';
			$data['propertyAdd'] = ' data-conteovalin="general" data-conteovalfin="_fondo" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de nosotros -->
	<div id="nosotros" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Información general del sitio WEB:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
			<?php
			if(isset($generalDB)){
			?>
				<div class="registro">
					<div class="row">
						<div class="col -md-3">
							<div class="general_color_fondo">
								<label>Color de fondo:</label>
								<?php
									$data_general['name'] = 'general[color_fondo]';
									$data_general['value'] = @$generalDB->color_fondo;
									echo form_input( $data_general );
								?>
							</div>
							<div class="body_fondo">
								<label>Fondo del sitio web:</label>
								<div class="cleanBox" data-clonetype="general_fondo">
								<?php
									if(property_exists($generalDB, "fondo") && $generalDB->fondo[0]->img !== ""){
										$data['img'] = base_url('assets/public/img/general/'.$generalDB->fondo[0]->img);
										$data['name'] = @$generalDB->fondo[0]->img;
										$data['hname'] = 'general0_fondo';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = ' data-conteovalin="general" data-conteovalfin="_fondo" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										$data_team_fondo['name'] = 'general0_fondo';
										echo form_upload( $data_team_fondo );
									}
								?>
								</div>
							</div>
							<div class="general_color_principal">
								<label>Color Principal para titulos y texto sobre el fondo: (user # al inicio del color)</label>
								<?php
									$data_general['name'] = 'general[color_principal]';
									$data_general['value'] = @$generalDB->color_principal;
									echo form_input( $data_general );
								?>
							</div>
							<div class="general_color_contraste">
								<label>Color de contraste al color principal para elementos que están dentro del color principal. (user # al inicio del color)</label>
								<?php
									$data_general['name'] = 'general[color_contraste]';
									$data_general['value'] = @$generalDB->color_contraste;
									echo form_input( $data_general );
								?>
							</div>
							
						</div>
						
						<div class="col -md-9">
							<div class="general_telefono">
								<label>Telefono:</label>
								<?php
									$data_general_telefono['name'] = 'general[telefono]';
									$data_general_telefono['value'] = @$generalDB->telefono;
									echo form_input( $data_general_telefono );
								?>
							</div>
							<div class="general_correo">
								<label>Correo:</label>
								<?php
									$data_general_correo['name'] = 'general[correo]';
									$data_general_correo['value'] = @$generalDB->correo;
									echo form_input( $data_general_correo );
								?>
							</div>
							<div class="team_correo_form">
								<label>Correo donde el formulario del sitio enviara la consulta:</label>
								<?php
									$data_general_correo_form['name'] = 'general[correo_form]';
									$data_general_correo_form['value'] = @$generalDB->correo_form;
									echo form_input( $data_general_correo_form );
								?>
							</div>
							<div class="team_nombre">
								<label>liga de mapa:</label>
								<?php
									$data_general_mapa['name'] = 'general[mapa]';
									$data_general_mapa['value'] = @$generalDB->mapa;
									echo form_input( $data_general_mapa );
								?>
							</div>
							<div class="team_direccion">
								<label>Direccion:</label>
								<?php
									$data_general_direccion['name'] = 'general[direccion]';
									$data_general_direccion['value'] = @$generalDB->direccion;
									echo form_textarea( $data_general_direccion );
								?>
							</div>
							<div class="team_facebook">
								<label>Facebook</label>
								<?php
									$data_general_facebook['name'] = 'general[facebook]';
									$data_general_facebook['value'] = @$generalDB->facebook;
									echo form_input( $data_general_facebook );
								?>
							</div>
							<div class="team_facebook">
								<label>Instagram</label>
								<?php
									$data_general_instagram['name'] = 'general[instagram]';
									$data_general_instagram['value'] = @$generalDB->instagram;
									echo form_input( $data_general_instagram);
								?>
							</div>
							<div class="team_facebook">
								<label>LinkedIn</label>
								<?php
									$data_general_linkedin['name'] = 'general[linkedin]';
									$data_general_linkedin['value'] = @$generalDB->linkedin;
									echo form_input( $data_general_linkedin );
								?>
							</div>
							<div class="team_facebook">
								<label>Behance</label>
								<?php
									$data_general_behance['name'] = 'general[behance]';
									$data_general_behance['value'] = @$generalDB->behance;
									echo form_input( $data_general_behance );
								?>
							</div>
							<div class="team_vimeo">
								<label>Vimeo</label>
								<?php
									$data_general_behance['name'] = 'general[vimeo]';
									$data_general_behance['value'] = @$generalDB->vimeo;
									echo form_input( $data_general_vimeo );
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
			?>
			</div>
		</div>
	</div>

	
	
	
	
	
	
	
	
	
	
</div>


</form>