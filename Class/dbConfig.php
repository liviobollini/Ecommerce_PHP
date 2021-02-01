<?php
//DB details
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName     = 'ecommerce1';

//Create connection and select DB
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($conn->connect_error){
    die("Non è possibile connettersi al DB: " . $db->connect_error);
}
