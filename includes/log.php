<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container-fluid">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Sign In & Sign Up</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->

<div class="form jumbotron" style="font-size:20px;font-weight:bold;color:black;padding:20px">
    <?php $messaggio->messaggio(); ?>
</div>

<div class="w3l_banner_nav_right">

    <!-- login -->
    <div class="w3_login" style="padding:2em !important">
        <h3>Sign In & Sign Up</h3>

        <div class="w3_login_module">
            <div class="module form-module">
                <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                    <div class="tooltip">Registrati</div>
                </div>
                <div class="form">
                    <h2>Esegui Accesso</h2>
                    <form action="signup/log/index.php" method="POST" onsubmit="return checkForm_log(this);">
                        <input type="text" name="email_log" id="" placeholder="Inserisci email registrata">
                        <!-- <input type="password" name="psw_log" id="psw_log" placeholder="Password" required=" "> -->
                      
                        <input type="password" name="psw_log" id="psw_log" placeholder="Password">
                        <!-- accetta notifiche  -->
                        <div class="form-check">
               
                        <input type="checkbox" 
                        class="form-check-input notifiche"style="border: 1px solid black; width:40px;margin-right:30px"> 
                     <label class="form-check-label" 
                        for="exampleCheck1" class="notifiche">
                        Accetta notifiche</label>
                    </div>
                    <br>
                        <input type="submit" value="Login">
                    </form>
                    <br>
  
                </div>
                <div class="form" id=registrazione"">
                    <h2>Crea Account </h2>
                    <form action="signup/registrazione/index.php" method="POST" onsubmit="return checkForm_reg(this);">

                        <input type="text" id="email_reg" value="" placeholder="Email" name="email_reg">
                        <input type="password" id="psw_reg" value="" placeholder="password" name="psw_reg">
                        <input type="submit" value="Registrati">
                    </form>
                </div>

                <div class="cta">
                    <a href="recuperaPsw">
                        Password Dimenticata?
                    </a>
                </div>
            </div>
        </div>
        <script>
        $('.toggle').click(function() {
            // Switches the Icon
            $(this).children('i').toggleClass('fa-pencil');
            // Switches the forms  
            $('.form').animate({
                height: "toggle",
                'padding-top': 'toggle',
                'padding-bottom': 'toggle',
                opacity: "toggle"
            }, "slow");
        });
        </script>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->