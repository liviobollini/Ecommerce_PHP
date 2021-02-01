<?php

$order_id=$_GET['order_id'];
include('files/dbConfig.php');

$q="SELECT * FROM dettaglio_ordine INNER JOIN products
ON dettaglio_ordine.prodotto_id = products.id  WHERE ordine_id='$order_id'";
$result = $db->query($q);
$data ='   <div class="container">
<h3 style="text-align:center"></h3>
<table class="table table-responsive table-stripped table-success">
    <thead>
        <tr>
            <th scope="col">Immagine</th>
    
            <th scope="col">Nome Prodotto</th>
            <th scope="col">Quantità</th>
            <th scope="col">Costo unitario</th>
        </tr>
    </thead>
    <tbody>';

while ($row = mysqli_fetch_array($result)) {
$data .='
    <tr>
    <td ><img src="../'. $row['image'].'" alt="" style="width:50px"></td>
    <td>'.$row['nome_prodotto'].'</td>
    <td>'.$row['quantità'].'</td>
    <td>'. $row['costo_unitario'].' €</td>
</tr>
';
}
$data .= '</tbody>
</table>';
echo $data;
?>