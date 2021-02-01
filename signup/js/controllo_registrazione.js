  function checkForm_reg(form)
  {
    if(form.email_reg.value == "") {
      alert("Errore: la email non puo' essere bianca!");
    
      return false;
    }

      re=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(!re.test(form.email_reg.value)) {
     alert("Error: la email deve essere scritta correttamente!");
 
      return false;
    }

    if(form.psw_reg.value != "" ) {
      if(form.psw_reg.value.length < 6) {
        alert("Error: la password deve contenere almeno sei caratteri!");
 
        return false;
      }

      re = /[0-9]/;
      if(!re.test(form.psw_reg.value)) {
        alert("Errore: la password deve contenere almeno un numero (0-9)!");

        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.psw_reg.value)) {
        alert("Errore: password deve contenere almeno una lettera!");
        form.psw_reg.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.psw_reg.value)) {
        alert("Errore: password deve contenere almeno una lettera maiuscola (A-Z)!");

        return false;
      }
    } else {
      alert("Errore: Controlla se hai inserito una password valida!");
   
      return false;
    }

     // checkbox
  var checkBox = document.getElementById("checkbox-form");
 // checkbox è checked?
  if (checkBox.checked !== true){
 alert("Errore: Devi accettare la privacy!");
      
    return false;  
  }
      
        alert("hai inserito una password valida: " + form.psw_reg.value);
    return true;
  }
