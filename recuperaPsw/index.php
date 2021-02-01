<?php
namespace ECOMM\recuperaPsw\Query; 
include('config.php');
$invio=0;
    if (isset($_POST["email"])) {
        $email=$_POST["email"];
       
        $_SESSION['email']=$email;
        $_SESSION["invio"]=1;
       include('generaPsw.php');
       $num_row = Query::select($dbConn,$email);   
        if ($num_row>0) {
            $pwd=generatePassword(8);
            $encrypted_password=md5($pwd);
            Query::update($dbConn,$encrypted_password,$email);
            $_SESSION["invio"]=0; 
            ?>
	<?php
                include("mailpsw.php");
        } else {
            $_SESSION["invio"]=1;
        }
    }
?>
			<?php
			
include('header.php');
include('form.php');
?>				
<br>
<?php include('footer.php')?>