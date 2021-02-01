
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
  <input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="livio.bollini@live.com">

<input type="hidden" name="amount" 
  value="<?php echo $_SESSION['Grantotale'];?>">
  <input type="hidden" name="email" 
  value="<?php echo $_SESSION['email_log']?>">  
  <input type="hidden" name="address1" 
  value="<?php echo $_SESSION['indirizzo']?>">
  <input type="hidden" name="city" 
  value="<?php echo $_SESSION['citta']?>"">
  <input type="hidden" name="country" 
  value="IT"">
  <input type="hidden" name="item_name" 
  value="Acquisto su Ecommerce"">
  <input type="hidden" name="return" 
  value="http://localhost:8888/ECOMM/grazie.php"> 
 <!-- // attivare solo se ONLINE E Dopo aver attivato IPN nell'acount -->
  <!-- <input type="hidden" name="notify_url" 
  value="<?php //echo 'https:www.ECOMM/grazie.php';?>" /> -->
<input type="hidden" name="currency_code" 
value="EUR">

<input type="hidden" name="hosted_button_id" value="6C8V39VQP7VZ4">
<input type="image" src="https://www.sandbox.paypal.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
<img alt="" border="0" src="https://www.sandbox.paypal.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>



