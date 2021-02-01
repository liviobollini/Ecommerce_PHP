<?php
include 'dbConfig.php';
 $query = $db->query("SELECT * FROM users");
if($query->num_rows > 0){
    $delimiter = ",";
     $filename ="utenti_" . date('Y-m-d') . ".csv";

    $f = fopen( 'csv/' . $filename, "w");

    $fields = array('id', 'email');
	
	//inserisce nel file csv array $fields
    fputcsv($f, $fields, $delimiter);
    while($row = $query->fetch_assoc()){
        $lineData = array($row['id'], $row['email']);
        fputcsv($f, $lineData, $delimiter);
    }
}
  header('location: ExportEseguito.php');
?>
