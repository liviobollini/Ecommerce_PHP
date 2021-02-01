<?php
class Ordini
{
protected function htmlOrdini(){
?>
<tr class="text-center">
    <td ><?php echo $this->row['order_id']?></td>
    <?php
$this->old_date = $this->row['creato'];
        $this->middle = strtotime($this->old_date);
        $this->new_date = date('d-m-Y', $this->middle);
        ?>
    <td><?php echo    $this->new_date?></td>
    <td><?php echo $this->row['totale_ordine']." €"?></td>
    <?php
$this->stato=$this->row['stato'];
if($this->stato==2){
$this->stato = 'confermato';
}
else
{
    $this->stato="abbandonato";
}
?>
    <td><?php echo   $this->stato ?></td>
    <td><?php echo $this->row['indirizzo_spedizione']?></td>
    <td><?php echo $this->row['citta']?></td>
    <td><?php echo $this->row['Customer_email']?></td>
    <td>
        <?php  $this->order_id=$this->row['order_id']; ?>
        <i class="fas fa-info-circle vedi_dettaglio" data-bs-toggle="modal" id="<?php echo $this->order_id?>"></i>
    </td>
    <td>
        <a href="#">
            <i class="fas fa-edit"></i>
        </a>
    </td>
    <td>
        <a href="#">
            <i class="fas fa-trash-alt"></i>
        </a>
    </td>
</tr>
<?php
}
public function lista_Ordini($conn){
$sql="SELECT * FROM `orders`";
$this->result = $conn->query($sql);
while ($this->row = mysqli_fetch_array($this->result)) {
    $this-> htmlOrdini();
}
}
}