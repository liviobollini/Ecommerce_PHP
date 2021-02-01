<?php
include('config.php');
$dbConn = $dbInstance->connect($db);
include('header.php');
include('includes/topMenu.php');

 ?>
 <!-- products-breadcrumb -->
 
<div class="products-breadcrumb">
		<div class="container-fluid">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Contatti</li>
			</ul>
		</div>
	</div>	


<!-- //products-breadcrumb -->
<div class="banner">
 <?php
    include('includes/MenuVerticale.php');
    include('includes/mail.php');
?>
</div>
</div>
<?php
include('footer.php');
?>
