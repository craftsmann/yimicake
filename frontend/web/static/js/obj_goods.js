/**
 * 加入购物车处理
 */
(function($){
    $.fn.Shop = function(){
        var _this   = this;
        this.url    = $(this).attr('href');
        this.obj_num = $('#s-num').val();
        this.obj_gid = $('#s-num').attr('index');
        this.obj_add = $('.s-add');
        this.obj_reduce = $('.s-reduce');
        this.default_num = 1;
        var reduceNum = function () {
            --_this.default_num;
            $('#s-num').val(_this.default_num);
        };

        var addNum   = function () {
            ++_this.default_num;
            $('#s-num').val(_this.default_num);
        };
        return this.each(function(){

            _this.obj_reduce.bind('click',function () {
                _this.default_num < 2 ? alert('商品数量不能小于1'):reduceNum();
            });

            _this.obj_add.bind('click',function () {
                _this.default_num > 14 ? alert('商品数量不能多于15'):addNum();
            });

            //ajax请求
            $(this).click(function (e) {
                e.preventDefault();
                $.ajax({
                    url:_this.url,
                    data:{num:_this.default_num,id:_this.obj_gid},
                    success:function (data) {
                        var goods_val = eval("("+data+")");
                        if(goods_val.status == 'success'){
                            alert(goods_val.message);
                            window.location.reload();
                        }
                    },
                    error:function () {
                        window.alert('请求错误,请重新尝试!');
                    }
                });
            })
        });
    }
})(jQuery);