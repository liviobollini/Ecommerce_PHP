<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="forgot">
                <h2>Password Dimenticata?</h2>
                <h4>Cambia la tua password in 3 steps</h4>
                <ol class="list-unstyled">
                    <li><span class="text-primary text-medium">1.
                        </span>Inserisci la tua email.
                    </li>
                    <li><span class="text-primary text-medium">2. </span>
                        Ti spediremo una password temporanea
                    </li>
                    <li>
                        <span class="text-primary text-medium">3. </span>
                        Cambia la tua password
                    </li>
                </ol>
            </div>
            <form action="#" method="post" id="form_psw" class="card mt-4">

                <div class="card-body">
                    <div class="form-group">
                        <label for="email-for-pass">
                            Inserisci la tua Email
                        </label>

                        <input type="email" class="validate form-control" id="email" name="email" required=""
                            placeholder="email  registrazione">
                    </div>

                </div>
                <div class="card-footer ">
                    <button class="btn  btn-success btn-block" 
                    type="submit" name="action" style="text-align:center">
                        Ottieni una password
                    </button>
                    <br>
                    <?php  include('messaggio.php') ?>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <a href="../login.php">
                        <button class="btn btn-danger 
                        btn-block" type="submit">
                            Torna a log In</button>
                    </a>
                    <br>

                    <br>
                </div>
                <div class="col-md-6">
                    <a href="../index.php">
                        <button class="btn 
                        btn-block btn-primary">
                            Torna alla Home page
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>