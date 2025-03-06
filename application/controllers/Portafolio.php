<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Portafolio extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
		
	public function index(){
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';
		


		//Consulta - GENERAL
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;


		
		//Consulta - HOME-SERVICIOS
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
		
		$isServicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isServicio) && count($isServicio) > 0) ? $isServicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['serviciosDB'] = $valoresDB;
		
		

/*
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
*/
		
		
		
		
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
		
		
		
		
		
		$data['titulo'] = "Portafolio";
		$data['actual'] = "portafolio";
		$data['desc'] = "Descripción Portafolio INMOTION";
		
		
		$this->load->view('public/head', $data);
		$this->load->view('public/portafolio', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	
	public function articulo($peticion = ''){
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';
		



		//Consulta - GENERAL
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;


		
		//Consulta - HOME-SERVICIOS
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
		
		$isServicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isServicio) && count($isServicio) > 0) ? $isServicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['serviciosDB'] = $valoresDB;
		
		
		
		
		
		$data['titulo'] = "Portafolio Articulo";
		$data['actual'] = "portafolio_in";
		$data['desc'] = "Descripción Portafolio Articulo INMOTION";
		
		
		
		//Consulta - Valor - Portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'id_contenido, contenido_info';
		$this->basic_modal->like = array("contenido_info" => '"enlace":"'.$peticion.'"');
		$this->basic_modal->condicion = array( "contenido_pagina" => "portafolios",  "contenido_seccion" => "registro");
		
		$respuesta2 = $this->basic_modal->genericSelect('sistema');
		if(is_array($respuesta2) && count($respuesta2) > 0){
			$clean2 = ($respuesta2[0] && property_exists($respuesta2[0], 'contenido_info')) ? str_replace($encontrar, $remplazar, $respuesta2[0]->contenido_info) : '';
			$cleanObjecDB2 = ( is_object(json_decode($clean2)) ) ? json_decode($clean2) : new stdClass();
			$cleanObjecDB2->id = $respuesta2[0]->id_contenido;
			$data['articuloDB'] = $cleanObjecDB2;
			
			$this->load->view('public/head', $data);
			$this->load->view('public/portafolio_in', $data);
			$this->load->view('public/footer', $data);
		} else{
			$data['message'] = '¡Hola!...  al parecer '.$peticion.' no se encuentra por el momento en este espacio';
			$this->load->view('errors/html/error_404', $data);
		}
	}
	

	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



