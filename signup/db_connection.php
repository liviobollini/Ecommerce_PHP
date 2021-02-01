<?php
try
{
   $pdo = new PDO('mysql:host=localhost;dbname=ecommerce1', 'root', 'root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $output = 'Impossibile connettersi al DB.';
  echo $output;
  exit();
}
$output = 'Database connection stabilita.';
?>
