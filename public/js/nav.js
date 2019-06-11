$(document).ready(function() {
    $(".menu-icon").on("click", function() {
        $("nav ul").toggleClass("showing");
    });

    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(2000)
            .next()
            .fadeIn(2000)
            .end()
            .appendTo('#slideshow');
    },  5000);

});

// Scrolling Effect

$(window).on("scroll", function() {
    if($(window).scrollTop()) {
        $('nav').addClass('black');
    }

    else {
        $('nav').removeClass('black');
    }
});

