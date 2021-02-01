<?php 
session_start();
ob_start();
    include('DB.php');
    include('Dati.php');
$db = [
    //connessione al DB 8889= portaMysql di Mamp
    'host' => '127.0.0.1:8889',
    'username' => 'root',
    'password' => 'root'
];
include('../registrazione/classes/Messaggi.php');
$messaggio= new Messaggi();
