<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Vacantes extends CI_Controller {
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
		$data['actual'] = "vacantes";
		$data['desc'] = "Se parte de nuestro equipo INMOTION, en nuestra bolsa de trabajo podrás encontrar vacantes de tu interes.";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/vacantes', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	public function articulo($peticion = ''){
		
		
	}
	
			
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



