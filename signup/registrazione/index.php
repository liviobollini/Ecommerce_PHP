<?php
include('init.php');
  if (isset($_POST["email_reg"])) {
      //connessione al DB
      $dbInstance = new DB();
      $dbConn = $dbInstance->connect($db);
      //passaggio parametri
      $email_reg=trim($_POST["email_reg"]);
      $psw_reg=trim($_POST["psw_reg"]);
      $user=new Dati($email_reg, $psw_reg);
      $email=$user->getEmail();
      $psw=$user->getPsw();
      $num_row=$auth->getAllDati($dbConn, $email, $psw);
      if ($num_row  > 0) {
          $testo="Utente gia' registrato";
          $messaggio->crea_sessione_messaggio($testo);
          header('location:../../login.php');
      } else {
          $_SESSION['email_reg']=$email;
          $_SESSION['psw_reg']=$psw;
          $insert= $auth->signUp($dbConn, $email, $psw);
          $id_utente=$auth->getRow($dbConn, $email, $psw);
          $_SESSION['id']=$id_utente;
          include('../../mail/mailer/mailchimp.php');
          $testo="Registrazione effettuata";
          $messaggio->crea_sessione_messaggio($testo);
          header('location:../../login.php');
      }
  } else {
    $testo="Non hai compilato i campi correttamente";
    $messaggio->crea_sessione_messaggio($testo);
    header('location:../../login.php');
}
