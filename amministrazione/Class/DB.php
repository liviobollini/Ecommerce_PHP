<?php
Class DB{
public function connect($servername, $username, $password, $dbname){
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
return $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection fallita: " . $conn->connect_error);
} 
}
}