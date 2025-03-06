<?php
/*
portafoliosDB = new stdClass();
portafoliosDB->titulo_general = 'PORTAFOLIO';
portafoliosDB->portafolios = [];

$valor = new stdClass();
$valor->fondo = 'summit_2019_fondo.jpg';
$valor->titulo = 'SPORTS ANTI-PIRACY<br />SUMMIT 2019';
$valor->enlace = 'anti_piracy_summit_2019';
portafoliosDB->portafolios[] = $valor;

$valor = new stdClass();
$valor->fondo = 'national_fondo.jpg';
$valor->titulo = 'NATIONAL<br />GEOGRAPHIC';
$valor->enlace = 'national_geographic';
portafoliosDB->portafolios[] = $valor;

$valor = new stdClass();
$valor->fondo = 'toyota_fondo.jpg';
$valor->titulo = 'TOYOTA';
$valor->enlace = 'toyota';
portafoliosDB->portafolios[] = $valor;
*/
?>
<section id="portafolios" class="mboxG">
	<div class="mboxC">
		<main class="">
			<div id="portFondosBox">
				<?php
				foreach ($registroDB as $i=>$v) {
					?>
					<div class="itemFotoFondo <?php if($i !== 0){ echo('op0'); }?>" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->fondo) ); ?>);">
					</div>
					<?php
				}
				?>
			</div>
			<div class="slideMain">
				<div class="slideItems">
				<?php
				foreach ($registroDB as $i=>$v) {
					?>
					<article class="item">
						<div class="centro">
							<div class="noMargin"></div>
							<h2 class="titulo">
								<?php echo($v->titulo_general); ?>
							</h2>
							<div class="enlace">
								<input type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
							</div>
						</div>
					</article>
					<?php
				}
				?>
				</div>
			</div>
		</main>
	</div>
	<div class="mboxI"></div>
	<div class="mboxD_in">
		<div id="navSlide">
			<div class="centro">
			<?php
				foreach ($registroDB as $i=>$v) {
					?>
					<div class="nBox <?php if($i === 0){ echo('active'); }?>">
						<div class="text"><?php echo($v->titulo_general); ?></div>
						<div class="circulo"></div>
						<div class="line"></div>
					</div>
					<?php
				}
			?>
			</div>
		</div>
	</div>
</section>





