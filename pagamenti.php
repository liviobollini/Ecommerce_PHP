<?php
include('config.php');
$dbConn = $dbInstance->connect($db);
//se è si è cliccato sul pulsante pagamento e loggati
if (isset($_SESSION['citta']) or isset($_SESSION['email_log'])) {
    if (isset($_POST['pagamento'])) {
        if (isset($_SESSION['Grantotale'])) {
            $ordini->inserisci_ordine($dbConn);
            $last_id = $dbConn->lastInsertId();
            $sess_cart = $_SESSION['cart'];
            $ordini->inserici_dettaglio_ordine($dbConn, $last_id, $sess_cart);
        }
    }
}else{
    header('location:index.php');
}
include('header.php');
include('includes/topMenu.php');
?>
<div class="products-breadcrumb">
		<div class="container-fluid">
			<ul>
				<li><i class="fa fa-home" 
				aria-hidden="true"></i>
				<a href="index.php">Home</a>
				<span>|</span></li>
				<li>Payment</li>
			</ul>
		</div>
	</div>
<?php
include('includes/MenuVerticale.php');
include('includes/pago.php');
//footer
include('footer.php');
?>
