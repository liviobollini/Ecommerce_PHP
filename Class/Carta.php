<?php
ob_start();
class Carta extends Prodotti
{
    protected function htmlCart()
    {
        ?>
        <tr class="rem1" id="prodotti_carrello">
            <td class="invert"><?php echo $this->row['id'] ?></td>
            <td class="invert-image">
                <a href="single.html">
                    <img src="<?php echo $this->row['image'] ?>" 
                    alt=" " class="img-responsive">
                </a>
            </td>
            <td class="invert">
                <div class="quantity">
                    <div class="quantity-select">
                        <a href="cart.php?meno=<?php echo $this->row['id'] ?>">
                            <div class="entry value-minus">&nbsp;</div>
                        </a>
     <div class="entry value"><span>
          <?php
            if (isset($_SESSION['prodotto_' . $this->row['id']])) {
                echo $_SESSION['prodotto_' . $this->row['id']];
            } else {
                $_SESSION['prodotto_' . $this->row['id']] = 1;
                echo  $_SESSION['prodotto_' . $this->row['id']];
            } ?>
     </span></div>

                        <?php $id = $this->row['id'];
        $this->id = $this->row['id']; ?>
                        <a href="cart.php?piu=<?php echo $this->id ?>">
                            <div class="entry value-plus active" 
                            href="cart.php?id=" <?php echo $this->row['id'] ?>">
                            &nbsp;</div>
                        </a>
                    </div>
                </div>
            </td>
            <td class="invert"><?php echo $this->row['name'] ?></td>

            <td class="invert"><?php echo $this->row['price'] ?></td>
            <td>
            <?php
            $totprezzo=  
            $this->row['price']* $_SESSION['prodotto_' . $this->row['id']];
        echo $totprezzo; ?>
            </td>
            <td class="invert">
                <div class="rem">
                    <a href="cart.php?remove=<?php echo $this->row['id'] ?>">
                        <div class="close1"> </div>
                    </a>
                </div>

            </td>
        </tr>
        <?php
    }

    public function store_productId_session($id, $add)
    {
        if (isset($add)) {
            if (isset($_SESSION['cart'])) {
                $this->item_array_id = array_column($_SESSION['cart'], "product_id");

                if (in_array($_POST['product_id'], $this->item_array_id)) {
                    echo "<script>alert('Il prodotto è già nella carta..!')
                    </script>";
                    echo "<script>window.location = 'index.php'
                    </script>";
                } else {
                    $this->count = count($_SESSION['cart']);
                    $this->item_array = array(
                        'product_id' => $_POST['product_id']
                    );

                    $_SESSION['cart'][$this->count] = 
                    $this->item_array;
                    return $_SESSION['cart'];
                }
            } else {
                $this->item_array = array(
                    'product_id' => $id
                );
                // Create new session variable
                $_SESSION['cart'][0] = $this->item_array;
                return $_SESSION['cart'];
            }
        }
    }
    public function conta_prodotti_topmenu()
    {
        if (isset($_SESSION['cart'])) {
            $this->count = count($_SESSION['cart']); ?>
            <span id="conta_prodotti">
            <?php echo $this->count; ?>
            </span>
        <?php
        } else {    ?>
            <span id="conta_prodotti">0</span>
        <?php
        }
    }
    public function mostra_prodotti_carrello($dbConn, $sess_cart)
    {
        $this->product_id = 
        array_column($sess_cart, 'product_id');
        $q = "SELECT * FROM `products`";
        $this->esegui_query($dbConn, $q);

        while ($this->row =
        $this->smt->fetch(PDO::FETCH_ASSOC)) {
            foreach ($this->product_id as $id) {
                if ($this->row['id'] == $id) {
                    $this->htmlCart();
                }
            }
        } ?>

        <br>
    <?php
    }
    public function remove_prodotto($id_remove)
    {
   
        foreach ($_SESSION['cart'] as $key => $value) {          
            if ($value["product_id"] == $id_remove) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Il prodotto è stato rimosso...!')
                </script>";
                echo "<script>window.location = 'cart.php'</script>";
               
            }
 
        }
    }
    
    
    protected function htmltotale_Carrello()
    {
        ?>
        <tr>
            <td><?php echo $this->row['name'] ?></td>
            <td><?php echo $this->row['price'] ?></td>
            <td><?php
            if (isset($_SESSION['prodotto_' . $this->row['id']])) {
                $qta= $_SESSION['prodotto_' . $this->row['id']];
                echo $qta;
            } else {
                $qta=1;
                echo $qta;
            } ?></td>
            <td>
                <?php
                 $this->totprezzo=
                 $this->row['price']*$_SESSION['prodotto_' . $this->row['id']];
        echo  $this->totprezzo; ?>
            </td>
        </tr>
    <?php
    }
    public function calcolo_totale($dbConn, $sess_cart)
    {
        $this->Grantotale=0;
        $this->product_id = array_column($sess_cart, 'product_id');
        $q = "SELECT * FROM `products`";
        $this->esegui_query($dbConn, $q);
        while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) {
            foreach ($this->product_id as $id) {
                if ($this->row['id'] == $id) {
                    $this->htmltotale_Carrello();
                    $this->Grantotale =  
                    $this->Grantotale += $this->totprezzo; ?>   
        <?php
                }
            }
        } ?>
  <tr>
        <td style="width: 100px!important;">Gran Totale</td>
       <td>
        <?php
          $_SESSION['Grantotale'] =  $this->Grantotale;
           echo $this->Grantotale . "€";

 ?>
        </td>      
        </tr>
        <br>
    <?php
    }
}
?>