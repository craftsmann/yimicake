/**
 * 购物车处理
 */
(function($){
    $.fn.Shop = function(){
        var _this   = this;
        this.url    = $(this).attr('href');
        this.obj_num = $('#s-num').val();
        this.obj_gid = $('#s-num').attr('index');
        return this.each(function(){
            $(this).click(function (e) {
                e.preventDefault();
                $.ajax({
                    url:_this.url,
                    data:{num:_this.obj_num,id:_this.obj_gid},
                    success:function (data) {
                        window.alert(data);
                    },
                    error:function () {
                        window.alert(请求错误);
                    }
                });
            })
        });
    }
})(jQuery);

/**
 * 购物车加减
 */
$(function () {
    var btn_add    = $('.s-add');
    var btn_reduce = $('.s-reduce');
    var btn_gval   = parseInt($('#s-num').val());
    btn_reduce.bind('click',function () {
       btn_gval < 2 ? alert('商品数量不能小于1'): $('#s-num').val(--btn_gval);
    });
    btn_add.bind('click',function () {
        btn_gval > 14 ? alert('商品数量不能多于15'): $('#s-num').val(++btn_gval);
    });
});