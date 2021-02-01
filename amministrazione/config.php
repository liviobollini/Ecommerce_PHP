<?php
if(!isset($_SESSION)){
	session_start();
}
//in windows localhost:8889
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ecommerce1";

include('Class/DB.php');
$dbInstance = new DB();
$conn=$dbInstance->connect($servername, $username, $password, $dbname);

include('Class/Messaggi.php');
$messaggio= new Messaggi();

include('Class/Amministratore.php');
$Amministratore= new Amministratore();

include('Class/Prodotti.php');
$Prodotti= new Prodotti();

include('Class/Utenti.php');
$Utenti= new Utenti();


include('Class/Pagination.php');

include('Class/Ordini.php');
$Ordine= new Ordini();

include('Class/Dashboard.php');
$Dashboard= new Dashboard();