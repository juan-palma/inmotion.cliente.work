<?php

	$idaMail_data = array();
	
	//Datos para el envio del correo.
	$idaMail_data['destino_mail'] = array();
	
	$idaMail_data['cc'] = array();
	
	$idaMail_data['bcc'] = array();
	$idaMail_data['bcc'][] = 'soporte@idalibre.com';
	$idaMail_data['bcc'][] = 'monserrat@radicaltesta.com';
	
	$idaMail_data['origen_nombre'] = 'Contacto - INMOTION';
	$idaMail_data['origen_mail'] = 'informes@idalibre.com';
	$idaMail_data['reply_nombre'] = 'Sistema - INMOTION';
	$idaMail_data['reply_mail'] = 'informes@idalibre.com';
	$idaMail_data['organizacion'] = 'INMOTION';
	$idaMail_data['asunto'] = 'Nuevo contacto desde sitio WEB INMOTION';
	
	$idaMail_data['priority'] = 3;
	$idaMail_data['encoding'] = 'quoted-printable';
	
	$idaMail_data['host'] = 'inmotion.com.mx';
	$idaMail_data['port'] = 465;
	$idaMail_data['username'] = 'contacto@inmotion.com.mx';
	$idaMail_data['password'] = 'Nm2019';
		
	
	$idaMail_data['texto_plano'] = '
		INMOTION:
		
		Nuevo contacto.
				
		* * * * * *

		
		[ fin ]
	';
?>