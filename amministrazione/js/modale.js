$(document).ready(function() {

    $('.vedi_dettaglio').click(dettaglio);

    function dettaglio() {
        var order_id = $(this).attr("id");
        $.ajax({
            url: "dettaglio.php",
            data: { order_id: order_id },
            success: mostra
        });
    };

    function mostra(data) {
        $('#dettaglio_ordine').html(data);
        $('#modale').modal("show");
    };
});