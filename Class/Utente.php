<?php
class Utente extends Messaggi
{
    protected function htmlFormdati() { ?>
   <h4>Aggiungi o Conferma  Dettagli</h4>
    <form action="#" method="post" class="creditly-card-form agileinfo_form">           
    <section class="creditly-wrapper wthree, w3_agileits_wrapper">
        <div class="information-wrapper">
            <div class="first-row form-group">
                <div class="controls">
                    <label class="control-label">Nome</label>
                    <input class="billing-address-name form-control" type="text" 
                    name="nome" value="<?php echo $this->row['nome']?>"required="">
                </div>
                <div class="controls">
                    <label class="control-label">Cognome</label>
                    <input class="billing-address-name form-control" type="text" 
                    name="cognome" value="<?php echo $this->row['cognome']?>" required="">
                </div>
                <div class="controls">
                    <label class="control-label">Inidirizzo </label>
                    <input class="form-control" type="text" 
                    value="<?php echo $this->row['indirizzo']?>" 
                    name="indirizzo" required="">
                </div>
                <div class="controls">
                    <label class="control-label">Citta': </label>
                    <input class="form-control" type="text" name="citta" 
                    value="<?php echo $this->row['citta']?>" required="">
                </div>
                <div class="controls">
                    <label class="control-label">Nazione': </label> 
                    <input class="form-control" type="text" 
                    value="<?php echo $this->row['nazione']?>" name="nazione" required="">
                </div>            
            </div>
            <button class="submit check_out" 
            name="aggiorna">Conferma i dati di spedizione</button>
        </div>
    </section>
</form>
<?php
}
    public function mostra_datiUtente($dbConn)
    {
        $id=$_SESSION['id'];
        $q = ("SELECT * FROM users WHERE id='$id'");
        $this->esegui_query($dbConn, $q);
        $this->rowCount= $this->smt->rowCount($this->smt);
        if ($this->rowCount > 0) {
            while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) {
            $this->htmlFormdati();
            }
        } ?>
     <br>
     <?php
    }
    public function aggiornaDati_utente($dbConn)
    {
 
        $id=$_SESSION['id'];
        $nome=$_POST['nome'];
        $cognome=$_POST['cognome'];
        $indirizzo=$_POST['indirizzo'];
        $_SESSION['indirizzo']=$indirizzo;
        $citta=$_POST['citta'];
        $_SESSION['citta']=$citta;
        $nazione=$_POST['nazione'];
        $q = ("UPDATE users SET 
        nome='$nome',
        cognome='$cognome',indirizzo='$indirizzo',citta='$citta',
        nazione='$nazione'
        WHERE id='$id'");
        $this->esegui_query($dbConn, $q);
    }
    protected  function esegui_query($dbConn, $q)
    {
        $this->smt = $dbConn->prepare($q);
        $this->smt->execute();
        return $this->smt;
    }
    public  function iscrizione_newsletter($dbConn){
    $email_news=$_POST['email_news'];

    $q="INSERT INTO newsletter( email) VALUES ('$email_news')";
    $testo="Iscrizione alla news letter avvenuta";
    $this->crea_sessione_messaggio($testo);
        
    $this->esegui_query($dbConn, $q);
    }
}
