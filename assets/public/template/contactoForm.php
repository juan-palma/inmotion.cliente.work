<?php 
$ida_mail_templateHTML = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Inmotion Contacto Formulario</title>
	<style type="text/css">
	.blue-background{
		background-color: #006FCF;
		color: #fff; 
	}
	.media-hide{
		display: block;
	}
	@media only screen and (max-width: 600px) {
	    .media-hide {
	        display: none;
	    }
	}
</style>
</head>

<body style="background-color: #ff6600; margin: 0px; padding: 0px; text-align: center;">
	<table width="800" border="0" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, Arial;  font-size: 18px; margin: 0px auto; padding: 0px; background-color: white" align="center";>
		<tr>
			<td style="width: 100%; padding: 0px 2rem; text-align: center;">
				<img src="'. $info["logo"] .'" style="width: 14%; height: auto; margin: 0px auto; padding: 2rem 0px;"></img>
			</td>
		</tr>
		<tr style="text-align: center">
			<td style="width: 70%; padding: 0px 2rem; text-align: left; display: block; margin: 0px auto;" align="center">
				<h2 style="color: #ff6600;">Mail - Contacto</h2>
				
				<span style="color: #666; font-size: 90%;">
					A continuación encontrara la información que se ha dejado suministrada a travez de su sitio web <i>'. $info["sitio"] .'</i> en su formulario de contacto:
				</span>
				
				<div style="color: #666; margin-top: 34px">
					Nombre: <b>'. $info["nombre"] .'</b>,<br />
					Telefono: <b>'. $info["tel"] .'</b>,<br />
					Correo: <b>'. $info["mail"] .'</b>,<br />
					<hr />
					Mensaje:<br />
					<b>'. $info["mensaje"] .'</b>.<br />
				</div>
				
				<div style="padding: 6.6rem 0px;"></div>
			</td>
		</tr>
		
		
	</table>
	<table width="800" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family: Arial, Helvetica, Arial; font-size: 11px; background-color: #D6D7DB;color: #717981;line-height: 1.4;">
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td width="50">&nbsp;</td>
			<td width="500">Este correo electr&oacute;nico est&aacute; destinado a personal interno autorizado de la empresa <u>'. $info["empresa"] .'</u>
				<br />Este correo electrónico fue generado por su sitio web '. $info["sitio"] .' de manera automática.
				<br />
				<br />Por favor no responda a este correo electrónico.
				<br />
				<br />'. date("Y") .' Derechos Reservados &copy; <u>'. $info["empresa"] .'</u>
			</td>
			<td width="50">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
	</table>
</body>

</html>';
?>