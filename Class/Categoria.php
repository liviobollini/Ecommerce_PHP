<?php
class Categoria
{
    public function mostra_categoria($dbConn)
    {
        $q = $sql="SELECT * FROM `categories`" ;
        $this->smt = $dbConn->prepare($q);
        $this->smt->execute();
        while ($this->row = $this->smt->fetch(PDO::FETCH_ASSOC)) { ?>
           
            <li><a href="categoria.php?cat=<?php echo $this->row['id'];?>"><?php echo $this->row['name'];?></a></li>
                                
        
     <?php }
    }
}
?>