<?php
include('registrazione/init.php');
unset ($_SESSION['email_reg']);
unset ($_SESSION['email_log']);
unset ($_SESSION['psw_log']);
unset ($_SESSION['psw_reg']);
unset ($_SESSION['id']);
unset ($_SESSION['citta']);
unset ($_SESSION['indirizzo']);

//la lascio solo in fase di sviluppo
session_destroy();
header('location:../index.php');
