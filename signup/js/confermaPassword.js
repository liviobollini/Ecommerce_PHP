$("#psw_log,#email_log").on("keyup", verificata);

function verificata() {
    var psw_log = $("#psw_log").val();
    var email_log = $("#email_log").val();
    $.ajax({
        url: "signup/confermaPassword.php",

        data: {
            "psw_log": psw_log,
            "email_log": email_log
        },
        success: mostra
    });
}

function mostra(ritorno) {
    if (ritorno == "true") {
        $("#mostra_ajax").html(
            "<h6 class='ajax' >utente e password validi </h6>");
    }
    if (ritorno == "non true") {
        $("#mostra_ajax").html(
            "<h6 class='ajax'>utente e / o password NON validi  </h6>");
    }
}