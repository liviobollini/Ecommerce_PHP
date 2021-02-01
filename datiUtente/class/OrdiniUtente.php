<?php
class OrdiniUtente extends Users{
    public static $old_date;
     public static $middle;
     public static $new_date;
     public static $stato;
     public static $order_id;
     
    public static function mostra_ordini($dbConn, $Customer_email){
        $q= "SELECT * FROM orders WHERE   Customer_email='$Customer_email'" ;
        self::esegui_query($dbConn, $q);
        
        self:: $num_row =self::$smt->rowCount(self::$smt);
      
        if (self::$num_row >0) {
            while (self::$row =self::$smt->fetch(PDO::FETCH_ASSOC)) {
              self::htmlOrdini();
            }
        } else {
            echo 'non riconosciuto';
        }
    }
    protected static function htmlOrdini(){
        ?>
        <tr class="text-center">
            <td ><?php echo self::$row['order_id']?></td>
            <?php
        self::$old_date = self::$row['creato'];
        self::$middle = strtotime( self::$old_date);
        self::$new_date = date('d-m-Y', self::$middle);
                ?>
            <td><?php echo   self::$new_date?></td>
            <td><?php echo self::$row['totale_ordine']." €"?></td>
            <?php
       self::$stato=self::$row['stato'];
        if(self::$stato==2){
            self::$stato = 'confermato';
        }
        else
        {
            self::$stato="abbandonato";
        }
        ?>
            <td><?php echo   self::$stato ?></td>
            <td><?php echo self::$row['indirizzo_spedizione']?></td>
            <td><?php echo self::$row['citta']?></td>
            <td><?php echo self::$row['Customer_email']?></td>
            <td>
                <?php  self::$order_id=self::$row['order_id']; ?>
                <i class="fas fa-info-circle vedi_dettaglio" data-bs-toggle="modal" id="<?php echo self::$order_id?>"></i>
            </td>
            
        
            <td>
                <a href="#">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php
        } 

}
