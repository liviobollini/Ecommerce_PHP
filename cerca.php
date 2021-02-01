<?php
include('config.php');
include('header.php');
include('includes/topMenu.php');
include('Class/dbConfig.php');
$search = $_GET['search'];

    //minimo valore della stringa da cercare
    $min_length = 3;
    //se il valore della stringa inserita
    if (strlen($search) >= $min_length OR !$search="") {
        //filtro query per non avere sql injection
        $search = htmlspecialchars($search);
        $search= mysqli_real_escape_string($conn, trim($search));
        $sql = "SELECT * FROM `products`
            WHERE (`description` LIKE '%".$search."%') OR (`name` LIKE '%".$search."%')";
        $result = $conn->query($sql);
        if ($result->num_rows>0) {?>
<div class="container">
    <h4>I risultati della tua ricerca: <?php echo''.$search ?></h4>
</div>
<br>
<?php
         while ($row = $result->fetch_assoc()) {
             $stringa=$row['description'];
             $pos=strpos($stringa, $search);//posizione del input $search
             $substr= substr($stringa, $pos, 100); ?>
<div class="container" style="border: 1px solid grey">
    <a href="prodotto.php?id=<?php echo $row['id'] ?>">
        <h3>
            <?php
                echo
                $row['name']
                ?>
        </h3>
    </a>
    <?php
                echo
                "</h3>".$substr."</p>"; ?>

</div>
<br>
<br>
<?php
         }
        } else { //nessun risultat
          ?>
<div class="container text-center" style="font-size:20px;
border:1px solid gray;padding:20px;border-radius:20px">

    <?php
            echo "Nessun risultato trovato";
  ?>
</div>
<br>
<?php
}
    } else { ?>
<div class="container text-center" style="font-size:20px;
border:1px solid gray;padding:20px;border-radius:20px">
    <?php echo "Devi inserire almeno ".$min_length." caratteri"; ?>
</div>
<br>
<?php
    }

?>
<?php 
include('footer.php');
?>