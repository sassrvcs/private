var counted = 0;
$(window).scroll(function () {

    var oTop = $('.aboutUs-counter').offset().top - window.innerHeight;
    if (counted == 0 && $(window).scrollTop() > oTop) {
        $('.count').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                    countNum: countTo
                },

                {

                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
        });
        counted = 1;
    }

});


$('.blog-slider').slick({
    dots: false,
    speed: 300,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: '<div class="previous-btn"><span class="fa fa-angle-left"></span><span class="sr-only">Prev</span></div>',
    nextArrow: '<div class="next-btn"><span class="fa fa-angle-right"></span><span class="sr-only">Next</span></div>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            }
    },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
    },
  ]
});
const header = document.querySelector(".main-header");
const toggleClass = "sticky";

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    if (currentScroll > 150) {
        header.classList.add(toggleClass);
    } else {
        header.classList.remove(toggleClass);
    }
});
$('.main-header .menu-toggle').click(function () {
    $('body').toggleClass('overflow-hidden');
    $(this).toggleClass('active');
    $('.main-header .custom-navbar .cn-menu-lists').toggleClass('show');
});
$('.main-header .custom-navbar .cn-menu-lists-overlay').click(function () {
    $('body').removeClass('overflow-hidden');
    $('.main-header .menu-toggle').removeClass('active');
    $('.main-header .custom-navbar .cn-menu-lists').removeClass('show');
});
AOS.init();

$(".woo-account .navbar .menu-item").hover(function () {
    $(this).children('.dropdown-menu').addClass('show');
}, function () {
    $(this).children('.dropdown-menu').removeClass('show');
});
