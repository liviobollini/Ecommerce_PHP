$(document).ready(function() {
    $("#mostra").click(function() {
        $("#registra").toggle();
    });
})

function mostraPassword() {
    var x = document.getElementById("psw_log");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}