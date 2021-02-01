<?php
session_start();
ob_start();
include __DIR__.'/classes/config.php';
include __DIR__ .'/classes/Dati.php';
include __DIR__.'/classes/DB.php' ;
include __DIR__.'/classes/Auth.php';
include ('classes/Messaggi.php');
//connessione al DB
$dbInstance = new DB();
$dbConn = $dbInstance->connect($db);
//classe Auth
$auth = new Auth();
//classe Messaggio
$messaggio= new Messaggi();