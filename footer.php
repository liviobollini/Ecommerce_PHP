
<!-- newsletter -->
<?php

if(isset($_POST['email_news']) AND isset($_POST['iscriviti'])){
	$utente->iscrizione_newsletter($dbConn);
	
}
?>
<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>Iscriviti alla News letter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="email_news" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="Iscriviti" name="iscriviti">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
		<div class="container">
			<div class="col-md-3 w3_footer_grid">
				<h3>informazioni</h3>
				<ul class="w3_footer_grid_list">
			
					<li><a href="about.php">Chi siamo</a></li>
					<li><a href="#">Nuovi Prodotti</a></li>
					<li><a href="#">Offerte</a></li>
					<li><a href="shop.php">Tutti i Prodotti</a></li>
				
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>policy del sito</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="faqs.html">FAQ</a></li>
					<li><a href="privacy.html">privacy policy</a></li>
					<li><a href="privacy.html">Condizioni Acquisto</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>Categorie</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="categoria.php?cat=1">Vegetali</a></li>
					<li><a href="categoria.php?cat=2">Beveraggi</a></li>
					<li><a href="categoria.php?cat=3">Frutta</a></li>
					<li><a href="/categoria.php?cat=5">Aperitivi</a></li>
					<li><a href="categoria.php?cat=6">Dolci</a></li>
					<li><a href="ategoria.php?cat=8">Pane</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>Ultime notizie</h3>
				<ul class="w3_footer_grid_list1">
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam <a href="#">http://sd.ds/13jklf#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam <a href="#">http://fd.uf/56hfg#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4>100% pagamenti sicuri</h4>
						<img src="images/card.png" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>Resta connesso con noi</h5>
						<ul class="agileits_social_icons">
							<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="wthree_footer_copy">
				<p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- menu drop down -->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- icona di scrollinng  -->
	<script type="text/javascript">
	
		$(document).ready(function() {
		
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
		
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
			
	</script>
	<!-- controllo dei form -->
<script src="signup/js/controllo_log.js"></script>
<script src="signup/js/controllo_registrazione.js"></script>
	<!--toogle form in cart.php-->
<script src="js/toogle.js"></script>
<!-- chiamata ajax verifica password -->
 <script src="signup/js/confermaPassword.js"></script>
 
 <!-- --------------------------------------------------------------- -->
<!-- script aggiunti per ottenere un  tab nella pagina  pagamenti.php 
Sono necessari dopo avwer aggiunto la pagina pagamenti.php    questo punto sono nel 
footer del tema originale payment.html -->
<!-- easy-responsive-tabs     -->
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<!-- //easy-responsive-tabs --> 
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<!-- fine tag per pagamento.php -->
 <!-- --------------------------------------------------------------- -->
 <script src="script.js"></script>
</body>
</html>