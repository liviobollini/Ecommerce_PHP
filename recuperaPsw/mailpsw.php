<?php
//---------------------------------------------------
//Attenzione!!<--> Potrebbe non funzionare occorre abilitare uso app non //sicure nell' account google 
//scaircare dal sito: https://github.com/PHPMailer/PHPMailer/ 
//-------------------------------------------------
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require 'vendor/autoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
   $link='http://localhost:8888/ECOMM';
try {
    //Server settings
    //$mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP();       // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;         // Enable SMTP authentication
    $mail->Username   ='email@gmail.com';    // SMTP username
    $mail->Password   = '.....';   // SMTP password
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;  // TCP port to connect to

    //Recipients
    $mail->setFrom('email@gmail.com', 'web developer');
   $mail->addAddress($email);             
    // Content
    $mail->isHTML(true);          // Set email format to HTML
    $mail->Subject = ' password reset';
    $mail->Body    = "Questa la tua password provvisoria: ".$pwd.
    '<br><br><br><hr>Clicca su questo link: '.$link;

    $mail->AltBody = "Questa la tua password provvisoria: ".$pwd.
    '<br><br><br><hr>Clicca su questo link: '.$link;
    $mail->send();
   $_SESSION["invio"]=0;
    ?>
<script>
alert("email inviata dal file mailpsw.php");
</script>
<?php
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}