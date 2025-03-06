                    </div>
                </div>
                <footer class="footer">
                    <div class="container">
                        <nav>
                            <p class="copyright text-center">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                <a href="javascript:void(0);">Todos los derechos reservados</a>: Powered by:<a href="http://radicaltesta.com" target="_blank">Radical Testa</a> <!-- & <a href="http://idalibre.com" target="_blank">ID.A libre</a> -->
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
	</main>		
</body>


<script src="<?php echo(base_url('assets/common/js/librerias/jquery.3.2.1.min.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/popper.min.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/bootstrap.min.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/bootstrap-switch.js')) ?>"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script> -->
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/chartist.min.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/bootstrap-notify.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/jquery-jvectormap.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/moment.min.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/bootstrap-datetimepicker.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/bootstrap-tagsinput.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/nouislider.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/bootstrap-selectpicker.js')) ?>" type="text/javascript"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/jquery.bootstrap-wizard.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/bootstrap-table.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/jquery.dataTables.min.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/plugins/fullcalendar.min.js')) ?>"></script>
<script src="<?php echo(base_url('assets/admin/js/owner/light-bootstrap-dashboard.js?v=2.0.1')) ?>" type="text/javascript"></script>


<!-- IDA -->
<script src="<?php echo(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
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

</html>

