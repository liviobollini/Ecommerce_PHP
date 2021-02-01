<?php
include('config.php');

$dbConn = $dbInstance->connect($db);
include('header.php');
include('includes/topMenu.php');

 include('includes/banner.php');
 ?>
 <div class="top-brands">
 <div class="container">
    <div class="agile_top_brands_grids">

<?php include('includes/shop.php'); ?>
</div>
</div>
</div>
<?php
include('footer.php');
?>