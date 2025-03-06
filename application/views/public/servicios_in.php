<section id="servicios_video" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<?php
				if(isset($articuloDB)){
					if(property_exists($articuloDB, "video") && $articuloDB->video !== ''){
						?>
						<div class="iframe-container">
							<?php echo($articuloDB->video); ?>
						</div>
						<div class="centro">
							<div class="btnPlay"><i class="far fa-play-circle"></i></div>
						</div>
						<?php
					} else{
						?>
						<div class="videoPortada" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/registros/'.@$articuloDB->video_portada) ); ?>);"></div>
						
						<div class="centro">
							<div class="centrado">
								<h2>SERVICIOS //</h2>
								<h1 class="titulos"><?php echo($articuloDB->titulo_general); ?></h1>
							</div>
						</div>
						<?php
					}
				}
			?>
		</div>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

		
<section id="servicios_main" class="mboxG">
	<div class="mboxC">	
		<main class="row row-no-gutters">
			<article>
			<?php
			foreach ($articuloDB->bloques as $i=>$v) {
				?>
				<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/registros/'.@$v->fondo) ); ?>);">
					<?php
					if($v->titulo1 !== '' || $v->texto1 !== ''){
						?>
						<div class="bl v1">
							<div class="box">
								<?php if(property_exists($v, "titulo1") && $v->titulo1 !== ''){ ?>
								<div class="titulo">
									<?php echo(@$v->titulo1); ?>
								</div>
								<?php } ?>
								<?php if(property_exists($v, "texto1") && $v->texto1 !== ''){ ?>
								<div class="texto">
									<?php echo(@$v->texto1); ?>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php
					}
					
					if($v->titulo2 !== '' || $v->titulo2 !== ''){
						?>
						<div class="bl v2">
							<div class="box">
								<?php if(property_exists($v, "texto2") && $v->texto2 !== ''){ ?>
								<div class="titulo">
									<?php echo(@$v->texto2); ?>
								</div>
								<?php } ?>
								<?php if(property_exists($v, "texto2") && $v->texto2 !== ''){ ?>
								<div class="texto">
									<?php echo(@$v->texto2); ?>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
			</article>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>

<?php
	if(property_exists($articuloDB, "galeria") && count($articuloDB->galeria) > 0){
?>
	<section id="servicios_galeria" class="mboxG">
		<div class="mboxC">	
			<main class="">
				<article>
					<div class="bloqueInfo">
						<?php
						if($articuloDB->galeria_titulo1 !== ''){
							?>
							<div class="bl v1">
								<div class="box">
									<div class="titulo">
										<?php echo(@$articuloDB->galeria_titulo1); ?>
									</div>
									<div class="texto">
										<?php echo(@$articuloDB->galeria_texto1); ?>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					
					</div>
					<div class="slideMain">
						<div class="slideItems">
						<?php
						foreach ($articuloDB->galeria as $i=>$v) {
							?>
							<div class="bloque-falso">
								<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/registros/'.@$v->foto) ); ?>);">
									
								</div>
							</div>
							<?php
						}
						?>
						</div>
					</div>
					<div class="mboxD_in">
						<div class="btnSlideNext">
							<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoNext.jpg') ); ?>" />
						</div>
						<div class="btnSlideBack">
							<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoBack.jpg') ); ?>" />
						</div>
					</div>
				</article>
			</main>
		</div>
		<div class="mboxI"></div>
		<div class="mboxD"></div>
	</section>
<?php
	}
?>
