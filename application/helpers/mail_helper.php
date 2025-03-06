<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// funcion para el envio de mail con formato HTML.
function idaf_sendMail($template, $info, $idaMail_data){
	//global $json;
	//global $idaMail_data, $json;
	
/*
	if ( file_exists( APPPATH.'third_party/phpmailer/PHPMailerAutoload.php') ) {
		require_once( APPPATH.'third_party/phpmailer/PHPMailerAutoload.php' );
	} else{
		return false;
	}
*/
	
	require($template);
	
	$mail = new PHPMailer();
	
	$mail->CharSet = 'UTF-8';
	
	//$mail->SMTPDebug = 4;
	$mail->Priority = $idaMail_data['Priority'];
	$mail->Encoding = $idaMail_data['Encoding'];
/*
	$mail->Host = $idaMail_data['Host'];
	$mail->Port = $idaMail_data['Port'];
	$mail->Helo = $idaMail_data['Host'];
*/
	
	//$mail->PluginDir = $this->INCLUDE_DIR;
	
	$mail->From = $idaMail_data['origen_mail'];
	$mail->FromName = $idaMail_data['origen_nombre'];
	$mail->Sender = $idaMail_data['origen_mail'];
	$mail->Subject = $idaMail_data['asunto'];
	$mail->addReplyTo($idaMail_data['reply_mail'], $idaMail_data['reply_nombre']);
	
	
	if($idaMail_data['Username'] !== ''){
		$mail->Host = $idaMail_data['Host'];
		$mail->Port = $idaMail_data['Port'];
	
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = $idaMail_data['Username'];
		$mail->Password = $idaMail_data['Password'];
	}
	
	$mail->IsHTML(true);
	$mail->Body = $ida_mail_templateHTML;
	$mail->AltBody = $idaMail_data['texto_plano'];
	$mail->WordWrap = 0;
	
	
	foreach($idaMail_data['destino_mail'] as $v){
		$mail->AddAddress($v);
	}
	
	foreach($idaMail_data['bcc'] as $c){
		$mail->addBCC($c);
	}
			
	if($mail->send()){
		return true;
	} else{
		$json['errores'] = "El correo no pudo ser enviado. Mailer Error: " . $mail->ErrorInfo;
		return false;
	};
};





//Funcion para enviar un iCalendar o Invite
function idaf_sendMail_ical($info){
	global $idaMail_data, $json;
	
	if ( file_exists( APPPATH.'third_party/phpmailer/PHPMailerAutoload.php') ) {
		require_once( APPPATH.'third_party/phpmailer/PHPMailerAutoload.php' );
	} else{
		return false;
	}
	
	//PHPMailer
	$mail = new PHPMailer();
	$mail->SMTPDebug = 0;
	
	if($idaMail_data['Username'] !== ''){
		$mail->Host = $idaMail_data['Host'];
		$mail->Port = $idaMail_data['Port'];
	
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = $idaMail_data['Username'];
		$mail->Password = $idaMail_data['Password'];
	}
	
	$mail->IsHTML(true);
	$mail->setFrom($idaMail_data['origen_mail'], $idaMail_data['origen_nombre']);
	$mail->addReplyTo($idaMail_data['reply_mail'], $idaMail_data['reply_nombre']);
	foreach($idaMail_data['destino_mail'] as $v){
		$mail->AddAddress($v);
	}
	foreach($idaMail_data['bcc'] as $c){
		$mail->addBCC($c);
	}
	$mail->Subject = $idaMail_data['asunto'];
	
	
	
	// Contenido del Invite.
	$ical = 'BEGIN:VCALENDAR' . "\r\n";
	$ical .= 'PRODID:-//AMEX16DT1//AMX//ES' . "\r\n";
	$ical .= 'VERSION:2.0' . "\r\n";
	$ical .= 'CALSCALE:GREGORIAN' . "\r\n";
	$ical .= 'METHOD:REQUEST' . "\r\n";
	$ical .= 'BEGIN:VEVENT' . "\r\n";
	$ical .= 'TRANSP:OPAQUE' . "\r\n";
	$ical .= 'DTSTART:' . $info['fechaStart'] . 'T' . $info['horaStart'] . "\r\n";
	$ical .= 'DTEND:' . $info['fechaEnd'] . 'T' .  $info['horaEnd'] . "\r\n";
	$ical .= 'DTSTAMP:America/Mexico_City:' . date("Ymd") . 'T' . date("His") . "\r\n";
	$ical .= 'ORGANIZER;CN=' . $info['clNombre'] . ':mailto:' . $info['clMail'] . "\r\n";
	$ical .= 'UID:20160310IDA172000EV_sistemas@amexempresas.com.mx' . "\r\n";
	$ical .= 'ATTENDEE;CUTYPE=INDIVIDUAL;PARTSTAT=ACCEPTED;CN=' . $info['ejcName'] . ':MAILTO:' . $info['ejcMail'] . "\r\n";
	$ical .= 'CREATED:' . date("Ymd") . 'T' . date("His") . "\r\n";
	$ical .= 'DESCRIPTION:' . $info['vcalendar'] . "\r\n";
	$ical .= 'SEQUENCE:0' . "\r\n";
	$ical .= 'STATUS:CONFIRMED' . "\r\n";
	$ical .= 'SUMMARY:' . $info['invTitulo'] . "\r\n";
	$ical .= 'BEGIN:VALARM' . "\r\n";
	$ical .= 'X-WR-ALARMUID:06F15B7F-4753-43EB-82EF-BA82A55FCEB6' . "\r\n";
	$ical .= 'UID:06F15B7F-4753-43EB-82EF-BA82A55FCEB6' . "\r\n";
	$ical .= 'TRIGGER:-PT30M' . "\r\n";
	$ical .= 'DESCRIPTION:Recordatorio de eventos' . "\r\n";
	$ical .= 'ACTION:DISPLAY' . "\r\n";
	$ical .= 'END:VALARM' . "\r\n";
	$ical .= 'END:VEVENT' . "\r\n";
	$ical .= 'END:VCALENDAR';
	

	require($info['template']);
	
	$mail->Body = $ida_mail_templateHTML;
	$mail->AltBody = $idaMail_data['texto_plano'];
	$mail->Ical = $ical;
	$mail->IcalApp = $ical;


	//sEnviar el form y capturar posibles errores.
	if($mail->send()){
		return true;
	} else{
		$json['errores'] = "El correo no pudo ser enviado. Mailer Error: " . $mail->ErrorInfo;
		return false;
	};
	
};





