$(document).ready(function() {
    $('#modal').modal();
});

$('#modal').on('hidden.bs.modal', function () {	
    window.location.replace(redireccionModalUrl);
});

$(window).resize(function() {
    if ($(window).width() < 700) {
        $('#modal').modal('hide');
    }
});