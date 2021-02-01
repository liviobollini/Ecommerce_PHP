function confermaPsw() {
    var x = document.getElementById("password_old");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    var y = document.getElementById("password_new");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
    var z = document.getElementById("password_confirm");
    if (z.type === "password") {
        z.type = "text";
    } else {
        z.type = "password";
    }

}

function dati_utente(form) {

    if (form.password_old.value == "") {
        alert("Errore: devi inserire la password esitente!");

        return false;
    }

    if (form.password_new.value != "") {
        if (form.password_new.value.length < 6) {
            alert("Error: la password deve contenere almeno sei caratteri!");

            return false;
        }
        re = /[a-z]/;
        if (!re.test(form.password_new.value)) {
            alert("Errore: password deve contenere almeno una lettera minuscola!");

            return false;
        }
        re = /[A-Z]/;
        if (!re.test(form.password_new.value)) {
            alert("Errore: password deve contenere almeno una lettera maiuscola (A-Z)!");

            return false;
        }
    } else {
        alert("Errore: Controlla se hai inserito una password valida!");

        return false;
    }

    var psw1 = form.password_new.value;
    var psw2 = form.password_confirm.value;

    if (psw1 != psw2) {
        alert("Errore: Le due Password devono coincidere!!");
        return false;
    }


    alert("hai inserito una password valida: " + form.password_new.value);
    return true;
    alert("hai inserito tutti i dati");
    return true;

}