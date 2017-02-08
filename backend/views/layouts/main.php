<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$js ='
   $(".user-set").on("click",function(e){
      e.preventDefault();
      layer.open({
      type: 2,
      title: "用户基本信息",
      shadeClose: true,
      area: [\'600px\', \'640px\'], //宽高
      content:"'.Url::to(['user/set']).'"});  
   })';

$this->registerJS($js,\yii\web\View::POS_END);

?>
<?php $this->beginPage();?>

<!Doctype html>
<html lang="<?= Yii::$app->language ?>">

      <head>

          <meta charset="<?= Yii::$app->charset ?>">

          <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

          <meta name="description" content="伊米蛋糕管理后台">

          <title><?= Html::encode($this->title) ?></title>

          <?= Html::csrfMetaTags();?>

          <?= Html::encode($this->title);?>

          <?= $this->head();?>

      </head>

<?php $this->beginBody();?>

      <body class="sticky-header">
         <section>
             <!--=================================左侧公用====================================-->
             <div class="left-side sticky-left-side" tabindex="5000" style="overflow: hidden; outline: none;">

                 <!--logo and iconic logo start-->
                 <div class="logo">
                     <a href="index.html"><img src="static/images/logo.png" alt=""></a>
                 </div>

                 <div class="logo-icon text-center">
                     <a href="index.html"><img src="static/images/logo_icon.png" alt=""></a>
                 </div>
                 <!--logo and iconic logo end-->


                 <div class="left-side-inner">

                     <!-- visible to small devices only -->
                     <div class="visible-xs hidden-sm hidden-md hidden-lg">
                         <div class="media logged-user">
                             <img alt="" src="<?= isset(Yii::$app->user->identity->photo)?Yii::$app->user->identity->photo:'static/images/photos/user-avatar.png'?>" class="media-object">
                             <div class="media-body">
                                 <h4><a href="#"><?= isset(Yii::$app->user->identity->username)?Yii::$app->user->identity->username:''?></a></h4>
                             </div>
                         </div>

                         <h5 class="left-nav-title">账户信息</h5>
                         <ul class="nav nav-pills nav-stacked custom-nav">
                             <li><a href="<?=Url::to(['user/set'])?>"><i class="fa fa-cog"></i>用户设置</a></li>
                             <li><a href=""><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
                         </ul>
                     </div>

                     <!--sidebar nav start menu开始-->
                     <?= $this->render('_menu')?>
                     <!--sidebar nav menu结束 end-->

                 </div>
             </div>
             <!--=================================左侧公用结束====================================-->

             <!--=================================内容开始=======================================-->
             <div class="main-content">
                 <!--=================================头部开始=======================================-->

                 <div class="header-section">

                     <!--toggle button start-->
                     <a class="toggle-btn"><i class="fa fa-bars"></i></a>
                     <!--toggle button end-->

                     <!--search start-->

                     <!--search end-->

                     <!--notification menu start -->
                     <form class="searchform" action="index.html" method="post">
                         <input type="text" class="form-control" name="keyword" placeholder="Search here...">
                     </form><div class="menu-right">
                         <ul class="notification-menu">
                             <li>
                                 <a href="#" class="btn btn-default dropdown-toggle in-refresh" title="刷新页面">
                                     <i class="fa fa-refresh"></i>
                                 </a>
                             </li>
                             <li>
                                 <a href="#" class="btn btn-default dropdown-toggle in-clear" title="清除缓存">
                                     <i class="fa fa-trash-o"></i>
                                 </a>
                             </li>
                             <li>
                                 <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                                     <i class="fa fa-bell-o"></i>
                                     <span class="badge">4</span>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-head pull-right">
                                     <h5 class="title">Notifications</h5>
                                     <ul class="dropdown-list normal-list">
                                         <li class="new">
                                             <a href="">
                                                 <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                 <span class="name">Server #1 overloaded.  </span>
                                                 <em class="small">34 mins</em>
                                             </a>
                                         </li>
                                         <li class="new">
                                             <a href="">
                                                 <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                 <span class="name">Server #3 overloaded.  </span>
                                                 <em class="small">1 hrs</em>
                                             </a>
                                         </li>
                                         <li class="new">
                                             <a href="">
                                                 <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                 <span class="name">Server #5 overloaded.  </span>
                                                 <em class="small">4 hrs</em>
                                             </a>
                                         </li>
                                         <li class="new">
                                             <a href="">
                                                 <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                 <span class="name">Server #31 overloaded.  </span>
                                                 <em class="small">4 hrs</em>
                                             </a>
                                         </li>
                                         <li class="new"><a href="">See All Notifications</a></li>
                                     </ul>
                                 </div>
                             </li>
                             <li>
                                 <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                     <img src="<?= isset(Yii::$app->user->identity->photo)?'http://localhost/yimicake/frontend/web/'.Yii::$app->user->identity->photo:'static/images/photos/user-avatar.png'?>" alt="">
                                     <?= isset(Yii::$app->user->identity->username)?Yii::$app->user->identity->username:''?>

                                     <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                     <li><a href="<?=Url::to(['user/set'])?>" class="user-set"><i class="fa fa-cog"></i>用户设置</a></li>
                                     <li><a href="<?=Url::to(['site/logout'])?>"><i class="fa fa-sign-out"></i>退出</a></li>
                                 </ul>
                             </li>
                         </ul>
                     </div>
                     <!--notification menu end -->

                 </div>

                 <!--=================================头部结束=======================================-->

                 <?= $content?>

                 <!--=================================尾部开始=======================================-->

                 <footer class="sticky-footer">
                     2016 © 伊米蛋糕屋 powered by Yii
                 </footer>

                 <!--=================================尾部结束=======================================-->
             </div>
             <!--=================================内容结束=======================================-->
         </section>
      </body>
<?php $this->endBody();?>
</html>
<?php $this->endPage();?>