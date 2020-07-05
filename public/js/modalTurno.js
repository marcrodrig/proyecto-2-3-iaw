$(document).ready(function() {
    $('body').css('overflow','hidden');
    $('#modal').modal();
});

$('#modal').on('hidden.bs.modal', function () {	
    window.location.replace(redireccionModalUrl);
});

$(window).resize(function() {
    if ($(window).width() < 1000) {
        $('#modal').modal('hide');
    }
});