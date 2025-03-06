<section id="servicios" class="mboxG">
	<div class="mboxC">
		<div class="video">
			<?php
				if(isset($serviciosDB)){
					if(property_exists($serviciosDB, "video_general") && $serviciosDB->video_general !== ''){
						?>
						<div class="iframe-container">
							<?php echo($serviciosDB->video_general); ?>
						</div>
						<div class="centro">
							<div class="btnPlay"><i class="far fa-play-circle"></i></div>
						</div>
						<?php
					} else{
						?>
						<div class="videoPortada" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/'.@$serviciosDB->video_portada) ); ?>);"></div>
						
						<div class="centro">
							<div class="centrado">
								<h1 class="titulos"><?php echo($serviciosDB->titulo_general); ?></h1>
							</div>
						</div>
						<?php
					}
				}
			?>

<!--
			<video class="stopfade" controls="false" id="bgvid" loop>
			    <source src="https://www.youtube.com/embed/nzenephoM84" type="video/mp4" />
			</video>
			<video class="stopfade" poster="<?php echo($serviciosDB->video->poster); ?>" id="bgvid" loop>
				<?php
					if(isset($serviciosDB->video->webm)){
					?>
					<source src="<?php echo($serviciosDB->video->webm); ?>" type="video/webm">
					<?php	
					}
				?>
				<?php
					if(isset($serviciosDB->video->mp4)){
					?>
					<source src="<?php echo($serviciosDB->video->mp4); ?>" type="video/mp4">
					<?php	
					}
				?>
			</video>

			<div class="centro">
				<div class="centrado">
					<h1 class="titulos"><?php echo($serviciosDB->titulo_general); ?></h1>
				</div>
				<div class="btnPlay"><i class="far fa-play-circle"></i></div>
				<div class="btnPlayPause dnone op0"><i class="fas fa-pause"></i></div>
			</div>			
-->
		</div>
		<main class="row row-no-gutters">
			<?php
			foreach ($serviciosDB->servicios as $i=>$v) {
				?>
				<article class="linea clearfix">
					<div class="bl bl1" style="background-image: url(<?php echo( base_url('assets/public/img/servicios/'.@$v->foto) ); ?>);"></div>
					<div class="bl bl2">
						<div class="centro">
							<div class="icono">
								<img src="<?php echo( base_url('assets/public/img/servicios/'.$v->icono) ); ?>" alt="servicio_icono_<?php echo($i); ?>" />
							</div>
							<h2 class="titulo"><?php echo($v->titulo); ?></h2>
							<div class="texto"><span><?php echo($v->texto); ?></span></div>
							<div class="enlace">
								<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
							</div>
						</div>
					</div>
				</article>
				<?php
			}
			?>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD"></div>
</section>