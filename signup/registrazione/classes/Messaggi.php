<?php

class Messaggi
{

    public function crea_sessione_messaggio($testo){

        if(!empty($testo)){
         
     
            $_SESSION['testo'] = $testo;
        
            
          }else{
            echo "<h1>messaggio vuoto</h1>";
            $this->testo = " ";
          }
    }

    public function messaggio(){
    
      
        if(isset($_SESSION['testo'])){
         
            echo $_SESSION['testo'];
            unset ($_SESSION['testo']);
            
            } 
            
    }
}