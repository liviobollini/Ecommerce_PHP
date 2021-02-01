<?php
if(!isset($_COOKIE["email_log"])){
    header('location: index.php');
   }
if (isset($_POST['inserisci'])) {
include('../config.php');
    include('dbConfig.php');
    //da qui in poi istruzioni necessarie per il caricamanto del file
    if ($_FILES['filecsv']['name']) {
        $filename = explode(".", $_FILES['filecsv']['name']);
        if ($filename[1] == 'csv') {
            $filename = $_FILES['filecsv']['name'];
            $filetmpname = $_FILES['filecsv']['tmp_name'];
            $folder = 'csv/';
            move_uploaded_file($filetmpname, $folder.$filename);
            $file=$folder.$filename;
            ini_set('auto_detect_line_endings', true);
            $f = fopen($file, 'r');
            while (($data = fgetcsv($f)) !== false) {
                $email=$data[0];
                $password=$data[1];
                $password=md5($password);
                $nome=$data[2];
                $cognome=$data[3];
                $indirizzo=$data[4];
                $citta= $data[5];
                $nazione= $data[6];
        $q="INSERT INTO `users`( `email`, `password`, `nome`, `cognome`, 
        `indirizzo`, `citta`, `nazione`)
            VALUES ('$email','$password','$nome','$cognome',
            '$indirizzo','$citta','$nazione')";
        $result = $db->query($q);
            } 
            fclose($f);
            $testo="Upload dei dati eseguito";
            $messaggio->crea_sessione_messaggio($testo);
            ini_set('auto_detect_line_endings', false);
        } 
    }
}
?>
<?php
include('../header.php');
?>
<style>
#verifica{
display:none;
}
</style>
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">

        <h3 >Importa un nuovo File nel Data Base</h3>

 <div id="verifica">
 <hr>
  <ul>
      <li>Assicurati di avere un file csv 
      con i dati da Importare</li>
      <li>Scegli file da importare </li>
      <li>Clicca sul bottone Import</li>
      <li>Verifica se hai un messaggio Upload Eseguito</li>
      <li>controlla nell cartella CSV, 
      dove adesso si trova il file</li>
      <li>Controlla nella tabella users 
      se i dati sono stati importati</li>
  </ul> 
  </div>
  <hr>
            <div class="container">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" 
                            class="form-label"><strong>
                            Inserisci File</strong></label>
                            <input name="filecsv" id="filecsv" 
                            type="file" class="form-control 
                            form-control-sm"
                             aria-describedby="upload" required="">
                        </div>
                        <div class="d-grid gap-1">
                            <button type="submit" 
                            class="btn btn-primary btn-block" 
                            name="inserisci" id="inserisci">Import
                                file</button>
                        </div>
                        <div>
                            <br>
                            <a href="../index.php">
                                <div class="d-grid gap-1" style="margin-top:10px">
                                    <button class="btn btn-primary" 
                                    type="button">
                                    Torna a Amministrazione</button>
                                </div>
                            </a>
                            <br>
                            <?php
                            if (isset($_SESSION['testo'])) {?>
                             <style>
                            #inserisci{
                            display: none;
                            }
                            #verifica{
                            display: block;
                            }
                            </style>
                            <div class="alert alert-dark" 
                            style="text-align:center">                      
                            <?php
                                $messaggio->messaggio();
                                ?>
                                </div>                       
                         <?php       
                            }
?>
                    </div>
            </div>
            <!-- 
            progress bar
            https://codepen.io/PerfectIsShit/pen/zogMXP -->
        </div>
        <?php
include('../footer.php');
?>