<?php
include('config.php');
$dbConn = $dbInstance->connect($db);

include('header.php');
include('includes/topMenu.php');
?>
<div class="form jumbotron" 
style="font-size:20px;font-weight:bold;color:black;padding:20px">
	<?php $messaggio->messaggio(); ?>
</div>
<?php
include('includes/banner.php');
include('includes/hotOffer.php');
?>

<div class="top-brands">
<div class="container">
<h3>Prodotti Offerta</h3>
<div class="agile_top_brands_grids" id="offerte">
<?php
$newProdotti->mostra_prodotti_sconto($dbConn);

?>

</div>
</div>
</div>

<div class="top-brands">
<div class="container">
<h3>Nuovi Prodotti</h3>

<div class="agile_top_brands_grids" id="offerte">
<?php

$newProdotti->mostra_prodotti_nuovi($dbConn);
?>

</div>
</div>
</div>





<?php
include('footer.php');
?>