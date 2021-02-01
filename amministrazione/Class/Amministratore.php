<?php
class Amministratore extends Messaggi
{
    public function verifica_amministratore($conn)
    {
        $this->email=$_POST["email_log"];
        $sql = "SELECT * FROM `amministratore` WHERE email= '$this->email'";
        $this->result = $conn->query($sql);
        return $this->result;
    }
    public function inserisci_amministratore($conn)
    {
        $this->email=htmlspecialchars(trim($_POST['email_utente']));
        $this->password=htmlspecialchars(trim($_POST['psw_utente']));
        $this->password=md5($this->password);

        $q="SELECT * FROM `amministratore` WHERE email='$this->email'";
        $this->result = $conn->query($q);
        $this->rowcount=mysqli_num_rows($this->result);
        if ($this->rowcount==0) {
            $q="INSERT INTO `amministratore`( `email`, `password`) 
VALUES ('$this->email','$this->password')";
            $this->result = $conn->query($q);
            $this->testo="Utente inserito";
            $this->crea_sessione_messaggio($this->testo);
        }
        else{
            $this->testo="Utente esistente";
        $this->crea_sessione_messaggio($this->testo);
        }
    }
}