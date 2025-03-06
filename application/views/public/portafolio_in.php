<section id="portafolio_video" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<?php
				if(isset($articuloDB)){
					if(property_exists($articuloDB, "video") && $articuloDB->video !== '' ){
						?>
						<div class="iframe-container stopfade">
							<?php echo($articuloDB->video); ?>
						</div>
						<div class="centro">
							<div class="btnPlay"><i class="far fa-play-circle"></i></div>
						</div>
						<?php
					} else{
						?>
						<div class="videoPortada" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$articuloDB->video_portada) ); ?>);"></div>
						
						<div class="centro">
							<div class="centrado">
								<h2>PORTAFOLIOS //</h2>
								<h1 class="titulos"><?php echo($articuloDB->titulo_general); ?></h1>
							</div>
						</div>
						<?php
					}
				}
			?>
		</div>
	</div>
</section>


<section id="portafolio_main" class="mboxG">
	<div class="mboxC">	
		<main class="row row-no-gutters">
			<article>
			<?php
			foreach ($articuloDB->bloques as $i=>$v) {
				?>
				<div class="bloque" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$v->fondo) ); ?>);">
					<div class="imgContent">
						<img src="<?php echo( base_url('assets/public/img/portafolios/registros/'.@$v->fondo) ); ?>"/>
					</div>
					<div class="contenedor">
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
				</div>
				<?php
			}
			
			if(count($articuloDB->informes) > 0 ){
				?>
				<div class="bloque informes" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$articuloDB->informes_fondo) ); ?>);">
					<div class="bloqueInformes">
						<div class="row row-no-gutters">
						<?php
						foreach ($articuloDB->informes as $i=>$v) {
							?>
							<div class="col-12 col-sm-6 col-md-3">
								<div class="icono">
									<?php if($v->icono !== ''){ ?>
									<img src="<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->icono) ); ?>" alt="portafolio_icono_<?php echo($i); ?>" />
									<?php } ?>
								</div>
								<h2 class="titulo"><?php echo($v->titulo); ?></h2>
								<div class="texto"><span><?php echo($v->texto); ?></span></div>
							</div>
							<?php
						}
						?>
						</div>
					</div>
						<?php
				}
				
					if(property_exists($articuloDB, "logos") && count($articuloDB->logos) > 0 ){
					?>
					<div class="slideMain">
						<div class="slideItems">
						<?php
						foreach ($articuloDB->logos as $i=>$v) {
							?>
							<div class="logo" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.@$v->fondo) ); ?>);">
								<img src="<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->logo) ); ?>" />
							</div>
							<?php
						}
						?>
						</div>
						<div class="mboxD_in">
							<div class="btnSlideNext">
								<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoNext.jpg') ); ?>" />
							</div>
							<div class="btnSlideBack">
								<img src="<?php echo( base_url('assets/public/img/btnSlideBlancoBack.jpg') ); ?>" />
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			
			
			</article>
		</main>
	</div>
<!--
	<div class="mboxI"></div>
	<div class="mboxD"></div>
-->
</section>

