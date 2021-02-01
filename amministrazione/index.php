<?php
include('config.php');
ob_start();
if(isset($_COOKIE["email_log"])){
    header('location: dashboard.php');
   }
include('header.php');
?>
<div class="container">
<?php  
include('form.php');
include('footer.php');
?>
</div>