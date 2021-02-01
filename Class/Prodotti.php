<?php
class Prodotti
{
    protected $oggi;
    protected $smt;
protected function htmlProdotti() { ?>

<div class="col-md-3 top_brand_left" style="min-height:500px; width:280px">
    <div class="hover14 column">
        <div class="agile_top_brand_left_grid" style="height:440px">
            <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
            <div class="agile_top_brand_left_grid1" style="height:419px">
                <figure>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb">
                            <a href="prodotto.php?id=<?php echo $this->row['id']?> ">
                                <h4><?php 
                                echo $this->row['name']?></h4>
                                <img title=" " alt=" " src="<?php 
                                echo $this->row['image']?>" style="width:200px;height:200px" />
                            </a>
                            <div class="snipcart-item block">
                                <div class="snipcart-thumb">
                                    <?php if ($this->row['discount']>0) { ?>
                                    <p><del style="font-size:12px;color:gray;">
                                            <?php echo "prezzo: " 
                                     .$this->row['price']." €"?>
                                        </del></p>
                                    <p style="margin-top:-15px">
                                        <b><?php
                                    echo "scontato a: " 
                                    .$this->row['discount']." €";
                                               ?>
                                        </b>
                                    </p>
                                    <?php  }else {?>
                                    <br>
                                    <?php echo "prezzo: " 
									.$this->row['price']." €"?>
                                </div>
                            </div>
                            <?php
                                        }?>
                            </p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="snipcart-details 
                        top_brand_home_details">
                            <form action="index.php" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="business" value=" " />
                                    <input type="hidden" name="item_name" value="<?php echo 
                                    $this->row['name'] ?>" />
                                    <input type="hidden" name="amount" value="<?php echo 
                                    $this->row['price'] ?>" />
                                    <input type="hidden" name="discount_amount" value="<?php echo 
                                    $this->row['discount']?>" />
                                    <input type="submit" name="submit" value="add" class="button" />
                                    <input type="hidden" name="product_id" value="<?php 
                                    echo $this->row['id'] ?>">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    </div>
</div>

<?php
}

    protected function esegui_query($dbConn, $q)
    {
        $this->smt = $dbConn->prepare($q);
        $this->smt->execute();
        return $this->smt;
    }
    public function mostra_prodotti_nuovi($dbConn)
    {
        $q ="SELECT * FROM `products`";
        $this->esegui_query($dbConn, $q);
        $this->oggi=time();
    
        while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) {
            $this->data_prodotto=$this->row['date'];
            $this->novita= 50*24*60*60;
            $this->time_stamp = strtotime($this->data_prodotto);
            if (($this->oggi - $this->time_stamp) < $this->novita) {
                $this->htmlProdotti();
            }
        } ?>
<!-- </div>  -->
<br>
<?php
    }
    
    public function mostra_prodotti($dbConn, $offset, $limit)
    {
        $q = ("SELECT * FROM products ORDER BY id DESC LIMIT $offset,$limit");
        $this->esegui_query($dbConn, $q);
        $this->rowCount= $this->smt->rowCount($this->smt);
        if ($this->rowCount > 0) {
            while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) {
                $this->htmlProdotti();
            }
        } ?>

<br>
<?php
    }

    public function mostra_prodotti_sconto($dbConn)
    {
        $q ="SELECT * FROM `products`";
        $this->esegui_query($dbConn, $q);
    
    
        while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) {
            if ($this->row['discount']>0) {
                $this->htmlProdotti();
            }
        } ?>
<!-- </div>  -->
<br>
<?php
    }

    
public function htmlprodotto_singolo(){
		?>
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">
                    Home</a><span>|</span></li>
            <li><?php echo $this->row['name']?></li>
        </ul>
    </div>
</div>
<div class="w3l_banner_nav_right">
    <div class="w3l_banner_nav_right_banner3">
        <h3></h3>
    </div>
    <div class="agileinfo_single">
        <!-- <h5 style="text-align:center"><
				?php echo $this->row['name']?></h5> -->
        <div class="col-md-4 agileinfo_single_left">

            <img style="width:450px;" title="<?php echo $this->row['name']?> " alt="<?php echo $this->row['name']?> "
                src="<?php echo $this->row['image']?>" class="img-responsive" id="example" />
        </div>
        <div class="col-md-8 agileinfo_single_right">

            <div class="w3agile_description">
                <h5><?php echo $this->row['name']?></h5>
                <h4>Descrizione :</h4>
                <p><?php echo "prezzo: " .$this->row['description'];?></p>
            </div>
            <div class="snipcart-item block">
                <div class="snipcart-thumb agileinfo_single_right_snipcart">

                    <?php if ($this->row['discount']>0) { ?>
                    <p style="margin-bottom:10px">
                        <del style="font-size:15px;color:gray">
                            <?php echo "prezzo: " .$this->row['price']." €"?>
                        </del>
                    </p>
                    <p style="margin-top:-5px"> <b><?php
												   echo "scontato a : " .$this->row['discount']." €";
												   ?>
                        </b>
                    </p>
                    <?php  } else {?>
                    <br>
                    <?php echo "prezzo: " .$this->row['price']." €"?>
                    <?php
											}?>
                </div>
                <div class="snipcart-details agileinfo_single_right_details">
                    <form action="#" method="post">
                        <fieldset>
                            <input type="hidden" name="cmd" value="_cart" />
                            <input type="hidden" name="add" value="1" />
                            
                            <input type="hidden" name="product_id" value="<?php 
                                    echo $this->row['id'] ?>">
                            <input type="submit" name="submit" value="Acquista" class="button" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<?php
		}   
    public function mostra_prodotto_singolo($dbConn){
       $id=$_GET['id'];
		$q = ("SELECT * FROM products WHERE id='$id'");
        $this->esegui_query($dbConn, $q);
        $this->rowCount= $this->smt->rowCount($this->smt);
        if ($this->rowCount > 0) {
            while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) {
				$this->htmlprodotto_singolo();
            }
        } ?>
<!-- </div>  -->
<br>
<?php
    }
 public function prodotti_categoria($dbConn){
	$id_cat=$_GET['cat'];
	$q = ("SELECT * FROM products INNER JOIN categories 
	WHERE category='$id_cat' AND categories.id=products.category");
	$this->esegui_query($dbConn, $q);
	$this->rowCount= $this->smt->rowCount($this->smt);
	if ($this->rowCount > 0) {

	$this->row = $this->smt->fetch(PDO::FETCH_ASSOC);
	?>
<div class="top-brands">
    <div class="container">
        <h3><?php echo $this->row['name']?></h3>
    </div>
</div>
<?php	   
		while ($this->row = 
		$this->smt->fetch(PDO::FETCH_ASSOC)) {
		    $this->htmlProdotti();
		}
	} ?>
<!-- </div>  -->
<br>
<?php
}   
}
?>