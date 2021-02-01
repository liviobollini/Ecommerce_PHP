<?php
if (isset($_SESSION['email']) and isset($_SESSION['invio'])) {
    if ($_SESSION["invio"]==0) {
        ?>
	    <p style="text-align: center;
	    font-size:15px;background-color:#cad2c6;">
	    Password inviata Guarda la tua email
	</p>
	<?php
    } else {?>
		<p style="text-align: center;
		font-size:15px;background-color:#cad2c6;">
		Utente inesistente controlla i dati
		</p>
	<?php
    }
}
unset ($_SESSION['invio']);
unset ($_SESSION['email']);
                                             
                                            
                                            ?>