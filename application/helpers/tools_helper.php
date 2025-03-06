<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * IDA Helper Custom
 *
 */



// ------------------------------------------------------------------------

if ( ! function_exists('uuid'))
{
	/**
	 * UUID
	 *
	 * Generar Cadena de valor Unico Irrepetibles.
	 *
	 * @return	mixed  string
	 */
	function uuid(){
	    if (function_exists('com_create_guid')){
	        return com_create_guid();
	    }else{
	        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	        $charid = strtoupper(md5(uniqid(rand(), true)));
	        $hyphen = chr(45);// "-"
	        $uuid = ''//chr(123)// "{"
	            .substr($charid, 0, 8).$hyphen
	            .substr($charid, 8, 4).$hyphen
	            .substr($charid,12, 4).$hyphen
	            .substr($charid,16, 4).$hyphen
	            .substr($charid,20,12);
	            //.chr(125);// "}"
	        return $uuid;
	    }
	}
}



// ------------------------------------------------------------------------

if ( ! function_exists('readCSV'))
{
	/**
	 * Count CSV
	 *
	 * Abre el archvio del servidor y lo recorre para contar la cantidad de registros.
	 *
	 * @return	number
	 */
	function readCSV($filePath, $opt = []){
	    $expMatch = (($opt['expMatch'] && $opt['expMatch'] !== '')) ?  $opt['expMatch'] : "/[\w\d]/"  ;
	    $breakCaracter = (($opt['breakCaracter'] && $opt['breakCaracter'] !== '')) ?  $opt['breakCaracter'] : "\t"  ;
	    
	    $obj = (object)[];
	    $errorObj = [];
	    
		$row = 0;
		$numAllData = 0;
		$machData = [];
		$numMachData = 0;
		$titulosReg = [];
		
		$numNoMachData = 0;
		$noMachData = [];
		
		$noMatchDate = [];
		
		if($handle = @fopen($filePath, "r")){ 
			while (($data = fgetcsv($handle, 0)) !== FALSE) { 
				if(count($data) <= 1){
					$campos = explode($breakCaracter, $data[0]);
				} else{
					$campos = $data;
				}

				if($row == 0){
					foreach($campos as $i => $c){
						$titulosReg[] = $c;
					}
					unset($i, $c);
					
				} else{
					$numAllData++;
					if(preg_match($expMatch, $data[0])){
						$numMachData++;
						$machData[] = $campos;
					
/*
						foreach($campos as $i => $c){
							if($i == $laPosicion){ $elNombre = $c; }
							if( filter_var($c, FILTER_VALIDATE_EMAIL) ){ $elMail = $c; }
							if(preg_match('/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/', $c)){ $elRFC = $c; } 
							
							if($i > 0) { $insetValue .= ", "; }
							$insetValue .= "'".$c."'";
						}
						unset($i, $c);
*/
					} else{
						$numNoMachData++;
						$noMachData[] = $campos;
						$errorObj[] = "En la linea " . $row . " existen caracteres no validos permitidos en la sentencia, amplie los caracteres permitidos en su opcion expMatch o verifique los caracteres de su archivo";
					}
				}
				
				$row++;
			}
			fclose($handle);
		} else{
			$errorObj[] = "No se pudo abrir el archivo CSV por lotes, compruebe el nombre del archivo y que se encuentre en la ruta correcta.";
		};
	    
	    
	    //Regresar la resputa de la lectura del csv al usuario.
	    $obj->numReg = $numAllData;
	    $obj->matchReg = $machData;
	    $obj->numMatchReg = $numMachData;
	    $obj->noMatchReg = $noMachData;
	    $obj->numNoMatchReg = $numNoMachData;
	    $obj->titulosReg = $titulosReg;
	    	    
	    $obj->errorObj = $errorObj;
	    
	    return $obj;
	    
	}
}




// ------------------------------------------------------------------------

if ( ! function_exists('popFlash'));
{
	/**
	 * PopUp Flash Sesion data Menssage
	 *
	 * Abre una ventana con informacion en una variable de sesion tipo Flashdata.
	 *
	 * @return	html and js
	 */
	function popFlash($tipo, $flash){
		$linea = '';
		$titulo = '';
		$class = '';
		
		foreach($flash as $s){
			$linea .= $s . ' ';
		}
		
		switch($tipo){
			case 'success':
				$titulo = "Good job!";
				$class = "success";
			break;
			
			case 'error':
				$titulo = "UPS...!";
				$class = "warning";
			break;
		}
		
		?>
		<script type="text/javascript">
			console.info('<?php echo($linea); ?>');
			swal('<?php echo($titulo); ?>', '<?php echo($linea); ?>', '<?php echo($class); ?>');
		</script>
		<?php

	}
}








// ------------------------------------------------------------------------

if ( ! function_exists('vcard'))
{
	/**
	 * vCard
	 *
	 * Genera un arcvhio de contacto descargable
	 *
	 * @return	mixed  string
	 */
	function vcard(){
	    return utf8_encode('BEGIN:VCARD
							N:Inmotion
							TEL:(55) 5393 8627
							EMAIL:info@inmotion.com.mx
							URL:https://inmotion.com.mx
							ADR:Monte Elbruz 132, Lomas de Chapultepec Miguel Hidalgo, CDMX, México
							ORG:Inmotion Communications
							NOTE:
							VERSION:3.0
							END:VCARD'
		);
	}
}
















?>