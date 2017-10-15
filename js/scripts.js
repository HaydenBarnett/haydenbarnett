// @koala-prepend "jquery.js"
// @koala-prepend "zoom.js"

(function () {
    'use strict';

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

})();