$(document).ready(function() {


    $('#ham-menu').click(function() {
        $(this).toggleClass('open');
        $('.nav-inventory').toggleClass('navOpen');
        $('body').toggleClass('scrolDisabled')
    });

    $(window).resize(function() {
        if ($(window).width() > 991) {
            $('#ham-menu').removeClass('open');
            $('.nav-inventory').removeClass('navOpen');
            $('body').removeClass('scrolDisabled')
        }
    });


    $('#btn-change').click(function() {
        $("#change-password").show();
    });



});