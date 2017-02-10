(function ($) {
    $.fn.Showcar=function () {
        var _this = this;
        this.obj_clearall = $('.g_clearall');
        this.obj_clearone = $('.g_clearone');
        this.btn_add = $('.g_add');
        this.btn_reduce = $('.g_reduce');
        this.obj_price  = $('.g_price');
        this.obj_litsum = $('.g_littlesum');

        //公用ajax
        var data_ajax = function (obj) {
            $.ajax({
                url: $(obj).attr('data-link'),
                data: {id: $(obj).attr('data-id')},
                success: function (data) {
                    window.location.reload();
                   //console.log(data);
                },
                error: function (){
                    alert('操作出错,请重新尝试');
                }
            })
        };

        //总额
        var data_sum  = function () {
           var data = 0;
             _this.obj_litsum.each(function () {
                data += parseInt($(this).html());
            });
            return data;
        };

        return this.each(function () {
            //计算总金额
            _this.obj_price.html('￥'+data_sum());
            //add按钮点击ajax
            _this.btn_add.on('click', function () {
                data_ajax(this);
            });
            //reduce点击ajax
            _this.btn_reduce.on('click', function () {
                data_ajax(this);
            });
            //清除1个
            _this.obj_clearone.bind('click',function (e) {
                e.preventDefault();
                data_ajax(this);
            });
            //清除所有
            _this.obj_clearall.bind('click',function(e){
                e.preventDefault();
                data_ajax(this);
            });
        });

    }
})(jQuery);
