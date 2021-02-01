<?php

//classe serve per connettersi al database
class DB {
    function connect($db)
    {
        try {
        $conn = new PDO ("mysql:host={$db['host']}; dbname=ecommerce1", $db['username'], $db['password']);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
        }
        catch (PDOException $exception){
        exit($exception->getMessage());
        }
    }

}
?>
