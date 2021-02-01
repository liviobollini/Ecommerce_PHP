<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$contenuto='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//IT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Newsletter</title>
</head>
<!-- Struttura tipica newsletter
- MESSAGGIO DI OPZIONE DI VISUALIZZAZIONE WEB
- TESTATA (logo , nome mittente)
- ARTICOLO
- ARTICOLO
- PIEDE (Dettagli, recapiti mittente, social accounts, opzione di unsuscribe)
-->
<body>
<div align="center">

	<table cellspacing="0" cellpadding="0" width="50%" bgcolor="#ebebeb">
		<tbody>
			<tr>
				<table style="border-left: 2px solid #e6e6e6; border-right: 2px solid #e6e6e6;" cellspacing="0" cellpadding="0" width="70%">

			</tr>
			<tr>
				<td style="background-color: #fff; border-top: 0px solid #000; text-align: center;  
				font-size: 18px; color:#484a4d; text-shadow: 1px 1px 2px #451a39;" align="center">
			
				
					Grazie per averci contattato
					<br>
					Ti contatteremo al piu \' presto
				</td>

			</tr>

			<tr>

				<td style="background-color: #fff; border-top: 0px solid #333333; border-bottom: 10px solid #fff;" align="center" valign="middle">
					<br>
					<a href="#"><img src="http://www.liviobollini.it/images/slider/bg1.jpg" width="600" height="350" border="0" alt="team cura e psiche" align="center" />
					</a>
				</td>
			</tr>
			<tr>
				<td style="background-color: #fff; border-top: 0px solid #000; text-align: center; height: 50px;" align="center">
					<span style="font-size: 19px; color: #575757;  font-family: arial; text-decoration: none;">
						Non vedi correttamente questa mail?
						<a style="font-size: 15px; color: #575757;  font-family: Arial; text-decoration: none; font-weight: bold;" <a href="http://www.liviobollini.it">Vai alla versione browser!
						</a>
					</span>
				</td>
			</tr>
		</tbody>
	</table>


	</tbody>

</div>
</body>

</html>
';


// Load Composer's autoloader
include_once 'vendor/autoload.php';


// Instantiation and passing `true` enables exceptions
$mail1 = new PHPMailer(true);

//Server settings
$mail1->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
$mail1->isSMTP(); // Invio la email usando SMTP: gmail
$mail1->Host = 'smtp.gmail.com'; //
$mail1->SMTPAuth = true; // Autentificazione account, password smtp
$mail1->Username = 'email@gmail.com';
$mail1->Password = '......';
$mail1->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail1->Port = 587;

$mail1->From = "livio.bollini@gmail.com";
$mail1->FromName = "livio bollini";
// $mail_mittente='email@gmail.com';
$mail1->AddAddress($mail_mittente);

//$mail->WordWrap = 50; // Wordwrap 50 caractères
$mail1->IsHTML(true);

$mail1->Subject = "grazie per averci contattato";
$mail1->Body = $contenuto;

if (!$mail1->Send()) {
echo "<p>non è possibile inviare messagio : ".$mail->ErrorInfo."</p>";
exit;
}

echo "guarda nelle tua email";