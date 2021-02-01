<?php

//https://getbootstrap.com/docs/5.0/components/navs-tabs/
   
 
     include('../config.php');
     ob_start();
     if (!isset($_SESSION['email_log']) AND !isset($_SESSION['email_reg'])) {
      header('location:../index.php');
     }
     $dbConn = $dbInstance->connect($db);
     include('Class/Users.php');
     include('header.php');
     
     $row =Users::mostra_dati($dbConn);
     if (isset($_POST['datiUtente'])) {
         Users::inserisci_dati($dbConn);
         $testo="Dati Aggiornati";
         $messaggio->crea_sessione_messaggio($testo);
         // header('location:profilo.php');
     }
     if (isset($_POST['cambia_password'])) {
         $num_row=Users::verifica_vecchia_password($dbConn);
         if ($num_row>0) {
             Users::	inserisci_nuova_password($dbConn);
             $testo="Password aggiornata";
             $messaggio->crea_sessione_messaggio($testo);
         } else {
             $testo="Password attuale  NON corrisponde";
             $messaggio->crea_sessione_messaggio($testo);
         }
     } ?>
<div class="body" >
<?php
if (isset($_SESSION['testo'])) {?>

<div class="container">
<div style="color:black;font-size:25px"  class="bg-light p-3">
<?php $messaggio->messaggio(); ?>     
</div>
</div>
<?php
} ?>

<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-2">
            <?php
                include('menu.php');
            ?>
        </div>
              <div class="col-md-8">
              <br>
<div class="container" >

    <div class="row">
      <br>

  
 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-size:23px;color:black" >PROFILO</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="font-size:23px;">MODIFICA  PASSWORD</a>
  </li>
 
</ul>       

     
  
     
  
      
      </div></div>
      <div class="container" style="margin-top:20px">

<div class="tab-content" id="myTabContent">
 
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container">
    <div class="row">
     
      <div class="col-lg-12 col-sm-12  col-md-12 " style="background-color: #e2e9ea;border-radius: 30px;padding:30px">   
     <form  method="post" action="#" >
   
     <div class="form-group row"> 
     <div class="col-lg-12 col-sm-12  col-md-12">
     <h4 >Dati personali</h4>
    
     </div>
     <div class="col-lg-6 col-sm-6  col-md-6">
     <label for="name" class="col-lg-4 col-sm-4  col-md-4 col-form-label">Nome</label>
    <div class="col-lg-10 col-sm-10  col-md-10">
     <?php   $nome=$row['nome']; ?>
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">
      
    </div>
    </div>
    <div class="col-lg-6 col-sm-6  col-md-6">
     <label for="surname" class="col-lg-4 col-sm-4  col-md-4 col-form-label">Cognome</label>
    <div class="col-lg-10 col-sm-10  col-md-10">
        <?php   $cognome=$row['cognome']; ?>
      <input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo $cognome ?>">
      
    </div>
    </div>
     </div>
    <div class="form-group row"> 
     <div class="col-lg-6 col-sm-6  col-md-6">
      <label for="phone" class="col-lg-4 col-sm-4  col-md-4 col-form-label">Indirizzo</label>
    <div class="col-lg-10 col-sm-10  col-md-10">
      <?php   $indirizzo=$row['indirizzo']; ?>
      <input type="text" class="form-control" id="indirizzo" name="indirizzo" value="<?php echo $indirizzo
        ?>">
      
    </div>
    </div>
    <div class="col-lg-6 col-sm-6  col-md-6">
     <label for="data" class="col-lg-4 col-sm-4  col-md-4 col-form-label">Città</label>
        
         <?php
      $citta=$row['citta']; ?>
    <div class="col-lg-10 col-sm-10  col-md-10">
      <input type="text" class="form-control" id="citta" name="citta" value="<?php echo  $citta
        ?>">
      
    </div>
    </div>
     </div>
     <div class="form-group row"> 
     <div class="col-lg-6 col-sm-6  col-md-6">
      <label for="indirizzo" class="col-lg-4 col-sm-4  col-md-4 col-form-label">Nazione</label>
      <?php   $nazione=$row['nazione']; ?>
    <div class="col-lg-10 col-sm-10  col-md-10">
      <input type="text" class="form-control" id="nazione" name="nazione" value="<?php echo $nazione
        ?>">
      
    </div>
    </div>
    <div class="col-lg-6 col-sm-6  col-md-6">

      
    </div>
    </div>

     <br>
    <div class="form-group row" > 
     <div class="col-lg-12 col-sm-12  col-md-12">
     <h4 >Email </h4>
     </div>
     
       </div>

     <div class="col-lg-6 col-sm-6  col-md-6">
  
    <div class="col-lg-10 col-sm-10  col-md-10">
       <?php   $email=$row['email']; ?>
      <input type="text" class="form-control" id="email" name="email" value="<?php echo $email
        ?>">
      
    </div>
    </div>
    <div class="col-lg-6 col-sm-6  col-md-6"> </div>
     
 
      <button type="submit" class="btn btn-success" 
      style="background-color:black;margin-top:30px" 
      name="datiUtente">Conferma</button>
 <br>

  </form>       
        </div>  
     </div>      
