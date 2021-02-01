<?php
include('log/DB.php');

$psw_log1=trim($_GET["psw_log"]);
$psw_log2=htmlspecialchars($psw_log1);
$psw_log=md5($psw_log2);
$email_log=$_GET["email_log"];
include('db_connection.php');

$sql="SELECT * FROM users  
WHERE password=:password AND email=:email" ;
$s = $pdo->prepare($sql);
$s->bindValue(':password',$psw_log);
$s->bindValue(':email',$email_log);
$s->execute();
    $num_row = $s->rowCount($s);

    if ($num_row == 0) {
        $ritorno="non true";
        echo $ritorno;
    } else {
        $ritorno="true";
        echo $ritorno;
        
    }
