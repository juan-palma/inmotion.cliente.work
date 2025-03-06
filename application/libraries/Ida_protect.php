<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Ida_protect {
	public $isCipher = false;
	
	public function __construct(){
		//parent::__construct();
		if (in_array(serialize(getenv('CIPHER')), openssl_get_cipher_methods())){
			$this->isCipher = true;
		}
	}
	
	public function encrypt($message = '')
	{
		if( $message === '' ){ return false; }
				
		try {
			if( $this->isCipher !== true ){
				$ivlen = openssl_cipher_iv_length(getenv('CIPHER'));
			    $iv = openssl_random_pseudo_bytes($ivlen);
			    $encryptext = openssl_encrypt($message, getenv('CIPHER'), getenv('KEY_ENCRIPT'), $options=0, $iv, $tag);
			    $encriptado = base64_encode($encryptext . '::-:,-;;' . $iv. '::-:,-;;' . $tag);
			    return $encriptado;
			    
			} else{
				throw new Exception('No existe el Cipher usado');
			}
		    
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return false;
	}
	
	public function decrypt($textEncrypt = '')
	{
		if( $textEncrypt === '' ){ return false; }
				
		try {
			if( $this->isCipher !== true ){
				$ivlen = openssl_cipher_iv_length(getenv('CIPHER'));
			    $iv = openssl_random_pseudo_bytes($ivlen);
				$lista = explode('::-:,-;;', base64_decode($textEncrypt));
	    		$desencriptado = openssl_decrypt($lista[0], getenv('CIPHER'), getenv('KEY_ENCRIPT'), $options=0, $lista[1], $lista[2]);
	    		return $desencriptado;
	    		
	    	} else{
				throw new Exception('No existe el Cipher usado');
			}
		    
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return false;
	}
	
	public function encrypt_decrypt($action, $string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = getenv('KEY_ENCRIPT');
		$secret_iv = 'This is my secret iv';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
		    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		    $output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
		    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
}