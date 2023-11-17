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
    arrows: false,
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
$(".ourServices-sec01-wrapper .text-box-col .text-box").on({
    mouseenter: function () {
        var rightImgUrl = $(this).attr("right-img-url");
        console.log(rightImgUrl);
        $('#ourServices-sec01-right-img').attr('src', rightImgUrl);
    },
    mouseleave: function () {
        //stuff to do on mouse leave
    }
});

$('.clientReviews-sec01-slider').slick({
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    vertical: true,
    verticalSwiping: true,
    draggable: true,
    speed: 800,

});
$('.callUs-floating .cancel-btn').click(function () {
    $(this).parent('.callUs-floating').removeClass('show');
});
$(document).ready(function () {
    // for progress bar
    $('.skill_set_block .text_layer .skill_area .inner_row .right_side .skill_details .skill_item').each(function () {
        var progress_width = $(this).find('.skill_progrss_bar').attr('data-percent') + '%';
        $(this).find('.skill_progrss_bar').width(progress_width);
    })
    // tab block
    var already_selected = '#' + $('.tab_block_area ul.tabs li.active').attr('data-tab');
    $(already_selected).show();

    $('.tab_block_area ul.tabs li').click(function () {
        $('.tab_block_area ul.tabs li.active').removeClass('active');
        $(this).addClass('active');
        var tabsel = '#' + $(this).attr('data-tab');
        console.log(tabsel);
        $('.tab_block_area .tab_container .tab_content').hide();
        $(tabsel).show();
    })
})
