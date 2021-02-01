<?php
include('../config.php');
ob_start();
if (!isset($_SESSION['email_log']) and !isset($_SESSION['email_reg'])) {
    header('location:../index.php');
}  
$dbConn = $dbInstance->connect($db);
include('Class/Users.php');
include('Class/OrdiniUtente.php');
include('header.php');
$row =Users::mostra_dati($dbConn);
$Customer_email=$row['email'];
?>
<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-2">
            <?php
                include('menu.php');
            ?>
        </div>
        <div class="col-md-7 offset-col-md-1">
        <?php
      if(isset($_SESSION['email_log'])){
      $utente= $_SESSION['email_log'];
      }else{
        $utente= $_SESSION['email_reg'];
      }
        ?>
        <br>
              <h3 class="text-center"> DETTAGLIO ORDINI:  <?php echo  $utente ?></h3>
              
              <br>   
<table class="table table-responsive table-hover table-striped table-bordered " >
                <thead>
                    <tr class="text-center">
                        <th scope="col" >id ordine</th>
                        <th scope="col">Creato</th>
                        <th scope="col">Tot Ordine</th>
                        <th scope="col">Stato</th>
                        <th scope="col">Indirizzo Spedizione</th>
                        <th scope="col">Citta</th>
                        <th scope="col">Email Cliente</th>
                        <th scope="col">Dettagli</th>
                        
                        
                        <th scope="col">Cancella</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                   OrdiniUtente::mostra_ordini($dbConn, $Customer_email);
                    ?>
                </tbody>
            </table>
            </div>
    </div>
</div>
<!-- footer-->
<?php
include('footer.php');
?>