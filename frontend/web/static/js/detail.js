;(function ($) {
    var obj_img     = $('.img-box img');
    var obj_li      = $('.s-bot ul li');
    var obj_stitle  = $('.shoptitle a');

    var obj_scontent= $('.sh-box .shop-con');

    obj_stitle.each(function () {
        $(this).click(function () {
            var item = $(this).attr('data-item');
            console.log(obj_scontent);
            obj_scontent.eq(parseInt(item)).fadeIn('500').siblings().fadeOut('500');
            $(this).addClass('c-cur').siblings().removeClass('c-cur');
        });

    });

    obj_li.each(function () {
        $(this).click(function () {
            $(this).addClass('s-cur').siblings().removeClass('s-cur');
            var obj_src  = $(this).find('img').attr('src');
            obj_img.attr('src',obj_src);

        });
    });
})(jQuery);
