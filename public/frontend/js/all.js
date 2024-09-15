

$(document).ready(function (){

    var swiper = new Swiper(".homeslider", {
        autoplay: {
            delay: 2500, 
            disableOnInteraction: false, 
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});


// remove the class when screen size


$(document).ready(function() {
    function checkScreenSize() {
        if (window.matchMedia("(max-width: 991px)").matches) {
            $('.change_header ').removeClass('hs_navbar_part');
        } else  {
            $('.change_header').addClass('hs_navbar_part'); // Optional
        }
        
    }

    // Run on page load
    checkScreenSize();

    // Run when the window is resized
    $(window).resize(function() {
        checkScreenSize();
    });
});