</div>    
</div>           
      
      
   <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
  <br>
  
    <div class="container" >
    <div class="row">
    <div class="media">
  
  <div class="media-body" >
   
   
   <div class="container" style=" margin-top:10px;">
   <div class="row">
   
   
     <div class="container">
    <div class="row">
     
      <div class="col-lg-12 col-sm-12  col-md-12 " style="background-color:#e2e9ea; border-radius: 10px;padding:30px">   
     <form id="contactForm" action="#" onsubmit="return dati_utente(this)" method="post">
   
     <div class="form-group row"> 
     <div class="col-lg-12 col-sm-12  col-md-12">
     <h4 >Modifica Password</h4>
     </div>
     <div class="col-lg-12 col-sm-12  col-md-12">
     <label for="inputPassword" class="col-lg-12 col-sm-12  col-md-12 col-form-label">Inserire Password Attuale</label>
    <div class="col-lg-12 col-sm-12  col-md-12">
      <input type="password" class="form-control" id="password_old" name="password_old" placeholder="Password Attuale">
      
    </div>
    </div>
    
     </div>
    <div class="form-group row"> 
     <div class="col-lg-6 col-sm-6  col-md-6">
      <label for="inputPassword" class="col-form-label" placeholder="Password">Nuova Password</label>
<!--    <div class="col-lg-12 col-sm-12  col-md-12">-->
      <input type="password" class="form-control" id="password_new" name="password_new" placeholder="nuova password">
      
<!--    </div>-->
    </div>
     <div class="col-lg-6 col-sm-6  col-md-6">
      <label for="inputPassword" class=" col-md-12 col-form-label" placeholder="Password">Conferma Password</label>
<!--    <div class="col-lg-12 col-sm-12  col-md-12">-->
      <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="conferma password">
  
       </div>
           
        </div>
        <br>
<!--        </div>-->
<input type="checkbox" class="form-check-input" onclick="confermaPsw()"> 
    <label class="form-check-label" for="exampleCheck1">Mostra Password</label> 
      
        <div class="form-group row" style="margin-top:10px">
        <div class="col-lg-6 col-sm-6  col-md-6">
       <button type="submit" class="btn-success  btn-rounded btn-block"  
       style="background-color:black" value="prenota" name="cambia_password">Conferma</button>

   
   </div>
    </div>
    
  </form></div>
</div></div>

    
    
     </div>
   </div>
  </div>
</div>

  </div></div>
  </div>
  </div>
</div> 
<!--      </div>-->
	</div>
	</div>   
	</div> 
      
<!-- footer-->
<?php
include('footer.php');

?>


            



