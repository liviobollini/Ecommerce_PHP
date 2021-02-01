<?php
if(!isset($_COOKIE["email_log"])){
    header('location: index.php');
   }
include('config.php');
include('header.php');
if(isset($_GET['id_cancella'])){
    $Prodotti->cancella_prodotto($conn);
    header('location: prodotti.php');
}
if (isset($_GET['id_modifica'])) {?>
<div class="container-fluid" style="margin-top:50px">
    <div class="row">
        <div class="col-md-2">
            <?php
                include('menu.php');
            ?>
        </div>   
    <div class="col-md-10">
        <?php $Prodotti->mostra_singoloProdotto($conn);?>
    </div>
</div>
</div>

<?php
}
if (isset($_POST['uploadfilesub'])) {
    $Prodotti->modifica_prodotto($conn);
}
include('footer.php');