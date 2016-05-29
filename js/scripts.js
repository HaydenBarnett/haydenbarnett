(function ($) {
	"use strict"

    // Toggle mobile menu

	$(".hamburger").click(function () {
        toggleMenu();
        return false;
    });

    $('#overlay').click(function() {
        toggleMenu();
        return false;
    })

    function toggleMenu() {
        $('#overlay').toggleClass('active');
        $(".hamburger").toggleClass("active");
        $('body').toggleClass('body-slide-left');
    }

    $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });


}(jQuery));