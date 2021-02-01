<?php
session_start();
// definisco mittente e destinatario della mail
$nome_mittente =$_POST["nome"];
$mail_mittente =$_POST["email"];
$testo=$_POST["testo"];
$mail_destinatario = "bollinilivio@gmail.com";

// definisco il subject ed il body della mail
$mail_oggetto = "richiesta di contatto";
$mail_corpo = "richiesta di contatto da :  ".$mail_mittente." che scrive: \r\n\n".$testo;


// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: ". $nome_mittente ." <".  $mail_mittente .">\r\n";
//$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
$mail_headers .= "X-Mailer: PHP/" . phpversion();

if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers)){



$mail=1;
$_SESSION['email']=$mail;
  header ('location:../contatti.php#invio');
	include('mail_risposta.php');
}else{
    
    $mail=0;
$_SESSION['email']=$mail;
  header ('location:../contatti.php#invio');
}

