<?php
include('config.php');
$dbConn = $dbInstance->connect($db);
//codice d usare soolo se si è on line e attivato IPN 
// use PaypalIPN;
//include('ipn/PaypalIPN.php');
// $ipn = new PaypalIPN();
// // Use the sandbox endpoint during testing.
// $ipn->useSandbox();
// $verified = $ipn->verifyIPN();
// if ($verified) {
    
	unset($_SESSION['Grantotale']);
	unset($_SESSION['cart']);
	unset($_SESSION['citta']);
	unset($_SESSION['indirizzo']);
	$last_id=$ordini->ultimo_id($dbConn);
	$ordini->aggiorna_stato_ordine($dbConn, $last_id);
	// }else{
	// echo "<h1>IPN non confermato </h1>";
	// }
	// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
	// header("HTTP/1.1 200 OK");
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
				<li>Grazie</li>
			</ul>
		</div>
	</div>
<?php
include('includes/bannerPagine.php');
?>
<div class="container" style="text-align:center">
<img src="Images/grazie.jpg" alt="" width=40%">
<br>
<a href="index.php" ><button class="btn btn-success btn-lg" 
style="margin-top:20px;margin-bottom:20px">Torna home page</button></a>
<br>
</div>

<?php
include('footer.php');
?>