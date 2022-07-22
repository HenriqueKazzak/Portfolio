var offset = $('#navegation').OffSet().top;
var $meuMenu = $('#navegation'); // guardar o elemento na memoria para melhorar performance
$(document).on('scroll', function () {
    if (offset <= $(window).scrollTop()) {
        $meuMenu.addClass('fixar');
    } else {
        $meuMenu.removeClass('fixar');
    }
});