<?php
include('config.php');
if(!isset($_COOKIE["email_log"])){
    header('location: index.php');
   }
include('header.php');
?>
<div class="container-fluid" style="margin-top:50px">
    <div class="row">
        <div class="col-md-2">
            <?php
                include('menu.php');
            ?>
        </div>
        <div class="col-md-6 offset-md-2">
 
        <div class="text-center">
        <h3>
        Nro utenti registrati:  <?php echo $Dashboard->numero_utenti($conn);?>
        </h3>
    
        </div>
       <hr style="height: 4px !important;">
       <br>
        <!-- fine prima tabella  -->
  
            <h3 id="prodotti_ordinati" class="text-center" style="cursor:pointer">Prodotti Ordinati per categoria</h3>
            <table class="table table-responsive table-hover table-striped table-bordered "
                id="tabella_prodotti_ordinati">
                <thead class="text-center">
                    <tr class="text-center">
                        <th scope="col">Prodotto</th>
                        <th scope="col">Totale</th>
                        <th scope="col">Confermato</th>
                        <th scope="col">Abbandonato</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $Dashboard->prodotti_ordinati($conn);
                ?>
                </tbody>
            </table>
            <hr style="height: 4px !important;">     
        <!-- fine seconda tabella  -->
        <h3 id="tot_prodotti" class="text-center" style="cursor:pointer">Prodotti per Fascia</h3>
        
        <table class="table table-responsive table-hover table-striped table-bordered "
                id="tabella_prodotti_ordinati">
                <thead class="text-center">
                    <tr class="text-center">
                        <th scope="col">Numero Prodotti</th>
                        <th scope="col">Fascia Prezzo</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                $Dashboard->prodotti_fascia($conn);
                ?>
                </tbody>
            </table>
        
        </div>

        <!-- fine terza tabella  -->
             <div class="col-md-2"></div>
    </div>
</div>
<?php
include('footer.php');
?>