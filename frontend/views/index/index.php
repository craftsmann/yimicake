<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */

$js = '
   window.onscroll =function(){
        	ObjFade.init($(\'.sidebar\'));
        }
   window.onload = function(){   	
        	$(\'.banner\').SwitchPic(\'{"speed": 3000,"autoPlay": true}\');
        	SlidePic.init($(\'.list-box\'));
   }
';
$this->registerJs($js,\yii\web\View::POS_END);
$this->title = '伊米蛋糕屋';

?>

<!--================================轮播==================================-->
<div class="banner">
    <div class="banner-btn">
	    	<span class="btn-prev">
	    		<
	    	</span>
        <span class="btn-next">
	    		>
	    	</span>
    </div>
    <div class="banner-box">
        <?=$this->render('_banner')?>
    </div>
</div>
<!--顶部结束公用-->

<!--内容开始-->
<div class="content center">
    <!--==========================店铺推荐======================================-->
    <div class="recomend-floor clear">
        <div class="list fl">
            <div class="list-top">
                店长推荐
            </div>
            <div class="list-box" data-setting='{"speed":500,"chicktime":5000,"play":true}'>
                <div class="list_slide">
                    <ul class="list-img" style="left:-305px">
                        <li>
                            <a href="#">
                                <img src="static/images/recommend1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="static/images/recommend1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="static/images/recommend1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="static/images/recommend1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="static/images/recommend1.jpg">
                            </a>
                        </li>
                    </ul>

                    <div class="list-btn clear">
                            	<span class="list-prev fl">
                            		<
                            	</span>
                        <span class="list-next fr">
                            		>
                            	</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="humanservice fl">
            <div class="service-top">客服中心</div>
            <div class="service-bottom">
		 	  	   	    <span class="servicephone">
		 	  	   	        <b class="fl" style="color:#1AAC7B">二十四小时服务热线(免长途费)</b>
		 	  	   	        <b class="fl" style="color: #BD0C16">010-4521210-78921</b>
		 	  	   	    </span>
                <span class="serviceqq">
		 	  	   	    	<b class="fl" style="color:#1AAC7B">在线客服</b><br/>
		 	  	   	    	<b>
		 	  	   	    		<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1791502202&site=qq&menu=yes">
		 	  	   	    		<img src="static/images/qqchat.png" alt="qq交谈" title="qq交谈">
		 	  	   	    		</a>
		 	  	   	    	</b>
		 	  	   	    </span>
            </div>
        </div>
    </div>
    <!--==========================限时商品======================================-->
    <div class="time-floor">
        <div class="time-nav">
            <span>限时优惠</span>
        </div>
        <div class="time-box">
            <ul>
                <li>
                    <a href="#">
                        <img src="static/images/time1.jpg">
                        <div class="time-price">
                            <b>￥96.00</b>
                            <del>￥178.00</del>
                        </div>
                        <div class="time-words">
                            细细的爱  日给你温暖；月给你温馨；星给你浪漫；风给你清爽；雨给你滋润；雪给你完美；霜给你晶莹；我给你祝福
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/time1.jpg">
                        <div class="time-price">
                            <b>￥96.00</b>
                            <del>￥178.00</del>
                        </div>
                        <div class="time-words">
                            细细的爱  日给你温暖；月给你温馨；星给你浪漫；风给你清爽；雨给你滋润；雪给你完美；霜给你晶莹；我给你祝福
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/time1.jpg">
                        <div class="time-price">
                            <b>￥96.00</b>
                            <del>￥178.00</del>
                        </div>
                        <div class="time-words">
                            细细的爱  日给你温暖；月给你温馨；星给你浪漫；风给你清爽；雨给你滋润；雪给你完美；霜给你晶莹；我给你祝福
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/time1.jpg">
                        <div class="time-price">
                            <b>￥96.00</b>
                            <del>￥178.00</del>
                        </div>
                        <div class="time-words">
                            细细的爱  日给你温暖；月给你温馨；星给你浪漫；风给你清爽；雨给你滋润；雪给你完美；霜给你晶莹；我给你祝福
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/time1.jpg">
                        <div class="time-price">
                            <b>￥96.00</b>
                            <del>￥178.00</del>
                        </div>
                        <div class="time-words">
                            细细的爱  日给你温暖；月给你温馨；星给你浪漫；风给你清爽；雨给你滋润；雪给你完美；霜给你晶莹；我给你祝福
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/time1.jpg">
                        <div class="time-price">
                            <b>￥96.00</b>
                            <del>￥178.00</del>
                        </div>
                        <div class="time-words">
                            细细的爱  日给你温暖；月给你温馨；星给你浪漫；风给你清爽；雨给你滋润；雪给你完美；霜给你晶莹；我给你祝福
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--==========================生日蛋糕======================================-->
    <div class="floor birthcake clear">
        <div class="left">
            <div class="title clear">
                <span class="name fl">1F</span>
                <span class="detail fl">生日蛋糕</span>
            </div>
            <div class="outer">
                <a href="#">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
            <ul class="btm-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--==========================爱情蛋糕======================================-->
    <div class="floor lovecake clear">
        <div class="left">
            <div class="title clear">
                <span class="name fl">2F</span>
                <span class="detail fl">爱情蛋糕</span>
            </div>
            <div class="outer">
                <a href="#">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
            <ul class="btm-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--==========================祝寿蛋糕======================================-->
    <div class="floor wastcake clear">
        <div class="left">
            <div class="title clear">
                <span class="name fl">3F</span>
                <span class="detail fl">祝寿蛋糕</span>
            </div>
            <div class="outer">
                <a href="#">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
            <ul class="btm-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--==========================花朵推荐======================================-->
    <div class="floor flowers clear">
        <div class="left">
            <div class="title clear">
                <span class="name fl">4F</span>
                <span class="detail fl">鲜花</span>
            </div>
            <div class="outer">
                <a href="#">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
            <ul class="btm-list">
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="static/images/con1.jpg">
                        <div class="btm-item fl">
                            <span class="btm-name">蛋糕-细细的爱</span>
                            <span class="btm-price">￥456</span>
                        </div>
                        <div class="tag">立即购买</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--内容结束-->

