<h3 style="text-align:center">Inserisci nuovo Prodotto</h3>
<form action="#" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome del Prodotto</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"
                    name="nome" required="">
</div>
</div>
<div class=" row">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="editor1" name="editor1" rows="3" required="">
  </textarea>
                    <script>
                    CKEDITOR.replace('editor1');
                    </script>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prezzo</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                          name="prezzo" required="">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                       
                        <label for="exampleFormControlInput1" class="form-label">Sconto</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            name="sconto" required="">
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                    <select name="categoria">
        <option value="1">Vegetali</option>
        <option value="2">Beveraggi</option>
        <option value="3">Frutta</option>
        <option value="5">Aperitivi</option>
        <option value="6">Dolci</option>
        <option value="8">Pane</option>
    </select>
                </div>
            </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" 
                        class="form-label">Inserisci immagine</label>
                       <input name="uploadfile" id="uploadfile" 
                        type="file" class="form-control form-control-sm"
                        aria-describedby="upload" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="Inserisci">Invia</button>
                    <div style="text-align:center; font-size:22px">
               
                </div>
       
                </div>
            </div>
</form>
