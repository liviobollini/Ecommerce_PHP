<?php
class Ordini extends Carta
{
    protected function esegui_query($dbConn, $q)
    {
        $this->smt = $dbConn->prepare($q);
        $this->smt->execute();
        return $this->smt;
    }
    public function inserisci_ordine($dbConn)
    {
        $this->time=time();
        // $this->oggi=(date("d-m-Y",$this->time));
        //sessione creata in cart.php: funzione calcolo_totale
        $this->totale_ordine=$_SESSION['Grantotale'];
        //sessioni create nel processo di log/registrazione
        $this->Customer_id=$_SESSION['id'];
        if (isset($_SESSION['email_log'])) {
            $this->Customer_email=$_SESSION['email_log'];
        }else{
            $this->Customer_email=$_SESSION['email_reg'];
        }
        //sessioni create nel processo di aggiornamento dati
        $this->indirizzo_spedizione=$_SESSION['indirizzo'];
        $this->citta=$_SESSION['citta'];        
        $q="INSERT INTO `orders`( `totale_ordine`,
    `stato`,  `Customer_id`, `indirizzo_spedizione`, 
    `citta`, `Customer_email`) 
    VALUES ('$this->totale_ordine','1',
 '$this->Customer_id','$this->indirizzo_spedizione',
 ' $this->citta','$this->Customer_email')";
        $this->esegui_query($dbConn, $q);
    }
   

    public function inserici_dettaglio_ordine($dbConn, $last_id, $sess_cart)
    {
        $this->id_ordine=$last_id;
        $this->product_id =
array_column($sess_cart, 'product_id');


        foreach ($this->product_id as $id) {
            $q = "SELECT * FROM `products` WHERE id='$id'";
            $this->esegui_query($dbConn, $q);
            $this->row = $this->smt->fetch(PDO::FETCH_ASSOC);
          
            $this->nome_prodotto=$this->row['name'];
            $this->quantita=$_SESSION['prodotto_' . $this->row['id']];
            $this->costo_prodotto=$this->row['price'];
            $q="INSERT INTO `dettaglio_ordine`( `ordine_id`, `prodotto_id`, 
            `nome_prodotto`, `quantità`, `costo_unitario`)             
            VALUES ('$this->id_ordine','$id',
            '$this->nome_prodotto','$this->quantita',
            '$this->costo_prodotto')";
            $this->esegui_query($dbConn, $q);
        }
    }
    
    public function ultimo_id($dbConn){
        $q="SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
        $this->esegui_query($dbConn, $q);
        $this->row = $this->smt->fetch(PDO::FETCH_ASSOC);
   
        $this->last_id  = $this->row['order_id'];
        return    $this->last_id ;
    }
    
    public function aggiorna_stato_ordine($dbConn, $last_id){
    $this->last=$last_id;
        $q="UPDATE orders SET stato='2' WHERE order_id='$last_id'";
        $this->esegui_query($dbConn, $q);
    }
    
  
    
}
