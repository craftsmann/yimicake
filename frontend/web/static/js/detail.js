;(function ($) {
    var obj_img     = $('.img-box img');
    var obj_li      = $('.s-bot ul li');
    var obj_stitle  = $('.shoptitle a');
    var obj_scontent= $('.sh-box .shop-con');

    var obj_subbtn   = $('.com-sub');
    var obj_form     = $('.com-form');


    obj_subbtn.on('click',function (e) {
        e.preventDefault();
        $.ajax({
            url:obj_form.attr('action'),
            data:obj_form.serialize(),
            success:function (data) {
                alert(data);
            },
            error:function () {
                alert('提交错误，请重新尝试');
            }
        });
    });

    //单个显示
    obj_stitle.each(function () {
        $(this).click(function () {
            var item = $(this).attr('data-item');
            console.log(obj_scontent);
            obj_scontent.eq(parseInt(item)).fadeIn('500').siblings().fadeOut('500');
            $(this).addClass('c-cur').siblings().removeClass('c-cur');
        });

    });

    //图片显示
    obj_li.each(function () {
        $(this).click(function () {
            $(this).addClass('s-cur').siblings().removeClass('s-cur');
            var obj_src  = $(this).find('img').attr('src');
            obj_img.attr('src',obj_src);

        });
    });
})(jQuery);
