<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_modal extends CI_Model {

    public function loginValid($user,$pass){
        $q = $this->db->get_where('usuarios',array('user_user'=>$user));
        $q = $q->result();
        return $q;
    }
    
    public function loadModule($id, $fp){
	    $q = $this->db->get_where('usuarios',array('id_user'=>$id, 'fingerprint'=>$fp));
        $q = $q->result();
        return $q;
    }
    
/*
    public function check_user($user){
        $q = $this->db->get_where('Usuario',array('username_user'=>$user));
        $q = $q->result();
        return $q;
    }

    public function create_dataSession($datos){
        $newdata = array(
                'idUser'        => $datos[0]->idUsuario,
                'usuarioUser'   => $datos[0]->username_user,
                'nombreUser'    => $datos[0]->nombre_user,
                'tipouser'      => $datos[0]->TipoUser_idTipoUser,
                'logged_in'     => TRUE
        );
        $this->session->set_userdata($newdata);
    }

    public function is_logged(){
        $name = $this->session->userdata('nombreUser');
        if (empty($name)) {
             $this->session->sess_destroy();
             redirect(base_url('admin'));   
        }
    }

    public function has_permission(){
        $idUser = $this->session->userdata('idUser');
        if (empty($idUser) || $idUser != 1) {
             redirect(base_url('admin/home'));   
        }
    }
*/
}