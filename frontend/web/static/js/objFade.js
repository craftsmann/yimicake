/*
*配置data-personal
*实现自定义高度隐藏对象
*/
;(function($){
   var ObjFade = function(obj){
     var self = this;
     this.obj = obj;
     this.oTop = this.obj.offset().top;
     var defaults = {
     	 'oTop':$(window).height(),
     	 'speed':500,
     };
     this.defaults = $.extend(true,defaults,this.getSetting());

     
     this.hideObj();
   }
   ObjFade.prototype={

     hideObj : function(){
     	if(this.oTop<this.defaults.oTop){
     		this.obj.fadeOut(this.defaults.speed);
     	}else if(this.oTop>this.defaults.oTop){
     		this.obj.fadeIn(this.defaults.speed);
     	}
     	
     },
     getSetting:function(){
     	 var setting = this.obj.attr("data-personal");
			if(setting && setting!=""){
				return $.parseJSON(setting);
			}else{
				return {};
			};
     }
   }
   ObjFade.init = function(obj){

     var _this = this;

     return obj.each(function(){
     	new _this($(this));
     });
   }
   window.ObjFade = ObjFade;
})(jQuery)