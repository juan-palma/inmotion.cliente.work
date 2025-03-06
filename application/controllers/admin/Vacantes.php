<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Vacantes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $varFlash = 'flashVacantes';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';


		
		//Consulta - VACANTES
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'vacantes', "contenido_seccion" => 'vacantes' );
		
		$isvacante = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isvacante) && count($isvacante) > 0) ? $isvacante[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['vacantesDB'] = $valoresDB;
		


		
		$data['titulo'] = "Bolsa de Trabajo";
		$data['actual'] = "bolsa_trabajo";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/vacantes', $data);
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
		
		// vacantes
		//::::::  Seccion para procesar informacion de vacantes :::::
		$this->valores['vacante'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/vacantes';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		$loadPortada = $this->loadFiles('base', 'video_portada', ['null'], $config);
		
		if( isset($_POST['vacantes']['vacante']) ){
			$loadSerFoto = $this->loadFiles('vacante', 'foto', $_POST['vacantes']['vacante'], $config);
		} else{
			$loadSerFoto = [];
		}
		


		if($loadSerFoto !== false){
			//Datos de la seccion vacantes.
			$linea_vacantes = '{"titulo_general":"'.$_POST['vacantes']['titulo'].'", "video_general":"'.$_POST['vacantes']['video'].'", "video_portada":"'.$loadPortada[0]['file_name'].'", "vacantes":[';
			
			if( isset($_POST['vacantes']['vacante']) ){
				foreach ($_POST['vacantes']['vacante'] as $i=>$v) {
					if($i !== 0){ $linea_vacantes .= ', '; }
					$linea_vacantes .= '{"foto":"'.@$loadSerFoto[$i]['file_name'].'", "titulo":"'.$v['titulo'].'", "texto":"'.$v['texto'].'", "enlace":"'.$v['enlace'].'"}';
				}
			}
			$linea_vacantes .= ']}';
			
			//consultar si existe un registro con valores para VACANTES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - VACANTES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'vacantes', "contenido_seccion" => 'vacantes' );
			
			$isvacante = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($isvacante) > 0){
				//Consulta UPDATE vacantes
				$this->basic_modal->condicion = array('id_contenido', $isvacante[0]->id_contenido);
				$valores = array('contenido_info' => $linea_vacantes);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT vacantes
				$valores = array( 'contenido_info' => $linea_vacantes, 'contenido_pagina' => 'vacantes', 'contenido_seccion' => 'vacantes', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de vacantes.';
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



