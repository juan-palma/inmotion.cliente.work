<section id="vacantes" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<?php
				if(isset($vacantesDB)){
					if(property_exists($vacantesDB, "video_general") && $vacantesDB->video_general !== ''){
						?>
						<div class="iframe-container">
							<?php echo($vacantesDB->video_general); ?>
						</div>
						<div class="centro">
							<div class="btnPlay"><i class="far fa-play-circle"></i></div>
						</div>
						<?php
					} else{
						?>
						<div class="videoPortada" style="background-image: url(<?php echo( base_url('assets/public/img/vacantes/'.@$vacantesDB->video_portada) ); ?>);"></div>
						
						<div class="centro">
							<div class="centrado">
								<h2>VACANTES //</h2>
								<h1 class="titulos"><?php echo($vacantesDB->titulo_general); ?></h1>
							</div>
						</div>
						<?php
					}
				}
			?>
		</div>
		<?php
		if(isset($vacantesDB)){
		?>
		
		<?php
			if(property_exists($vacantesDB, "vacantes") && count($vacantesDB->vacantes) > 0){
		?>
		<main class="row row-no-gutters">
		<?php
				foreach ($vacantesDB->vacantes as $i=>$v) {
					?>
					<article class="linea clearfix">
						<div class="bl bl1" style="background-image: url(<?php echo( base_url('assets/public/img/vacantes/'.@$v->foto) ); ?>);"></div>
						<div class="bl bl2">
							<div class="centro">
								<h2 class="titulo"><?php echo($v->titulo); ?></h2>
								<div class="texto"><span><?php echo($v->texto); ?></span></div>
								<div class="enlace">
									<a href="mailto:<?php echo($v->enlace)?>">POSTULARSE</a>
								</div>
							</div>
						</div>
					</article>
					<?php
				}
		?>
		</main>
		<?php
			}
		?>
		
		<?php
		}
		?>
		
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>