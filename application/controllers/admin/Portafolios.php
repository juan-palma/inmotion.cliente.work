<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Portafolios extends CI_Controller {
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
		
		
		//Consulta - Registro - Portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'id_contenido, contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'portafolios', "contenido_seccion" => 'registro' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$union = [];
		if(is_array($respuesta) && count($respuesta) > 0){
			foreach($respuesta as $i=>$r){
				$clean = (isset($r) && property_exists($r, 'contenido_info')) ? str_replace($encontrar, $remplazar, $r->contenido_info) : '';
				$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
				$cleanObjecDB->id = $r->id_contenido;
				$union[$i] = $cleanObjecDB;
			}
		}
		$data['registroDB'] = $union;
		
		
		
		
		$data['titulo'] = "Registros - Portafolios";
		$data['actual'] = "registro_portafolios";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/portafolios', $data);
		$this->load->view('admin/footer2', $data);
	}
	
	public function registro($peticion = ''){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';		
		
		
		//Consulta - Registro - Portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'id_contenido, contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'portafolios', "contenido_seccion" => 'registro' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$union = [];
		if(is_array($respuesta) && count($respuesta) > 0){
			foreach($respuesta as $i=>$r){
				$clean = (isset($r) && property_exists($r, 'contenido_info')) ? str_replace($encontrar, $remplazar, $r->contenido_info) : '';
				$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
				$cleanObjecDB->id = $r->id_contenido;
				$union[$i] = $cleanObjecDB;
			}
		}
		//$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		//$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		//$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['registroDB'] = $union;
		
		
		
		//Consulta - Valor - Portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'id_contenido, contenido_info';
		$this->basic_modal->like = array("contenido_info" => '"enlace":"'.$peticion.'"');
		$this->basic_modal->condicion = array( "contenido_pagina" => "portafolios",  "contenido_seccion" => "registro");
		
		$respuesta2 = $this->basic_modal->genericSelect('sistema');
		if(is_array($respuesta2) && count($respuesta2) > 0){
			//$consulta2 = (is_array($respuesta2) && count($respuesta2) > 0) ? $respuesta2[0] : '';
			$clean2 = ($respuesta2[0] && property_exists($respuesta2[0], 'contenido_info')) ? str_replace($encontrar, $remplazar, $respuesta2[0]->contenido_info) : '';
			$cleanObjecDB2 = ( is_object(json_decode($clean2)) ) ? json_decode($clean2) : new stdClass();
			$cleanObjecDB2->id = $respuesta2[0]->id_contenido;
			$data['articuloDB'] = $cleanObjecDB2;
		}
		
		
		
		$data['titulo'] = "Registros - Portafolios";
		$data['actual'] = "registro_portafolios";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/portafolios', $data);
		$this->load->view('admin/footer2', $data);
		
	}
		
		
		
	
	
	private function loadFiles($s, $it, $a, $c){
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
		
		// REGISTROS
		//::::::  Seccion para procesar informacion de PORTAFOLIOS :::::
		$this->valores['registro'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/portafolios/registros/';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg';
		$config['max_size']			= 1536;
		$config['overwrite']		= true;
		
		
		//subir fotos de registro
		$loadPortada = $this->loadFiles('base', 'video_portada', ['null'], $config);
		$loadFondoGeneral = $this->loadFiles('registro', 'fondo', ['null'], $config);
		
		//subir fotos de registro
		if( isset($_POST['registros']['bloque']) ){
			$loadFondo = $this->loadFiles('bloque', 'fondo', $_POST['registros']['bloque'], $config);
		} else{
			$loadFondo = [];
		}
		
		//subir fotos de informes
		
		if( isset($_POST['informes']['informe']) ){
			$loadInformeIcono = $this->loadFiles('informe', 'icono', $_POST['informes']['informe'], $config);
		} else{
			$loadInformeIcono = [];
		}
		
		//subir logos de clientes
		if( isset($_POST['clientes']['logos']) ){
			$loadlogosIcono = $this->loadFiles('cliente', 'logo', $_POST['clientes']['logos'], $config);
			$loadlogosFondo = $this->loadFiles('cliente', 'fondo', $_POST['clientes']['logos'], $config);
		} else{
			$loadlogosIcono = [];
			$loadlogosFondo = [];
		}
		


		if($loadFondo !== false && $loadInformeIcono !== false){
			//Datos de la seccion Nosotros.
			$linea = '{"titulo_general":"'.$_POST['registros']['titulo'].'", "video":"'.$_POST['registros']['video'].'", "enlace":"'.url_title($_POST['registros']['enlace']).'", "fondo":"'.$loadFondoGeneral[0]['file_name'].'", "video_portada":"'.$loadPortada[0]['file_name'].'", "bloques":[';
			
			if( isset($_POST['registros']['bloque']) ){
				foreach ($_POST['registros']['bloque'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"fondo":"'.@$loadFondo[$i]['file_name'].'", "titulo1":"'.$v['titulo1'].'", "texto1":"'.$v['texto1'].'", "titulo2":"'.$v['titulo2'].'", "texto2":"'.$v['texto2'].'"}';
				}
			}
			
			$linea .= '], "informes":[';
			if( isset($_POST['informes']['informe']) ){
				foreach ($_POST['informes']['informe'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"icono":"'.@$loadInformeIcono[$i]['file_name'].'", "titulo":"'.$v['titulo'].'", "texto":"'.$v['texto'].'"}';
				}
			}
			
			$linea .= '], "logos":[';
			if( isset($_POST['clientes']['logos']) ){
				foreach ($_POST['clientes']['logos'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"logo":"'.@$loadlogosIcono[$i]['file_name'].'", "fondo":"'.@$loadlogosFondo[$i]['file_name'].'"}';
				}
			}
			
			$linea .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "id_contenido" => $_POST['registros']['id'] );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $_POST['registros']['id']);
				$valores = array('contenido_info' => $linea);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea, 'contenido_pagina' => 'portafolios', 'contenido_seccion' => 'registro', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
				$this->valores['registro']['id'] = $insert;
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
	
	
	public function delReg($id = ''){
		isNoLogged();
		
		if($id !== ''){
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$valores = array('id_contenido' => $id);
			$insert = $this->basic_modal->genericDelete('sistema', $valores);
			
			header('Location: '. base_url('admin/portafolios'));
		}
	}
	
}



