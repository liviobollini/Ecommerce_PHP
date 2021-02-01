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
        <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" 
      data-bs-toggle="collapse" data-bs-target="#collapseOne" 
      aria-expanded="true" aria-controls="collapseOne">
      <h5 id="prodotti_ordinati" class="text-center" 
      style="cursor:pointer">Utenti Registrati</h5>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" 
    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="text-center">
        <h5>
        Nro utenti registrati:  <?php echo $Dashboard->numero_utenti($conn);?>
        </h5>
    
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h5 id="prodotti_ordinati" class="text-center" style="cursor:pointer">Prodotti Ordinati per Acquisto</h5>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" 
    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
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
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" 
      type="button" data-bs-toggle="collapse" 
      data-bs-target="#collapseThree" aria-expanded="false" 
      aria-controls="collapseThree">
      <h5 id="tot_prodotti" class="text-center" 
      style="cursor:pointer">Prodotti Inseriti per Fascia Prezzo</h5>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse"
    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
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
    </div>
  </div>
</div>      
        </div>
        <!-- fine terza tabella  -->
             <div class="col-md-2"></div>
    </div>
</div>
<?php
include('footer.php');
?>