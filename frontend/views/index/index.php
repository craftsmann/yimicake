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
            <div class="list-box">
                <div class="list_slide">
                    <ul class="list-img">
                        <?= $this->render('_recommend')?>
                    </ul>
                </div>
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
                <?=$this->render('_time')?>

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
                <a href="javascript:;">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <?= $this->render('_birth');?>
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
                <a href="javascript:;">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <?= $this->render('_love');?>
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
                <a href="javascript:;">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <?= $this->render('_old');?>
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
                <a href="javascript:;">
                    <img src="static/images/outer1.jpg">
                </a>
            </div>
        </div>
        <div class="right">
            <ul class="top-list">
                <?= $this->render('_flower');?>
            </ul>
        </div>
    </div>
</div>
<!--内容结束-->

