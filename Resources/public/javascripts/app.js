$(document).ready(function() {
    $('#navbar-left a.toggle-nav').click(function(e) {
        e.preventDefault();

        var open = $('body').hasClass('navbar-opened');

        if(open)
        {
            $('body').removeClass('navbar-opened').addClass('navbar-closed');

            $(this).find('span.glyphicon').removeClass('glyphicon-arrow-left').addClass('glyphicon-arrow-right');
        }
        else
        {
            $('body').removeClass('navbar-closed').addClass('navbar-opened');

            $(this).find('span.glyphicon').removeClass('glyphicon-arrow-right').addClass('glyphicon-arrow-left');
        }
    });
});