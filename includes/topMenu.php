<!-- header -->
<?php
if (isset($_POST['add'])) {
    $id= $_POST['product_id'];
    $add=$_POST['add'];
    $cart->store_productId_session($id, $add);
}
?>
 <div class="agileits_header">
		<div class="w3l_offers">
			<a href="#offerte">Offerte Speciali</a>
		</div>
		<div class="w3l_search">

			<form action="cerca.php" method="get">
				<input type="text"
				placeholder="Cerca un pordotto"
				value=""
			 required=""
				id="search" name="search"
				>
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">
			<form action="cart.php" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					<a href="cart.php">
					<input type="submit" name="submit"
					value="View your cart" class="button" />
				<?php
                    $cart->conta_prodotti_topmenu();
                    ?>
					</a>
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle"
					data-toggle="dropdown">
					<?php
					if (isset($_SESSION['email_log'])) {
						$stringa=$_SESSION['email_log'];
						$posizione=strpos($stringa,'@');
					 $nome=substr($stringa,0,$posizione);
					 ?>
					<p style="color:white;border:1px solid white;
					border-radius:20px;font-size:12px;
					padding:10px;margin-top:-10px;
					margin-left:-40px;">
					<?php echo $nome;?></p>
						<?php } else
						if (isset($_SESSION['email_reg'])) {
                        $stringa=$_SESSION['email_reg'];
                        $posizione=strpos($stringa, '@');
                        $nome=substr($stringa, 0, $posizione); ?>
						<p style="color:white;border:1px solid white;
						border-radius:20px;font-size:12px;
						padding:10px; margin-top:-10px;
						margin-left:-40px;">
						<?php echo $nome; ?></p>
						<?php
                    } else { ?>
								<i class="fa fa-user"
								aria-hidden="true"></i>
								<span class="caret"></span></a>
						<?php
                        } ?>
					<?php if (isset($_SESSION['email_log'])
					or isset($_SESSION['email_reg'])) {?>
						<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="datiUtente/profilo.php">Il tuo profilo</a></li> 
								<li><a href="datiUtente/ordiniUtente.php">I tuoi ordini</a></li>
								<li><a href="signup/esci.php">Esci</a></li>
							</ul>
						</div>
					</div>
					<?php } else {?>
						<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.php">
								Login/Sign Up</a></li>
							</ul>
						</div>
					</div>
					<?php } ?>
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="contatti.php">Contattaci</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });

	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Negozio</span>E shop</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">

					<li><a href="CART">Acquisti</a><i>/</i></li>
					<li><a href="ABOUT">About</a><i>/</i></li>
					<li><a href="OFFERTE">Prodotti in offerta</a><i>/</i></li>
					<li><a href="tuttiPRODOTTI">Tutti i prodotti</a></li>

				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true">
					</i>(+39) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true">
					</i><a href="mailto:info@liviobollini.it">
					scrivi a eshop
					</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
