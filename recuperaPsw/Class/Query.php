<?php
namespace ECOMM\recuperaPsw\Query;
Class Query{
    public static $smt;
    public static $dbConn;
    public static $num_row;

    protected  static function esegui_query($dbConn, $q)
    {
    self::$smt =$dbConn->prepare($q);
    self::$smt->execute();
    return self::$smt;
    }
    public static function select($dbConn,$email){
        $q=
        "SELECT * FROM users  WHERE email='$email'" ;
        self::esegui_query($dbConn, $q);
       self:: $num_row =self::$smt->rowCount(self::$smt);
        return self::$num_row;
         
    }


    public static function update($dbConn,$encrypted_password,$email){
        $q ="UPDATE `users` 
        SET password=
        '$encrypted_password' WHERE email='$email'";
        self::esegui_query($dbConn, $q);
    }

}
