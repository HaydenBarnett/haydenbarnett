// @koala-prepend "jquery.js"
// @koala-prepend "zoom.js"
// @koala-prepend "smoothState.js"
// @koala-prepend "tilt.js"

function addBlacklistClass() {
    $( 'a' ).each( function() {
        if ( this.href.indexOf('/wp-admin/') !== -1 || 
             this.href.indexOf('/wp-login.php') !== -1 ) {
            $( this ).addClass( 'wp-link' );
        }
    });
}

(function () {
    'use strict';

    var $tilt = $('.js-tilt').tilt({
        glare: true,
        maxGlare: 0.2,
        maxTilt: 15,
        scale: 1.05,
        speed: 3000,
    });

    var $body = $('body');

    $body.on('click', function(e) {

        var y = e.clientY - 5 + window.scrollY,
            x = e.clientX - 5 + window.scrollX;
        
        $body.append('<span class="ripple" style="top:'+y+'px;left:'+x+'px;"></span>');
        $body.append('<span class="ripple ripple-white" style="top:'+y+'px;left:'+x+'px;"></span>');

        $('.ripple').on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(e) {
            $(this).remove();
        });

    });
 
    addBlacklistClass();
 
    var settings = { 
        anchors: 'a',
        blacklist: '.wp-link',
        onStart: {
            duration: 500,
            render: function ( $container ) {
                $('#content').addClass('fade-out');
            }
        },
        onAfter: function( $container ) {
            addBlacklistClass();
            $('#content').removeClass('fade-out');

            $tilt.each(function () {
                $(this).find('.js-tilt-glare').remove();
                $(this).css({'will-change': '', 'transform': ''});
                $(this).off('mousemove mouseenter mouseleave');
            });

            $tilt = $('.js-tilt').tilt({
                glare: true,
                maxGlare: 0.25,
                maxTilt: 15,
                scale: 1.05,
                speed: 3000,
            });
        }
    };
 
    $('#wrapper').smoothState( settings );

})();