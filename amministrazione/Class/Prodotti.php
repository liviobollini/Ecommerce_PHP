<?php
class Prodotti extends Messaggi
{
    protected function htmlElencoProdotti()
    {
        ?>
<div style=" font-size:22px" class="jumbotron">
    <?php $this->messaggio() ?>
</div>
<tr class="text-center mt-5" style="font-size:14px">
    <td><img src="../<?php echo $this->row['image']?>" alt="" style="width:50px"></td>
    <td><?php echo $this->row['name']?></td>
    <td><?php echo $this->row['price']."€"?></td>
    <?php
  if ($this->row['discount']>0) {
      $this->sconto=$this->row['discount']."€";
  } else {
      $this->sconto="";
  } ?>
    <td><?php echo $this->sconto; ?></td>
    <?php
  $this->old_date = $this->row['date'];
        $this->middle = strtotime($this->old_date);
        $this->new_date = date('d-m-Y', $this->middle) 
  ?>
    <td><?php echo $this->new_date ?></td>
    <td><?php echo $this->row['categoria']?></td>
    <td>
        <?php $this->id_modifica=$this->row['id']; ?>
        <a href="modifiche.php?id_modifica=
        <?php echo($this->id_modifica)?>">
            <i class="fas fa-edit"></i>
        </a>
    </td>
    <td>
        <?php $this->id_cancella=$this->row['id']; ?>
        <a href="modifiche.php?id_cancella=<?php echo($this->id_cancella)?>">
            <i class="fas fa-trash-alt"></i>
        </a>
    </td>
</tr>



<?php
    }
    public function elenca_prodotti($conn, $offset, $limit)
    {
        $sql="SELECT
products.id, products.name,
products.description, products.price, products.discount, 
products.date ,products.image, categories.name as categoria 
FROM products INNER JOIN categories 
ON categories.id=products.category
ORDER BY products.date DESC LIMIT $offset,$limit";
        $this->result = $conn->query($sql);
        while ($this->row = mysqli_fetch_array($this->result)) {
            $this->htmlElencoProdotti();
        }
    }
    public function cancella_prodotto($conn)
    {
        $this->id= $_GET['id_cancella'];
        $q="DELETE FROM `products` WHERE `id`='$this->id'";
        $this->result = $conn->query($q);
    }
    public function htmlModifica_prodotto()
    {
        ?>
<form action="modifiche.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" 
                class="form-label">Nome del Prodotto</label>
                <input type="text" class="form-control" 
                id="exampleFormControlInput1"
                value="<?php echo $this->row['name']; ?>" name="nome">
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" 
                class="form-label">Descrizione</label>
                <textarea class="form-control" 
                id="editor1" name="editor1" rows="3">
             <?php echo $this->row['description']; ?>
            </textarea>
                <script>
                CKEDITOR.replace('editor1');
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" 
                    class="form-label">Prezzo</label>
                    <input type="text" class="form-control" 
                    id="exampleFormControlInput1"
                      value="<?php echo $this->row['price']; ?>" name="prezzo">
                </div>
            </div>
            <div class="col-sm">
                <div class="mb-3">
                    <input type="hidden" id="id" 
                    value="<?php echo $this->row['id']; ?>" name="id">
                    <label for="exampleFormControlInput1" 
                    class="form-label">Sconto</label>
                    <input type="text" class="form-control" 
                    id="exampleFormControlInput1"
                        value="<?php echo $this->row['discount']; ?>" name="sconto">

                </div>
            </div>
            <div class="col-sm">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" 
                    class="form-label">Data</label>
                    <input type="date" class="form-control" 
                    id="exampleFormControlInput1"
                        value="<?php echo $this->row['date']; ?>" name="data">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" 
                class="form-label">Categoria</label>
                <input type="text" class="form-control" 
                id="exampleFormControlInput1"
                    value="<?php echo $this->row['category']; ?>" name="categoria">
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" 
                    class="form-label">Riconferma o modifica immagine</label>
                    <?php
                        $this->img='../'.$this->row['image']; ?>
                    <p>Immagine attuale
                        <span>
                            <img src="<?php echo $this->img ?>" 
                            alt="" style="width:100px" name="immagine">
                        </span>
                    </p>
                    <h5>Modifica</h5>
                    <label for="descrizione">Inserisci foto</label>
                    <input name="uploadfile" 
                    id="uploadfile" type="file" 
                    class="form-control form-control-sm"
                        aria-describedby="upload">
                </div>
                <button type="submit" 
                class="btn btn-primary btn-block" 
                name="uploadfilesub">Invia</button>
            </div>
        </div>
</form>
</div>
<?php
    }
    public function mostra_singoloProdotto($conn)
    {
        $this->id= $_GET['id_modifica'];
        $q="SELECT * FROM products WHERE id='$this->id'";
        $this->result = $conn->query($q);
        $this->row = mysqli_fetch_array($this->result);
        $this->htmlModifica_prodotto();
    }
    public function modifica_prodotto($conn)
    {
        $this->id=$_POST['id'];
        $this->nome=$_POST['nome'];
        $this->descrizione=$_POST['editor1'];
        $this->prezzo=$_POST['prezzo'];
        $this->sconto = $_POST['sconto'];
        $this->categoria=$_POST['categoria'];
        if (!empty($_FILES['uploadfile']['name'])) {
            //da qui in poi le isctruzioni per il caricamento dell'immagine
            $this->filename=$_FILES['uploadfile']['name'];
            $this->filetmpname=$_FILES ['uploadfile']['tmp_name'];
            $this->folder= '../images/caricate/';
            $this->cartella='images/caricate/'.$this->filename;
            move_uploaded_file($this->filetmpname, $this->folder.$this->filename);
            $q="UPDATE `products` SET 
`name`='$this->nome',`description`='$this->descrizione',
`price`=' $this->prezzo',`discount`='$this->sconto',
`category`=' $this->categoria',`image`='$this->cartella'
WHERE id='$this->id'";
            $this->result = $conn->query($q);
            echo "<h1>Passo da agg immagine</h1>";
        } else {
            $q="UPDATE `products` SET 
  `name`='$this->nome',`description`='$this->descrizione',
  `price`=' $this->prezzo',`discount`='$this->sconto',
  `category`=' $this->categoria'
  WHERE id='$this->id'";
            $this->result = $conn->query($q);
        }
        header('location: prodotti.php');
    }
    public function inserisci_nuovo_prodotto($conn)
    {
      $this->nome=$_POST['nome'];
      $this->descrizione=$_POST['editor1'];
      $this->prezzo=$_POST['prezzo'];
      $this->sconto = $_POST['sconto'];
      $this->categoria=$_POST['categoria'];
      if (!empty($_FILES['uploadfile']['name'])) {
          //da qui in poi le isctruzioni per il caricamento dell'immagine
          $this->filename=$_FILES['uploadfile']['name'];
          $this->filetmpname=$_FILES ['uploadfile']['tmp_name'];
          $this->folder= '../images/caricate/';
          $this->cartella='images/caricate/'.$this->filename;
          move_uploaded_file($this->filetmpname, 
          $this->folder.$this->filename);
         
         $q="INSERT INTO `products`( `name`, `description`, 
         `price`, `discount`,  `category`, `image`)
         VALUES ('$this->nome','$this->descrizione',
         '$this->prezzo','$this->sconto',' $this->categoria',
         '$this->cartella')";
          $this->result = $conn->query($q);  
          $testo="Prodotto inserito";
          $this->crea_sessione_messaggio($testo);
      }        
   header('location: prodotti.php');    
    }
}