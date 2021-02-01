<?php
ob_start();
session_start();

//---------------------------------------------------
//Attenzione!!<--> Potrebbe non funzionare occorre abilitare uso app non //sicure nell' account google. Bisogna andare in sicurezza(menu a sinistra)  e poi accesso a app meno sicure da abilitare 
//scaricare dal sito: https://github.com/PHPMailer/PHPMailer/ 
// se devo disnstallare composer:
//https://stackoverflow.com/questions/30396451/remove-composer
//-------------------------------------------------
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Invio la email usando SMTP: gmail
   $mail->Host       = 'smtp.gmail.com';                    // 
    $mail->SMTPAuth   = true;                                   // Autentificazione account, password smtp
    $mail->Username   = 'EMAIL@gmail.com';               
      $mail->Password   = '....';                           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       
    $mail->Port       = 587;                                   
    
//Recipients
// definisco mittente e destinatario della mail
$nome_mittente =$_POST["nome"];
$mail_mittente =$_POST["email"];
$oggetto=$_POST["oggetto"];
$testo=$_POST["testo"];



// definisco il subject ed il body della mail
$mail_oggetto = $oggetto;
$mail_corpo = "Richiesta di contatto da:  ".$mail_mittente."<br>".
" che scrive oggetto: ".$oggetto."<br> ".
"Contenuto del messaggio  : ".$testo;
    $mail->setFrom($mail_mittente, $nome_mittente);
    $mail->addAddress('EMAIL@gmail.com', 'livio bollini');    


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'richiesta contatto';
    $mail->Body    = $mail_corpo;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   if($mail->send()){
  include('mail_risposta.php');
    $mail=1;
   $_SESSION['email']=$mail;     
   header ('location:../../contatti.php#invio');
   
} else {
    $mail=0;
$_SESSION['email']=$mail;
       //echo 'email NON inviata';
  header ('location:../../contatti.php#invio'); 
}