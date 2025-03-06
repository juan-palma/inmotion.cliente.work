<div class="box_main original" data-cloneinfo="imgBlock">
	<input type="hidden" value="<?php echo(@$name); ?>" name="<?php echo(@$hname); ?>" class="<?php echo(@$classAdd); ?>" <?php echo(@$propertyAdd); ?> ></input>
	<div class="contenedor clearfix">
		<div class="imagen">
			<img src="<?php echo(@$img); ?>" />
			<div class="boxControl">
				<div class="controles clearfix">
					<div class="imgDel"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
		</div>
		<div class="info">
			<div class="name">Nombre del archivo: <span><?php echo(@$name); ?></span></div>
		</div>
	</div>
</div>