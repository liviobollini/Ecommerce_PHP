<?php 
Class Dati{
    protected $email_log;
    protected $psw_log;
    public function __construct($email,$psw){
        $this->email_log=$email;
        $this->psw_log=md5($psw);
    }
    public function getEmail(){
        return $this->email_log;
    }
    public function getPsw(){
        return $this->psw_log;
    }
}
?>