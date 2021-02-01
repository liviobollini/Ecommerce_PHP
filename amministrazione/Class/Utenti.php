<?php 
class Utenti {
    protected  function htmlUtenti(){
        ?>
    <tr class="text-center">
        <td><?php echo $this->row['email']?></td>
        <td>
            <?php $this->id_modifica=$this->row['id']; ?>
            <a href="cambiAmministratri.php#?id_modifica=
            <?php echo($this->id_modifica)?>">
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <?php $this->id_cancella=$this->row['id']; ?>
            <a href="cambiAmministratri.php?id_cancella=<?php echo($this->id_cancella)?>">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>        
        <?php
        }
        public function lista_Utenti($conn){
            $q="SELECT * FROM users";
            $this->result = $conn->query($q);
            while ($this->row = mysqli_fetch_array($this->result)) {
                $this->htmlUtenti();
            }
      
        }
}