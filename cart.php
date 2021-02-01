<?php
include('config.php');
$dbConn = $dbInstance->connect($db);

if(isset($_SESSION['id'])){
if (isset($_POST['aggiorna'])) {
    $utente->aggiornaDati_utente($dbConn);
}
}


include('header.php');
include('includes/topMenu.php');
include('includes/checkout.php');

 ?>
<div class="clearfix"></div>

<?php
include('footer.php');
?>
