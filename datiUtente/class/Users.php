<?php
class Users{
    public static $smt;
    public static $dbConn;
    public static $num_row;
    public static $row;
 protected  static function esegui_query($dbConn, $q)
    {
    self::$smt =$dbConn->prepare($q);
    self::$smt->execute();
    return self::$smt;
    }
    
public static function mostra_dati($dbConn){
    $id=$_SESSION['id'];
    $q= "SELECT * FROM users  WHERE   id='$id'" ;
    self::esegui_query($dbConn, $q);
   self:: $num_row =self::$smt->rowCount(self::$smt);
  
   if(self::$num_row >0){
    self::$row =self::$smt->fetch(PDO::FETCH_ASSOC);	
    return   self::$row;
   
   }else{
   echo 'non riconosciuto';
   }
}

public static function inserisci_dati($dbConn){
    $id=$_SESSION['id'];
    $nome=$_POST['nome'];
    $cognome=$_POST['cognome'];
    $indirizzo=$_POST['indirizzo'];
    $citta=$_POST['citta'];
    $nazione=$_POST['nazione'];
    $email=$_POST['email'];   
    $q= "UPDATE `users` SET `email`='$email',`nome`='$nome',
    `cognome`='$cognome',`indirizzo`='$indirizzo',`citta`='$citta',`nazione`='$nazione' WHERE `id`='$id'" ;
    self::esegui_query($dbConn, $q);
}
  
public static function verifica_vecchia_password($dbConn){
    $password_old=$_POST['password_old'];
    $password_old=md5($password_old);
    $q="SELECT  `password` FROM `users` WHERE `password`='$password_old'";
    self::esegui_query($dbConn, $q);
    self:: $num_row =self::$smt->rowCount(self::$smt);
    return  self:: $num_row;
}
public static function inserisci_nuova_password($dbConn){
    $password_new=$_POST['password_new'];
    $password_new=md5($password_new);
    $q="UPDATE `users` SET  `password`='$password_new' ";
    self::esegui_query($dbConn, $q);
   

}  
}