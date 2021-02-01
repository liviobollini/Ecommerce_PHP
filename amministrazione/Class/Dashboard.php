<?php
class Dashboard {
public function prodotti_ordinati($conn){
$q="SELECT dettaglio_ordine.nome_prodotto,count(*) as Totale,
count(case when orders.stato=2 then 1 else null end) as Confermato, 
count(case when orders.stato= 1 then 1 else null end)as Abbandonato 
FROM dettaglio_ordine 
INNER JOIN orders 
ON dettaglio_ordine.ordine_id=orders.order_id 
GROUP BY dettaglio_ordine.nome_prodotto
ORDER BY Confermato DESC
";
$this->result = $conn->query($q);
while ($this->row = mysqli_fetch_array($this->result)) {
?>
    <tr class="text-center">

      <td><?php echo $this->row["nome_prodotto"]?></td>
      <td><?php echo $this->row["Totale"]?></td>
      <td><?php echo $this->row["Confermato"]?></td>
      <td><?php echo $this->row["Abbandonato"]?></td>
    </tr>
<?php
}
}
public function numero_utenti($conn){
$q="SELECT * FROM `users`";
$this->result = $conn->query($q);
$this->rowcount=mysqli_num_rows($this->result); 
return $this->rowcount;

}
public function prodotti_fascia($conn){
  $q="SELECT 
   COUNT(price) AS Numero_Prodotti,
	(CASE 
		WHEN price< 7 THEN 'Bassa < 7 €'
		WHEN price>15 THEN 'Alta > 15 €'
		ELSE 'Media 7-15 €' END
         ) AS Fascia_prezzo
FROM
	products
GROUP BY
	(CASE 
		WHEN price<7 THEN 'Bassa < 7 €'
		WHEN price>15 THEN 'Alta > 15 €'
		ELSE 'Media 7-15 €' END
        )       
  ORDER BY numero_prodotti DESC
  ";
  $this->result = $conn->query($q);
  while ($this->row = mysqli_fetch_array($this->result)) {
    ?>   
        <tr class="text-center">    
          <td><?php echo $this->row["Numero_Prodotti"]?></td>
          <td><?php echo $this->row["Fascia_prezzo"]?></td>      
        </tr>    
    <?php
    }
  }
}