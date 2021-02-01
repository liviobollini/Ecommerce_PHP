<?php
if(!isset($_SESSION)){
	session_start();
}
ob_start();

$db = [
    'host' => '127.0.0.1:8889',
    'username' => 'root',
    'password' => 'root'
];
include('Class/DB.php');
$dbInstance = new DB();
$dbConn = $dbInstance->connect($db);
include('Class/Query.php');