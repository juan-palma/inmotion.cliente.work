		</main>	
		
		
		<!-- Carga de librerias !!.. -->
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>" type="text/javascript"></script>

		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/admin/js/owner/main.js')) ?>"></script>
		
		<?php
		if(isset($varFlash)){
			if($varFlash !== ''){
				if( isset($_SESSION[$varFlash.'Error']) && $_SESSION[$varFlash.'Error'] !== '' && count($_SESSION[$varFlash.'Error']) > 0  ){
					popFlash('error', $_SESSION[$varFlash.'Error']);
				} else if( isset($_SESSION[$varFlash.'Success']) && $_SESSION[$varFlash.'Success'] !== '' && count($_SESSION[$varFlash.'Success']) > 0 ){
					popFlash('success', $_SESSION[$varFlash.'Success']);
				}
			}
		}
		?>

	</body>
</html>