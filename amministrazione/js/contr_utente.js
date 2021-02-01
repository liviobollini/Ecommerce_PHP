function mostraPsw() {
    var x = document.getElementById("psw_utente");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    var x = document.getElementById("psw_utente_conferma");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

}

function mostraPswlog() {
    var x = document.getElementById("psw_log");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function checkForm_utente(form) {
    if (form.email_utente.value == "") {
        alert("Errore: la email non puo' essere bianca!");
        return false;
    }

    re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!re.test(form.email_utente.value)) {
        alert("Error: la email deve essere scritta correttamente!");
        return false;
    }

    if (form.psw_utente.value != "") {
        if (form.psw_utente.value.length < 6) {
            alert("Error: la password deve contenere almeno 6 caratteri!");
            //form.psw_log.focus();
            return false;
        }

        re = /[0-9]/;
        if (!re.test(form.psw_utente.value)) {
            alert("Errore: la password deve contenere almeno un numero (0-9)!");

            return false;
        }
        re = /[a-z]/;
        if (!re.test(form.psw_utente.value)) {
            alert("Errore: password deve contenere almeno un numero!");
            return false;
        }
        re = /[A-Z]/;
        if (!re.test(form.psw_utente.value)) {
            alert("Errore: password deve contenere almeno una lettera maiuscola (A-Z)!");
            return false;
        }

    } else {
        alert("Errore: Controlla se hai inserito una password valida!");
        return false;
    }
    var psw1 = form.psw_utente.value;
    var psw2 = form.psw_utente_conferma.value;

    if (psw1 != psw2) {
        alert("Errore: Le due Password devono coincidere!!");
        return false;
    }

    alert("hai inserito una password valida: " + form.psw_utente.value);
    return true;
}