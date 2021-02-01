<?php

if(!isset($_COOKIE["email_log"])) {
 header('location: index.php');
}
include('header.php');
include('config.php');
if(isset($_POST['CreaAmmnistratore'])){
$Amministratore->inserisci_amministratore($conn);
}
?>
<div class="container-fluid" style="margin-top:50px">
  <div class="row">
    <div class="col-3">
      <?php  
include('menu.php');
?>
    </div>
    <div class="col-9">
    <?php
  include('form_user.php');
  
      ?>
  </div>
	</div>
</div>
<?php 
  include('footer.php');
  ?>