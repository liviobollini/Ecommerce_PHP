<?php   
if(!isset($_SESSION)){
	session_start();
}

defined('DS') ? null : define('DS' , DIRECTORY_SEPARATOR);
defined('SITE_URL') ? null : define('SITE_URL' , $_SERVER['SERVER_NAME'].':8888'.__DIR__);
defined('CLASSI') ? null : define('CLASSI' , __DIR__. DS .'Class');

$db = [
    'host' => '127.0.0.1:8889',
    'username' => 'root',
    'password' => 'root'
];

include(CLASSI . DS . 'DB.php');
$dbInstance = new DB();

include('Class/Messaggi.php');
$messaggio= new Messaggi();

include('Class/Categoria.php');
$cat = new Categoria();

include('Class/Prodotti.php');
$newProdotti = new Prodotti();

include('Class/Pagination.php');

include('Class/Carta.php');
$cart= new Carta();

include('Class/Utente.php');
$utente= new Utente();

include('Class/Ordini.php');
$ordini= new Ordini();

?>