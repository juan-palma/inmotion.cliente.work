<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_modal');
	}
	
	public $varFlash = 'flashPanel';
	public $success = [];
	public $error = [];
	
	
	public function index(){
		isNoLogged();
		
		$data['titulo'] = "Panel";
		$data['actual'] = "Panel";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2',$data);
		$this->load->view('admin/panel');
		$this->load->view('admin/footer2', $data);
	}
	
	public function out(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}
}