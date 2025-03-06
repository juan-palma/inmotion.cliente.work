<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_modal');
	}
	
	public $varFlash = 'flashLogin';
	public $success = [];
	public $error = [];
	
	public function index(){
		
		if ($this->form_validation->run() == FALSE)
		{
			isLogged();
			
			$fondos = @get_filenames(FCPATH.'assets/admin/img/loginBackground/');
			$data['fondo'] = ( (isset($fondos) && count($fondos) > 0) ) ? $this->security->sanitize_filename($fondos[rand(0, (count($fondos)-1))]) : '';
			$data['titulo'] = "Login";
			$data['varFlash'] = $this->varFlash;
			$this->load->view('admin/head', $data);
			$this->load->view('admin/login');
			$this->load->view('admin/footer', $data);
		}
		else
		{
			$redir = '';
			$post = $this->input->post(NULL,FALSE);
			
			
			if( $post['username'] !== '' && $post['password'] !== '' ){
				$result = $this->admin_modal->loginValid($post['username'], $post['password']);
				if(isset($result) && count($result) > 0){					
					//if($post['username'] === $result[0]->user_user && $post['password'] === $this->ida_protect->decrypt($result[0]->user_pass)){
					if($post['username'] === $result[0]->user_user && $post['password'] === $this->ida_protect->encrypt_decrypt('decrypt', $result[0]->user_pass)){
						$userData = array(
							'userID' => $result[0]->id_user,
							'nombre' => $result[0]->user_nombre,
							'apaterno' => $result[0]->user_apaterno,
							'amaterno' => $result[0]->user_amaterno,
							'level' => $result[0]->user_level,
							'finger' => $result[0]->fingerprint,
							'user_code' => $result[0]->user_code
						);
						$this->session->set_userdata($userData);
						
						//Consulta
						$this->basic_modal->tabla = 'usuarios';
						$this->basic_modal->campos = 'permisos.*';
						$this->basic_modal->join = array('permisos', 'permisos.permiso_user = usuarios.id_user');
						$this->basic_modal->condicion = array("usuarios.id_user" => $result[0]->id_user, "usuarios.fingerprint" => $result[0]->fingerprint);
						
						$result = $this->basic_modal->genericSelect();
						$this->session->set_userdata('modulos', $result);
						$redir = base_url('admin/panel');
						
	
					} else{
						$this->error[] = 'No son validos los datos que proporciono, verifique Su usuario y contraseña y trate de nuevo.';
						$redir = current_url();
					}
				} else{
					$this->error[] = 'No son validos los datos que proporciono, verifique Su usuario y contraseña y trate de nuevo.';
					$redir = current_url();
				}
			} else{
				$this->error[] = 'Esta vacio el campo de usuario o contraseña';
				$redir = current_url();
			}
			
			$this->session->set_flashdata($this->varFlash.'Success', $this->success);
			$this->session->set_flashdata($this->varFlash.'Error', $this->error);
			redirect($redir);
		}
		
		
	}
	
}