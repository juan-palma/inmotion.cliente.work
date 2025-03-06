<table class="center2">
	<tr>
		<td>
			<div class="content -dark -without-sidebar">
				<div class="container-fluid">
					<div class="row">
						<div class="col -lg-12">
							<div class="panel -dark -focused -radical">
								<div class="ida-row">
									<div id="adminLogo" class="col -md-8">
										<table class="center2">
											<tr>
												<td>
													<div class="boxLogo">
														<?php $img = (!empty($db->adminLogo)) ? 'assets/admin/img/'.$db->adminLogo : 'assets/admin/img/adminLogoBase.png'; ?>
														<img src="<?php echo(base_url($img)); ?>" />
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="panel-heading -dark -with-icon-lg col -md-4 login-panel">
										<i class="pe pe-angle-down-circle"></i>
				
										<h3>Iniciar sesión</h3>
										<span>Enter your account</span>
									</div>
								</div>
			
			
								<div class="panel-body">
									<?php
										$formPrefix = '<div class="form-error-msn">';
										$formPrefixTerminos = '<div class="form-error-msn terminos">';
										$formSubfix = '</div>';
									?>
									<form action="<?php echo(current_url()); ?>" class="form -dark" data-toggle="validator" id="form-login" method="post" name="form-login">
										<!-- Form Group-->
			
										<div class="form-group">
											<label class="form-label" for="form-signin-username">Usuario</label>
											<?php echo form_error('username', $formPrefix, $formSubfix); ?>
											<input class="form-control" id="form-login-username" name="username" placeholder="Username" required="required" type="text" autocomplete="off" value="">
										</div>
										<!-- /Form Group--><!-- Form Group-->
			
										<div class="form-group">
											<label for="form-signin-password">Contraseña</label>
											<?php echo form_error('password', $formPrefix, $formSubfix); ?>
											<input class="form-control" id="form-login-password" name="password" placeholder="Password" required="required" type="password" autocomplete="off" value="">
<!-- 											<a class="form-text _text-muted _text-right" href="#/forgotpassword"><small>Olvido su contraseña?</small></a> -->
										</div>
										<!-- /Form Group--><!-- Form Group-->
			
										<div class="form-group _margin-top-2x _margin-bottom-none">
											<div class="form-check -checkbox">
												<?php echo form_error('terminos', $formPrefixTerminos, $formSubfix); ?>
												<button id="btnLogin" class="btn -primary _pull-right" name="btnLogin" type="submit">Entrar</button>
											</div>
										</div>
										<!-- /Form Group-->
									</form>
								</div>
							</div>
			
			
							<p class="_text-center">
								CMS Panel - <?php echo($_SERVER['SERVER_NAME']); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
