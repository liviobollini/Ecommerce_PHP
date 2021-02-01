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
        <div class="col-md-8 offset-md-1">
            <a href="files/import.php" class="btn btn-primary">Import</a>
            <a href="files/export.php" class="btn btn-primary">Export</a>
            <br>
            <br>
            <table class="table table-responsive table-hover table-striped table-bordered " >
                <thead>
                    <tr class="text-center">
                        <th scope="col">Email</th>
                        <th scope="col">Modifica</th>
                        <th scope="col">Cancella</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $Utenti->lista_Utenti($conn);
                    ?>
                </tbody>
            </table>
        </div>
        <?php
include('footer.php');
?>