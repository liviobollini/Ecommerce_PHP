<?php
if(!isset($_COOKIE["email_log"])){
    header('location: index.php');
   }
include('config.php');
include('header.php');
if (isset($_POST['Inserisci'])) {
    $Prodotti->inserisci_nuovo_prodotto($conn);
}
?>
<div class="container-fluid" style="margin-top:50px">
    <div class="row">
        <div class="col-md-2">
            <?php  
include('menu.php');
?>
        </div>
        <div class="col-md-10">     
		<?php include('form_prodotto.php');?>
       </div>
        <?php
include("footer.php");
?>