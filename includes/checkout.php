<?php
if (isset($_GET['piu'])) {
    if (isset($_SESSION['prodotto_' . $_GET['piu']])) {
        $_SESSION['prodotto_' . $_GET['piu']] += 1;
        header('location:cart.php');
    } else {
        $_SESSION['prodotto_' . $_GET['piu']] = 1;
        header('location:cart.php');
    }
}
if (isset($_GET['meno'])) {
    if ($_SESSION['prodotto_' . $_GET['meno']]>1) {
        if (isset($_SESSION['prodotto_' . $_GET['meno']])) {
            $_SESSION['prodotto_' . $_GET['meno']] -= 1;
            header('location:cart.php');
        } else {
            $_SESSION['prodotto_' . $_GET['add']] = 1;
            header('location:cart.php');
        }
    }
}
// fine clicco -
if (isset($_GET['remove'])) {
    $id_remove = $_GET['remove'];
    $cart->remove_prodotto($id_remove);
}
?>
<div class="w3l_banner_nav_right">
<div class="form jumbotron" 
style="font-size:20px;font-weight:bold;color:black;padding:20px">
	<?php $messaggio->messaggio(); ?>
</div>
    <!-- about -->
    <div class="privacy about">
        <h3>Chec<span>kout</span></h3>

        <div class="checkout-right">
            <?php
            if (isset($_SESSION['cart'])) {
                ?>
                <h4>Il tuo carrello contiene:
                    <?php
                    $totale_prodotti = count($_SESSION['cart']);
                if ($totale_prodotti == 1) {
                    echo $totale_prodotti . " prodotto";
                } else {
                    echo $totale_prodotti . " prodotti";
                } ?>
                    </span></h4>
            <?php
            } else {
                ?>
                <h4>Il tuo carrello non contiene prodotti </h4>
            <?php
            }
            ?>
            <span>

                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Prodotto</th>
                            <th>Quantità</th>
                            <th>Nome Prodotto</th>

                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $sess_cart = $_SESSION['cart'];
                            $cart->mostra_prodotti_carrello($dbConn, $sess_cart);
                        }

                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="checkout-left">
        <div class="col-md-5 checkout-left-basket">
            <h4>Continue to basket</h4>
            <!-- <ul> -->

            <!-- <li>Product1 <i>-</i> <span>$15.00 </span></li>
                    <li>Product2 <i>-</i> <span>$25.00 </span></li>
                    <li>Product3 <i>-</i> <span>$29.00 </span></li>
                    <li>Total Service Charges <i>-</i> <span>$15.00</span></li>
                    <li>Total <i>-</i> <span>$84.00</span></li> -->
            <!-- </ul> -->
            <table class="table table-stripped">
                <tr>
                    <th>Prodotto</th>
                    <th>Prezzo</th>
                    <th>Quantita</th>
                    <th>Subtotale</th>               
                </tr>
                <tr>
                <?php
                if (isset($sess_cart)) {
                    $cart->calcolo_totale($dbConn, $sess_cart);
              
                }
                ?>
                </tr>
                <tr>
                <td>
                        <h6>Spedizione Free</h6>
                    </td>
                 </tr>
            </table>
        </div>
        <div class="col-md-7 address_form_agile" 
        style="padding-right: 10%;margin-bottom: 30px;">
        <?php
         
        if (!isset($_SESSION['id'])) {
            ?>
        <h4> <span><input type="checkbox" id="mostra" 
        style="border:2px black;margin-right:5px"></span> 
        Accedi al tuo Account</h4>
    
        <div  >
        <form action="signup/log/logUtente.php" method="POST" 
        onsubmit="return checkForm_log(this);" id="registra">     
            <div class="controls">
                <label class="control-label">Email</label>
                <input class="billing-address-name form-control" 
                type="text" id="email_log" 
                name="email_log" placeholder="inserisci tua email">
             </div>
            <div class="controls">
                <label class="control-label">Password</label>
                 <input class="billing-address-name form-control" 
                 type="password" id="psw_log" 
                 name="psw_log" placeholder="inserisci password">
            </div>
            <br>
            <div class="controls">
                <input type="checkbox" class="form-check-input"> 
                <label class="form-check-label" for="exampleCheck1">
                <a href="#"> Accetta Privacy</a>
                </label>
                            <br>
            </div>
            <br>
            <div id="mostra_ajax"> </div>
            <br>
            <div class="controls">
                <input type="checkbox" class="form-check-input" 
                onclick="mostraPassword()"> 
                <label class="form-check-label" for="exampleCheck1">
                Mostra Password</label>
                            <br>
            </div>
            <br>
                            <button  type="submit" class="btn btn-block btn-success" >
                          LogIn
                            </button>
            </form>  
        </div>
        <?php
        } ?>
            <br>
         
            <?php
        if (isset($_SESSION['id'])) {
            $utente->mostra_datiUtente($dbConn);
        }
            ?>
            <?php
            if (isset($_SESSION['citta'])) {
                if (isset($_SESSION['Grantotale'])) {?>
            <form action="pagamenti.php" method="post">
            <div class="checkout-right-basket">
             
                <button  type="submit" class="btn btn-block btn-success" name="pagamento">
                       Vai al Pagamento
                            </button>
                         
            </div>
            </form>
        
            <?php  }
            }  ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>