<div class="w3l_banner_nav_right">
	<!-- mail -->
	<div class="mail">
		<h3>Contattaci</h3>
		<div class="agileinfo_mail_grids">
			<div class="col-md-4 agileinfo_mail_grid_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i></li>
					<li>Indirizzo<span>Milano pizza Duomo</span>
					</li>
				</ul>
				<ul>
					<li><i class="fa fa-envelope" aria-hidden="true">
						</i></li>
					<li>email<span>
							<a href="mailto:shop@gmail.com">
								shop@gmail.com</a>
						</span></li>
				</ul>
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i></li>
					<li>Chiamaci<span>333.123.456</span></li>
				</ul>
			</div>
			<div class="col-md-8 agileinfo_mail_grid_right">
				<form role="form" id="contact-us" action="mail/mailer/mail_invio.php" method="post">
					<div class="col-md-6 wthree_contact_left_grid">
						<input type="text" name="nome" value="Nome*" onfocus="this.value = '';" onblur="if (this.value == '') 
							{this.value = 'Name*';}" required="" style="margin-bottom:10px">
						<input type="email" name="email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') 
							{this.value = 'Email*';}" required="" style="margin-bottom:30px">
						<br>
						<input type="text" name="oggetto" value="Oggetto*" onfocus="this.value = '';" onblur="if (this.value == '') 
							{this.value = 'Subject*';}" required="">
					</div>
					<div class="col-md-6 wthree_contact_left_grid">
						<textarea name="testo" onfocus="this.value = '';" onblur="if (this.value == '') 
							{this.value = 'Message...';}" required="">
							Messaggio..
							</textarea>
					</div>
					<div class="clearfix"> </div>

					<input type="submit" value="Submit" style="margin-bottom:30px">
					<input type="reset" value="Clear">
					<?php
	if(isset($_SESSION['email'])){				

    $email=$_SESSION['email'];
    if ($email==1) {?>

					<div class="form" style="font-size:20px;font-weight:bold;color:black;padding:20px;text-align:center">
						<?php

    $testo="Email inviata";
   $messaggio->crea_sessione_messaggio($testo);
 $messaggio->messaggio();
 unset($_SESSION['email']);

 ?>
					</div>
					<?php } else {?>
					<div class="form" style="font-size:20px;font-weight:bold;
		color:red;padding:20px;text-align:center">
						<?php
    $testo="Email NON inviata";
   $messaggio->crea_sessione_messaggio($testo);
 $messaggio->messaggio();
 unset($_SESSION['email']);
                    }
 ?>
					</div>


					<?php } ?>
				</form>
			</div>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
	<br>	
<!-- //mail -->
