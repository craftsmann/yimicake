;(function ($) {
   $.fn.Choice=function (obj) {
       var self = this;
       this.list_item = $('.filter-con');
       this.target_item = $('.filter-con a');

       return this.each(function () {
           self.target_item.on('click',function () {

               //$(this).addClass("hover").siblings().removeClass("hover");
              //console.log($(this));
              //$(this).addClass('hover');
           });

       });
   }

})(jQuery);