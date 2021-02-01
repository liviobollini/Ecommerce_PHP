<?php
include('config.php');
if(!isset($_COOKIE["email_log"])){
    header('location: index.php');
   }
include('header.php');
include('files/dbConfig.php');
?>
<div class="container-fluid" 
style="margin-top:50px">
    <div class="row">
        <div class="col-4">
            <?php
                include('menu.php');
            ?>
        </div>
        <div class="col-8">
            <a href="#" class="btn 
            btn-primary">Import</a>
            <a href="#" class="btn 
            btn-primary">Export</a>
            <br>
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
                        <th scope="col">Modifica</th>
                        <th scope="col">Cancella</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $Ordine->lista_Ordini($conn);
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        include('footer.php');
                   include('modale.php');               
                    ?>

 