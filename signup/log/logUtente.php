<?php
  include('config.php');
  // se il form è stato compilato 
 if(isset($_POST["email_log"])){
    //connessione al DB
    $dbInstance = new DB();
    $dbConn = $dbInstance->connect($db);
    //catturo i dati del form con il metodo post
    $email_log=trim($_POST["email_log"]);
    $psw_log=trim($_POST["psw_log"]);
    //elaboro i dati 
    $user=new Dati($email_log,$psw_log);
    $email=$user->getEmail();
    $psw=$user->getPsw();
    //attraverso una funzione seleziono i dati
    //ottengo il numero di righe con il record che contiene
    //email e psw che utente ha inserito nel Db
    $num_row=getAllDati($dbConn,$email,$psw);
    //se il numero di righe >0 utente riconosciuto 
    // creo le sessioni e un messaggio di avvenuto log
if ($num_row > 0){
    $id_utente=getRow($dbConn,$email,$psw);
    $_SESSION['id']=$id_utente;
    $_SESSION['email_log']=$email;
    $_SESSION['psw_log']=$psw;   
    //messaggio
    $testo="Hai effettuato accesso correttamente";
    $messaggio->crea_sessione_messaggio($testo);
    header ('location:../../cart.php');      
         }
         //se il numero di righe non è >0 allora utenete si deve registrare
 else{
    $testo="Utente non riconosciuto devi registrarti";
    $messaggio->crea_sessione_messaggio($testo);
    header ('location:../../cart.php');           
              }
}else {
    $testo="Non hai compilato i campi correttamente";
    $messaggio->crea_sessione_messaggio($testo);
    header ('location:../../login.php');   
 
    }
    //ritorna numero record con email e psw uguali a quelle inserite 
function getAllDati($db,$email,$psw){
    $statement = $db->prepare("SELECT * FROM users WHERE email='$email' AND password='$psw'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $num_row=$statement->rowCount($statement);
    return $num_row;
    }
//ritorna ID
function getRow($db,$email,$psw){
    $statement = $db->prepare("SELECT * FROM users WHERE email='$email' AND password='$psw'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
	$id=$row['id'];
    return $id;
    }
?>
