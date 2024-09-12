

$(document).ready(function (){

    var swiper = new Swiper(".mySwiper", {
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
