<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_modal extends CI_Model {
	public $tabla = '';
	public $campos = '*';
	public $join = [];
	public $condicion = '';
	public $like = [];
	public $o = '';
	public $order = '';
	public $group = '';
	public $dir = '';
	public $limit = '';
	public $start = '';
	
	public function genericSelect($db = ''){
        if($db === ''){ $conectDB = $this->db; } else { $conectDB = $this->load->database($db, TRUE); }
        
        if($this->tabla == ''){ return false; }
        
        if($this->campos != '*')
            $q = $conectDB->select($this->campos);
        if($this->tabla != '')
	        $q = $conectDB->from($this->tabla);
        if($this->join != '' && (count($this->join) > 0) )
            $q = $conectDB->join($this->join[0], $this->join[1]);
        if($this->like != '' && (count($this->like) > 0) )
			$q = $conectDB->like($this->like);
        if($this->condicion != '')
            $q = $conectDB->where($this->condicion);
        if($this->o != '')
        	$q = $conectDB->or_where($this->condicion);
        if($this->order!= '')
            $q = $conectDB->order_by($this->order,$dir);
        if($this->group != '' && (count($this->group) > 0))
        	$q = $conectDB->group_by($this->group);
        if($this->limit!= '' && $this->start == '')
            $q = $conectDB->limit($this->limit);
        if($this->limit!= '' && $this->start != '')
            $q = $conectDB->limit($this->start,$this->limit);
        $q = $conectDB->get();
        $q = $q->result();
        
        return $q;
    }
    
    public function genericInsert($db, $valores){
    	if($db === ''){ $conectDB = $this->db; } else { $conectDB = $this->load->database($db, TRUE); }
    	
    	$conectDB->insert($this->tabla, $valores);
    	$insert_id = $conectDB->insert_id();
    	(isset($insert_id) && $insert_id != 0) ? $res = $insert_id : $res = 'error';
    	return $res;
    }
    
    public function genericUpdate($db, $valores){
    	if($db === ''){ $conectDB = $this->db; } else { $conectDB = $this->load->database($db, TRUE); }
    	
    	$conectDB->where($this->condicion[0], $this->condicion[1]);
		$q = $conectDB->update($this->tabla, $valores);
        return $q;
    }
    
    public function genericDelete($db, $valores){
	    if($db === ''){ $conectDB = $this->db; } else { $conectDB = $this->load->database($db, TRUE); }
	    
	    $conectDB->where($valores);
		$conectDB->delete($this->tabla);
    }
    
    
    
    public function loadFile($f, $n, $d, $post, $config){
	    $this->load->library('upload', $config);
	    $sel = (isset($post[$f.'_select'])) ? $post[$f.'_select'] : '';
	    $config['file_name'] = $post["userRFC"]."-".$n.$sel;
		$this->upload->initialize($config);
		if( $this->upload->do_upload($f) ){
			$result = $this->upload->data();
			
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'archivos';
			$valores = array(
				'id_lead' => $_SESSION['id_lead'],
				'archivo_nombre' => $result['file_name'],
				'archivo_formato' => $d,
				'archivo_extencion' => $result['file_ext'],
				'archivo_peso' => $result['file_size'],
				'archivo_ruta' => 'assets/documentos/',
				'archivo_status' => 'cargado'
			);
			$insertProceso = $this->basic_modal->genericInsert('sistema', $valores);
			if($insertProceso){
				return true;
			} else{
				return false;
			}
		} else{
			return false;
		}
    }
    
    
    
    public function clean(){
	    $this->tabla = '';
		$this->campos = '*';
		$this->join = [];
		$this->like = [];
		$this->condicion = '';
		$this->o = '';
		$this->order = '';
		$this->group = '';
		$this->dir = '';
		$this->limit = '';
		$this->start = '';
    }
}