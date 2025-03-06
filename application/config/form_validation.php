<?php
$config = array(
	'login/index' => array(
		array(
			'field' => 'username',
			'label' => 'Usuario',
			'rules' => 'required|alpha_numeric'
		),
		array(
			'field' => 'password',
			'label' => 'Contraseña',
			'rules' => 'required'
		)
	),
// 	regex_match[/^[\s]\s*|[^\r\n\w\s\xD0\xD1\x21\xA1\xC1\xC9\xCD\xD3\xDA\xF1\xE1\xE9\xED\xF3\xFA\x23\x24\x25\x2D\x27\x28\x29\x2C\x2F\x3A\x40\x5F\x60.]/]
	'new_register/index' => array(
		array(
			'field' => 'nombre',
			'label' => 'Nombre',
			'rules' => 'required|regex_match[/^[\r\n\w\s\p{Latin}.\xD0\xD1\x21\xA1\xC1\xC9\xCD\xD3\xDA\xF1\xE1\xE9\xED\xF3\xFA\x23\x24\x25\x2D\x27\x28\x29\x2C\x3A\x40\x5F\x60]+$/u]' // diagonal=.2f
		),
		array(
			'field' => 'ap_paterno',
			'label' => 'Appellido Paterno',
			'rules' => 'required|regex_match[/^[\r\n\w\s\p{Latin}.\xD0\xD1\x21\xA1\xC1\xC9\xCD\xD3\xDA\xF1\xE1\xE9\xED\xF3\xFA\x23\x24\x25\x2D\x27\x28\x29\x2C\x3A\x40\x5F\x60]+$/u]'
		),
		array(
			'field' => 'ap_materno',
			'label' => 'Apellido Materno',
			'rules' => 'required|regex_match[/^[\r\n\w\s\p{Latin}.\xD0\xD1\x21\xA1\xC1\xC9\xCD\xD3\xDA\xF1\xE1\xE9\xED\xF3\xFA\x23\x24\x25\x2D\x27\x28\x29\x2C\x3A\x40\x5F\x60]+$/u]'
		),
		array(
			'field' => 'email',
			'label' => 'E-Mail',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'rfc',
			'label' => 'R.F.C.',
			'rules' => 'required|regex_match[/[A-ZÑ&]{3,4}\d{6}[A-V1-9][A-Z1-9][0-9A]/]'
		),
		array(
			'field' => 'lada',
			'label' => 'Lada',
			'rules' => 'required|numeric|max_length[3]'
		),
		array(
			'field' => 'telefono',
			'label' => 'Telefono',
			'rules' => 'required|numeric|min_length[6]|max_length[8]'
		),
		array(
			'field' => 'extranjero',
			'label' => 'Extranjero',
			'rules' => 'trim'
		),
		array(
			'field' => 'aceptar_terminos',
			'label' => 'Términos y Condiciones',
			'rules' => 'required'
		)
	),
	
	'inicio/index' => array(
		array(
			'field' => 'username',
			'label' => 'Usuario',
			'rules' => 'required|alpha_numeric'
		),
		array(
			'field' => 'password',
			'label' => 'Contraseña',
			'rules' => 'required'
		),
		array(
			'field' => 'terminos',
			'label' => 'Términos y Condiciones',
			'rules' => 'required'
		)
	),
	
	'carga_archivos/index' => array(
		array(
			'field' => 'comentarios',
			'label' => 'Comentarios',
			'rules' => 'regex_match[/^[\r\n\w\s\p{Latin}.\xD0\xD1\x21\xA1\xC1\xC9\xCD\xD3\xDA\xF1\xE1\xE9\xED\xF3\xFA\x23\x24\x25\x2D\x27\x28\x29\x2C\x3A\x40\x5F\x60]+$/u]'
		),
		array(
			'field' => 'docIdentificacion_select',
			'label' => 'Select Identificaion',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($str) && $str == null){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docIdentificacion',
			'label' => 'Identificaion',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($_FILES['docIdentificacion']) && $_FILES['docIdentificacion']['error'] == 4){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docDomicilio_select',
			'label' => 'Select Domicilio',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($str) && $str == null){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docDomicilio',
			'label' => 'Domicilio',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($_FILES['docDomicilio']) && $_FILES['docDomicilio']['error'] == 4){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docIngresos1_select',
			'label' => 'Select Ingreso',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($str) && $str == null){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docIngresos1',
			'label' => 'Ingresos',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($_FILES['docIngresos1']) && $_FILES['docIngresos1']['error'] == 4){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docActaConstitutiva',
			'label' => 'Acta Constitutiva',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($_FILES['docActaConstitutiva']) && $_FILES['docActaConstitutiva']['error'] == 4){
		                               return false;
	                               }
		                        }
			                )
				        )
		),
		array(
			'field' => 'docFm3',
			'label' => 'FM3',
			'rules' => array(
			                array(
		                        'selectFile',
		                        function($str)
		                        {
	                               if(isset($_FILES['docFm3']) && $_FILES['docFm3']['error'] == 4){
		                               return false;
	                               }
		                        }
			                )
				        )
		)
	)
);
?>