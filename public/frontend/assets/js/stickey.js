$(window).on('scroll', function () {
    var sticky = $('.main-header'),
        scroll = $(window).scrollTop();
    if (scroll >= 180) sticky.addClass('sticky');
    else sticky.removeClass('sticky');

});