function ida_sendMail($template, $info, $idaMail_data){
	require($template);
	$mail = new PHPMailer(true);
	
	try {
	    //Server settings
	    $mail->CharSet = 'UTF-8';
	    $mail->Priority = $idaMail_data['priority'];
		$mail->Encoding = $idaMail_data['encoding'];
	    
/*
	    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = $idaMail_data['host'];  				  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = $idaMail_data['username'];                 // SMTP username
	    $mail->Password = $idaMail_data['password'];                           // SMTP password
	    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = $idaMail_data['port'];                                    // TCP port to connect to
*/
	
	    //Recipients
	    $mail->setFrom($idaMail_data['origen_mail'], $idaMail_data['origen_nombre']);
	    $mail->addReplyTo($idaMail_data['reply_mail'], $idaMail_data['reply_nombre']);
	    
	    foreach($idaMail_data['destino_mail'] as $v){
			$mail->addAddress($v);
		}
		foreach($idaMail_data['cc'] as $c){
			$mail->addCC($c);
		}
		foreach($idaMail_data['bcc'] as $c){
			$mail->addBCC($c);
		}
	    
	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	
	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $idaMail_data['asunto'];
	    $mail->Body    = $ida_mail_templateHTML;
	    $mail->AltBody = $idaMail_data['texto_plano'];
		$mail->WordWrap = 0;
	
	    $mail->send();
	    return true;
	} catch (Exception $e) {
	    return 'No se pudo enviar el Mail. Mail Error: ' . $mail->ErrorInfo;
	}
}





function ida_sendMail2($template, $info, $idaMail_data){
	require($template);
	$mail = new PHPMailer(true);
	
	try {
	    //Recipients
	    $mail->setFrom('info@inmotion.com', 'INMOTION');
	    $mail->addAddress('juan.palma@me.com', 'INMOTION');     // Add a recipient
	    $mail->addReplyTo('info@inmotion.com', 'INMOTION');
	    $mail->addCC('monserrat@radicaltesta.com');
	    $mail->addBCC('soporte@idalibre.com');
		    
	    $cuerpoTxt = "
	    	El siguiente usuario envió el siguiente mensaje:: - 
	    	Nombre: ".$info['nombre']." - 
	    	Correo: ".$info['mail']." - 
	    	Telefono: ".$info['tel']." - 
	    	Mensaje: ".$info['mensaje']." - 
	    ";
	    
	    // Content
	    $mail->isHTML(true); // Set email format to HTML
	    $mail->Subject = 'Nuevo contacto desde sitio web INMOTION';
	    $mail->Body    = $ida_mail_templateHTML;
	    $mail->AltBody = $cuerpoTxt;
	
	    $mail->send();
	    return true;
	
	} catch (Exception $e) {
	    return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}




?>