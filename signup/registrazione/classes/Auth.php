<?php
class Auth 
{
    public function getAllDati($db, $email, $psw)
    {
        $this->s = $db->prepare("SELECT * FROM users 
        WHERE email='$email' AND password='$psw'");
        $this->s->execute();
        $this->s->setFetchMode(PDO::FETCH_ASSOC);
        $this->num_row=$this->s->rowCount($this->s);
        return $this->num_row;
    }
    public function getRow($db, $email,$psw)
    {
        $this->s = $db->prepare("SELECT * FROM users 
        WHERE email='$email' AND password='$psw'");
        $this->s->execute();
          $this->row = $this->s->fetch(PDO::FETCH_ASSOC);
          $this->id_utente=$this->row['id'];         
          return  $this->id_utente;  
    }    
    public function signUp($db, $email, $psw)
    {
        $sql="INSERT INTO `users`( `email`, `password`) 
        VALUES ('$email','$psw')";
        $this->s = $db->prepare($sql);
        $this->s->execute();
    }
}
