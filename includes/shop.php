
<div class="container">
    <h1>Elenco dei  Prodotti Pagination</h1>
    <br>

    <?php
    
    // Set some useful configuration
    $baseURL = 'http://localhost:8888/ECOMM/shop.php';
    $limit = 8;
    
    //  limite & punto di partenza= offset 
    $offset = !empty($_GET['page'])?(($_GET['page']-1)*$limit):0;

    // Conta i record
	  $query  ="SELECT * FROM products";
        $smt = $dbConn->prepare($query );
        $smt->execute();
        $rowCount= $smt->rowCount($smt);
    
    // Inizializzare pagination Class
    $pagConfig = array(
        'baseURL' => $baseURL,
        'totalRows'=>$rowCount,
        'perPage'=>$limit
    );
    $pagination =  new Pagination($pagConfig);
    ?>
        <!-- Display products list -->

        <?php $newProdotti->mostra_prodotti($dbConn,$offset,$limit) ?>
           
	<!-- Display pagination links -->

<br>
 <div style="clear: left"></div>
  
        <?php echo $pagination->createLinks(); ?>
    
     

    </div>
