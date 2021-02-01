<?php
if(!isset($_COOKIE["email_log"])){
  header('location: index.php');
 }
include('../config.php');
include('../header.php');
?>
     <body>
 <div class="container">
<div class="row">
 </div>
       <div class="col-9">
<div class="col-11">
      <div class="jumbotron">
  <h1 class="display-4">Hai scaricato il file nella cartella csv</h1>
  <p class="lead">Per aprire un file csv di defualt viene usato <b>Excel</b></p>
  <hr class="my-4">
  <p>Potrai poi Trasformare il file csv in 
  Excel: le istruzioni sono 
  <ul>
      <li>clicca su dati e testo in colonne</li>
      <li>evidenzia il tutto il contentuo del file</li>
      <li>segui il percorso guidato mettendo 
      come separtore la virgola</li>
      <li>salva in Excel</li>
  </ul> 
  </p>
</div>
   </div> 
   <a href="../index.php">
   <div class="btn-group" role="group" 
   aria-label="Basic mixed styles example">
  <button type="button" 
  class="btn btn-warning">Torna alla home page 
  </button>
</div>   
</a>
 </div>

