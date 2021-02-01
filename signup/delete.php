<?php

$id=$_GET["id"];
include('db_connection.php');

 try
    
  {
     
  $sql="DELETE FROM `users` WHERE id=(:id)";
   $s = $pdo->prepare($sql);
   $s->bindValue(':id', $id);
   $s->execute();


     
  }
  catch (PDOException $e)
  {
    $error = 'Errore inserimento: ' . $e->getMessage();
echo $error;
    exit();
  }
  header ('location:../pagriservata.php');
?>
