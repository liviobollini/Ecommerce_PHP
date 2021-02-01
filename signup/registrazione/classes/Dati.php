<?php
Class Dati{
    protected $email_reg;
    protected $psw_log;

    public function __construct($email,$psw){
        $this->email_reg=$email;
        $this->psw_reg=md5($psw);
    }

    public function getEmail(){
        return $this->email_reg;
    }
    public function getPsw(){
        return $this->psw_reg;
    }

}
?>
