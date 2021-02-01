/*script usato per aumetare la quantita copiato da footer checkout.html(web)*/


$('.value-plus').on('click', function() {
    var divUpd = $(this).parent().find('.value'),

        newVal = parseInt(divUpd.text(), 10) + 1;

    divUpd.text(newVal);
    nroprodotti(newVal);



});

$('.value-minus').on('click', function() {
    var divUpd = $(this).parent().find('.value'),

        newVal = parseInt(divUpd.text(), 10) - 1;

    if (newVal >= 1) divUpd.text(newVal);
    nroprodotti(newVal);


});

/*script usato per passare la var newVal ad un o script php*/


// $("#incrementa1,#incrementa2").on("click", nroprodotti);

function nroprodotti(newVal) {

    var quantita = newVal;


    $.ajax({
        type: "GET",
        url: "http://localhost:8888/ECOMM/includes/ajax.php",
        data: "quantita=" + quantita,

        success: function($nuovoVal) {
            alert('hai cambiato la quantita')

        }
    });

}