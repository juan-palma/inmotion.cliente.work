<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ida_protect {
	
	public function __construct(){
		//parent::__construct();
		if (in_array($cipher, openssl_get_cipher_methods())){
			
		}
	}
	
	public function encrypt($message = '')
	{
		if( $message === '' ){ return false; }
		
		$KmsClient = new Aws\Kms\KmsClient([
			'profile' => 'default',
			'version' => 'latest',
			'region' => 'us-east-1'
		]);
		
		$keyId = $this->aliasKey;
		
		try {
			$result = $KmsClient->encrypt([
				'KeyId' => $keyId,
				'Plaintext' => $message
			]);
			return base64_encode($result['CiphertextBlob']);
		    
		} catch (AwsException $e) {
			// output error message if fails
			echo $e->getMessage();
		}
	}
	
	public function decrypt($message = '')
	{
		if( $message === '' ){ return false; }
				
		$KmsClient = new Aws\Kms\KmsClient([
			'profile' => 'default',
			'version' => 'latest',
			'region' => 'us-east-1'
		]);
		

		try {
			$result = $KmsClient->decrypt([
				'CiphertextBlob' => base64_decode($message)
		    ]);
    		
    		return $plaintext = $result['Plaintext'];
						
		} catch (AwsException $e) {
    		echo $e->getMessage();
		}

	}
}