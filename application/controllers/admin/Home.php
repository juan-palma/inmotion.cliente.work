<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $varFlash = 'flashHome';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';


		
		//Consulta - HOME-SECCIONES
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
		
		$isServicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isServicio) && count($isServicio) > 0) ? $isServicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['serviciosDB'] = $valoresDB;
		
		
		
		//Consulta - HOME-CLIENTES
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'clientes' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanClientesDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['clientesDB'] = $cleanClientesDB;
		
		
		
		//Consulta - HOME-PORTAFOLIOS
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'portafolios' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['portafoliosDB'] = $cleanObjecDB;
		
		
		
		//Consulta - HOME-NOSOTROS
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'nosotros' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['nosotrosDB'] = $cleanObjecDB;
		
		
		
		
		$data['titulo'] = "Home";
		$data['actual'] = "home";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('admin/footer2', $data);
	}
	
	public function send(){
		isNoLogged();
		
		print_r($_FILES);
        echo('<br /><br /><br />');
        print_r($_POST);
        
		$this->status = 'ok';
		
		
		//Seccion para procesar informacion de SERVICIOS.
		$config['upload_path']		= FCPATH.'assets/public/img/';
        $config['allowed_types']	= 'gif|jpg|png';
        $config['max_size']			= 1024;
        $config['overwrite']		= true;

        $this->load->library('upload', $config);
        
        $todasCargaron = true;
        $rutaImagenes = [];
        
        foreach ($_FILES['servicios'] as $i=>$v) {
			if ( ! $this->upload->do_upload('servicio['.$i.'][icono]') ){
				$todasCargaron == false;
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			} else{
				$result = $this->upload->data();
				$rutaImagenes[] = $result;
			}
		}
		print_r($rutaImagenes);
        
		//echo( json_encode($json) );
		//$this->session->set_flashdata($this->varFlash.'Success', $this->success);
		//$this->session->set_flashdata($this->varFlash.'Error', $this->error);
		//redirect(base_url('admin/home'));
	}
		
		
		
	
	
	private function loadFiles($s, $it, $a, $c){
		//$this->load->library('upload', $c);
		$this->upload->initialize($c);
		
		$todasCargaron = true;
		$rutaImagenes = [];
		$count = count($a);
		$this->valores[$s][$it] = [];
		
		for ($i = 0; $i < $count; $i++) {
			if( !isset($_POST[$s.$i.'_'.$it]) ){
				if(isset($_FILES[$s.$i.'_'.$it])){
					if($_FILES[$s.$i.'_'.$it]['name'] !== "" && $_FILES[$s.$i.'_'.$it]['error'] == 0){
						if ( ! $this->upload->do_upload($s.$i.'_'.$it) ){
							$todasCargaron = false;
							$this->status = 'error';
							$this->errores[] =  $this->upload->display_errors();
							$rutaImagenes[]['file_name'] = '';
							$this->valores[$s][$it][$i] = '';
						} else{
							$result = $this->upload->data();
							$rutaImagenes[] = $result;
							$this->valores[$s][$it][$i] = $result['file_name'];
						}
					} else{
						$rutaImagenes[]['file_name'] = '';
						$this->valores[$s][$it][$i] = '';
					}
				} else{
					$rutaImagenes[]['file_name'] = '';
					$this->valores[$s][$it][$i] = '';
				}
			} else{
				$rutaImagenes[]['file_name'] = $_POST[$s.$i.'_'.$it];
				$this->valores[$s][$it][$i] = 'nop';
			}
		}
		
		if($todasCargaron === true){
			return $rutaImagenes;
		} else{
			return false;
		}
	}
	
	
	
	
	public function do_upload(){
		$this->status = 'ok';
		
		// SERVICIOS
		//::::::  Seccion para procesar informacion de SERVICIOS :::::
		$this->valores['servicio'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/servicios';
		$config['allowed_types']	= 'gif|jpg|jpeg|png';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		$loadPortada = $this->loadFiles('base', 'video_portada', ['null'], $config);
		
		$loadSerIco = $this->loadFiles('servicio', 'icono', $_POST['servicios']['servicio'], $config);
		$loadSerFoto = $this->loadFiles('servicio', 'foto', $_POST['servicios']['servicio'], $config);


		if($loadSerIco !== false && $loadSerFoto !== false){
			//Datos de la seccion Servicios.
			$linea_servicios = '{"titulo_general":"'.$_POST['servicios']['titulo'].'", "video_general":"'.$_POST['servicios']['video'].'", "video_portada":"'.$loadPortada[0]['file_name'].'", "servicios":[';
			foreach ($_POST['servicios']['servicio'] as $i=>$v) {
				if($i !== 0){ $linea_servicios .= ', '; }
				$linea_servicios .= '{"icono":"'.@$loadSerIco[$i]['file_name'].'", "foto":"'.@$loadSerFoto[$i]['file_name'].'", "titulo":"'.$v['titulo'].'", "texto":"'.$v['texto'].'", "enlace":"'.url_title($v['enlace']).'"}';
			}
			$linea_servicios .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
			
			$isServicio = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($isServicio) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $isServicio[0]->id_contenido);
				$valores = array('contenido_info' => $linea_servicios);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea_servicios, 'contenido_pagina' => 'home', 'contenido_seccion' => 'servicios', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de servicios.';
		}
		
		
		
		
		
		
		
		
		// CLIENTES
		//::::::  Seccion para procesar informacion de CLIENTES :::::
		$this->valores['cliente'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/clientes';
		$config['allowed_types']	= 'gif|jpg|jpeg|png';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		if( isset($_POST['clientes']['logos']) ){
			$loadCliente = $this->loadFiles('cliente', 'logo', $_POST['clientes']['logos'], $config);
		} else{
			$loadCliente = [];
		}
		

		if($loadCliente !== false && $loadCliente !== false){
			//Datos de la seccion Servicios.
			$linea_registros = '{"titulo_general":"'.$_POST['clientes']['titulo'].'", "logos":[';
			
			if( isset($_POST['clientes']['logos']) ){
				foreach ($_POST['clientes']['logos'] as $i=>$v) {
					if($i !== 0){ $linea_registros .= ', '; }
					$linea_registros .= '{"logo":"'.@$loadCliente[$i]['file_name'].'"}';
				}
			}
			$linea_registros .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'clientes' );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $respuesta[0]->id_contenido);
				$valores = array('contenido_info' => $linea_registros);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea_registros, 'contenido_pagina' => 'home', 'contenido_seccion' => 'clientes', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de clientes.';
		}
		
		
		
		
		
		
		
		
		// PORTAFOLIOS
		//::::::  Seccion para procesar informacion de PORTAFOLIOS :::::
		$this->valores['portafolio'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/portafolios';
		$config['allowed_types']	= 'gif|jpg|jpeg|png';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		if( isset($_POST['portafolios']['portafolio']) ){
			$loadPortaFoto = $this->loadFiles('portafolio', 'fondo', $_POST['portafolios']['portafolio'], $config);
		} else{
			$loadPortaFoto = [];
		}
		


		if($loadPortaFoto !== false){
			//Datos de la seccion Portafolios.
			$linea = '{"titulo_general":"'.$_POST['portafolios']['titulo'].'", "portafolios":[';
			if( isset($_POST['portafolios']['portafolio']) ){
				foreach ($_POST['portafolios']['portafolio'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"fondo":"'.@$loadPortaFoto[$i]['file_name'].'", "titulo":"'.$v['titulo'].'", "enlace":"'.url_title($v['enlace']).'"}';
				}
			}
			$linea .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'portafolios' );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $respuesta[0]->id_contenido);
				$valores = array('contenido_info' => $linea);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea, 'contenido_pagina' => 'home', 'contenido_seccion' => 'portafolios', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de portafolios.';
		}
		
		
		
		
		
		
		
		
		// NOSOTROS
		//::::::  Seccion para procesar informacion de NOSOTROS :::::
		$this->valores['nosotros'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/nosotros';
		$config['allowed_types']	= 'gif|jpg|jpeg|png';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		if( isset($_POST['nosotros']['team']) ){
			$loadTeamFondo = $this->loadFiles('team', 'fondo', $_POST['nosotros']['team'], $config);
		} else{
			$loadTeamFondo = [];
		}
		


		if($loadTeamFondo !== false && $loadTeamFondo !== false){
			//Datos de la seccion Nosotros.
			$linea = '{"titulo_general":"'.$_POST['nosotros']['titulo'].'", "team":[';
			if( isset($_POST['nosotros']['team']) ){
				foreach ($_POST['nosotros']['team'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"fondo":"'.@$loadTeamFondo[$i]['file_name'].'", "color":"'.$v['color'].'", "nombre":"'.$v['nombre'].'", "apellido":"'.$v['apellido'].'", "puesto":"'.$v['puesto'].'"}';
				}
			}
			$linea .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'nosotros' );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $respuesta[0]->id_contenido);
				$valores = array('contenido_info' => $linea);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea, 'contenido_pagina' => 'home', 'contenido_seccion' => 'nosotros', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de nosotros.';
		}
		
		
		
		
		
		
		
		
		//Fin de la operación y retorno de la respuesta JSON a la consulta.
		echo( json_encode(['status' => $this->status, 'valores' => $this->valores, 'errores' => $this->errores]) );
		$this->cleanVar();
	}
	
	
	
	
	
	
	private function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('admin/home'));
	}
	
	
	private function cleanVar(){
		$this->status = [];
		$this->valores = [];
		$this->errores = [];
	}
	
}



