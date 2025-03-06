 <?php
	$formPrefix = '<div class="form-error-msn">';
	$formPrefixTerminos = '<div class="form-error-msn terminos">';
	$formSubfix = '</div>';
						
    $data = array(
        'id' => 'formulario',
        'class' => 'ev',
        'role' => 'form'
	);
	
	$hidden = [];
    $hidden['pagina'] = $actual;
    $hidden['userID'] = $_SESSION['userID'];
	
    //echo form_open(current_url(), $data);
    echo form_open_multipart(current_url().'/do_upload', $data, $hidden);
    //echo form_hidden( 'pagina' ,  $actual ); 
?>

<div id="nav_save_control">
	<div class="row">
	    <div class="col -md-12">
			<span class="pageTitulo">Datos de <?php echo($titulo); ?>: </span>
			<input id="boton_c" type="button" class="btn btn-default" value="Cancelar" onclick="location.reload();" />
			<input id="boton_r" type="submit" class="btn btn-info" value="Guardar" />
	    </div>
	</div>
</div>
<div id="nav_save_spacefin"></div>