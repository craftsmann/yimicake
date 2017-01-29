/**
 * 自定义轮播插件
 * @param {speed}     播放速度
 * @param {chicktime} 切换时间
 * @param {play}      自动播放
 */
(function($){
   var SlidePic = function(poster){     
      var self = this;
      //定义开关
      this.animated = false;
      //保存对象     
      this.poster = poster;
      this.prevImg = poster.find('.list-prev');
      this.nextImg = poster.find('.list-next');
      this.obj = poster.find('ul');
      this.oLi = poster.find('ul li');
      this.oWidth = this.oLi.eq(0).innerWidth();

      //自定义配置
      var config = {speed:1000,chicktime:2000,play:true};
      //格式化配置
      var pretermit = typeof config == 'object' ? $.parseJSON(poster.attr('data-setting')):{};
      //配置继承
      this.config = $.extend(true, config, pretermit);      
       
     //console.log(this.config);
      
      this.config.play ? this.run():{};

      this.prevImg.click(function(){
        if(!self.animated){
          self.move(-self.oWidth,self.config.speed);
        }
      });     
      this.nextImg.click(function(){
        if(!self.animated){
          self.move(self.oWidth,self.config.speed);
        }
      });
      this.obj.hover(function() {
      //清除定时器
         window.clearInterval(self.keyer);
      }, function() {
         self.run();
      });      
   }
   SlidePic.prototype   = {
      
      move: function(oWidth,ospeed){    
         
         var _this      = this;
         var oLeft      = parseInt(this.obj.css('left'));
         _this.animated = true;

         this.obj.animate({'left':oLeft+oWidth},ospeed,function(){
          
          if(oLeft < (_this.oLi.length-2)*Math.abs(oWidth)){

            _this.obj.css({'left':-Math.abs(oWidth)});
          
          };
          if(oLeft > -Math.abs(oWidth)){

            _this.obj.css({'left':(_this.oLi.length-2)*Math.abs(oWidth)});
          
          };
          _this.animated=false;
        });
        
      },

      run:function(){
          var _this = this;
          _this.keyer = window.setInterval(function(){_this.nextImg.click()},_this.config.chicktime);
      }
   };
   //初始化多个对象
   SlidePic.init = function(poster){
      var self = this;
      return poster.each(function(){
       new self($(this));
      });
   }
   //暴露全局对象
   window['SlidePic'] = SlidePic;
})(jQuery);


//切换
(function($){
   $.fn.SwitchPic = function(options){      
       var _this = this,
            index= 0;
       var defaults = {"speed":500,"autoPlay":false};
       this.prev = $(this).find('.btn-prev');
       this.next = $(this).find('.btn-next');
       this.banpic = $(this).find('.banner-box a');
       //组合配置
       this.defaults = $.extend(true, defaults,options&&options!='' ? $.parseJSON(options):{});
       //层级处理
       var addIndex = function(){
       	   
       	   index > _this.banpic.length-1 ? index=0 : index++;
       }
       var reduceIndex = function(){
       	   index < 1 ? index = _this.banpic.length-1 : index--;
       }
       var showPic =function(){
       	   _this.banpic.eq(index-1).fadeIn('slow').siblings().fadeOut('slow');
       }
       var autoPlay = function(){
          _this.timer = window.setInterval(function(){_this.next.click()},_this.defaults.speed);
       }
       return this.each(function(){
         //左按钮点击
         _this.prev.click(function(event) {addIndex();showPic(); });

         //右按钮点击
         _this.next.click(function(event) {reduceIndex();showPic();});

        //判断配置是否开启自动播放
        if(_this.defaults.autoPlay == true){
           autoPlay();
           $(this).hover(function(){
           	 window.clearInterval(_this.timer);},function(){autoPlay();}); 
        }
       }); 
   }	
})(jQuery);


//返回顶部效果
(function(){
   $('.totop').on('click', function(event) {
        event.preventDefault();
        $('html,body').animate({scrollTop:0}, 500);
   });
})();