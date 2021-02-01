<?php
if(!isset($_COOKIE["email_log"])){
 header('location: index.php');
}
include('config.php');
include('header.php');
	?>
<div class="container-fluid" style="margin-top:50px">
    <div class="row">
        <div class="col-md-2">
            <?php  
include('menu.php');
?>
            <?php
  $baseURL = 'http://localhost:8888/ECOMM/amministrazione/prodotti.php';
  $limit = 8; 
  //  limite & punto di partenza= offset 
  $offset = !empty($_GET['page'])?(($_GET['page']-1)*$limit):0;
  // Conta i record
  $query  ="SELECT * FROM products";
  $conto = $conn->query($query);
  $rowcount=mysqli_num_rows($conto);  
  // Inizializzare pagination Class
  $pagConfig = array(
      'baseURL' => $baseURL,
      'totalRows'=> $rowcount,
      'perPage'=>$limit
  );
  
  ?>
        </div>
        <div class="col-md-10">
            <div class="container">
                <h3 style="text-align:center">Elenco Prodotti</h3>
                <table class="table table-responsive table-hover table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Immagine</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Sconto</th>
                            <th scope="col">Data</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Modifica</th>
                            <th scope="col">Cancella</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $Prodotti->elenca_prodotti($conn,$offset, $limit) ?>
                        <br>
                    </tbody>
                </table>
                <?php 
 $pagination =  new Pagination($pagConfig);
 echo $pagination->createLinks(); 
 ?>
            </div>
        </div>
    </div>
</div>
<?php 
include('footer.php');
	?>