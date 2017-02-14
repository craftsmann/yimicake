<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
$this->title = '首页';
$msg = '未获取';
$js = '
 $(function(){
 //console.log(decodeURIComponent(location.href));
 //console.log($("sub-menu-list").find(a));
  // $("sub-menu-list").find(a).each(function(){
  //       alert($(this));
  // });
   

});
';
$this->registerJS($js);

$order = \common\models\Order::find()->count();
$user  = \common\models\User::find()->count();
$goods = \common\models\Goods::find()->count();
$comments = \common\models\Comments::find()->count();


?>

<div>
    <div class="page-heading">
        <h4>仪表盘</h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active"> 仪表盘 </li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <!--statistics start-->
                <div class="row state-overview pull-left" style="width: 515px;">
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="panel purple">
                            <div class="symbol">
                                <i class="fa fa-gavel"></i>
                            </div>
                            <div class="state-value">
                                <div class="value"><?=$order?></div>
                                <div class="title">总订单</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="panel red">
                            <div class="symbol">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="state-value">
                                <div class="value"><?=$user?></div>
                                <div class="title">总会员数</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row state-overview pull-left" style="width: 543px;margin-left: 10px">
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="panel blue">
                            <div class="symbol">
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="state-value">
                                <div class="value"><?=$comments?></div>
                                <div class="title">总共评论</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="panel green">
                            <div class="symbol">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="state-value">
                                <div class="value"><?=$goods?>件</div>
                                <div class="title">全部产品</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--statistics end-->
            </div>

        </div>
        <div class="page-container">

            <p>登录地点：<?= Yii::$app->request->userIP?> &nbsp;&nbsp;&nbsp;&nbsp;现在时间：<?= date('Y-m-d H:i:s')?> </p>

            <table class="table table-border table-bordered table-bg mt-20">
                <thead>
                <tr>
                    <th colspan="2" scope="col">服务器信息</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="50%">服务器计算机名</td>
                    <td><span id="lbServerName"><?=empty($_SERVER['REMOTE_ADDR']) ?$msg:gethostbyaddr($_SERVER['REMOTE_ADDR']);?></span></td>
                </tr>
                <tr>
                    <td>服务器IP地址</td>
                    <td><?= empty($_SERVER['SERVER_NAME'])?$msg:gethostbyname($_SERVER['SERVER_NAME'])?></td>
                </tr>
                <tr>
                    <td>服务器域名</td>
                    <td><?= !empty($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:$msg?></td>
                </tr>
                <tr>
                    <td>服务器端口 </td>
                    <td><?= !empty($_SERVER['SERVER_PORT'])?$_SERVER['SERVER_PORT']:$msg?></td>
                </tr>
                <tr>
                    <td>本文件所在文件夹 </td>
                    <td><?=dirname(__FILE__)?></td>
                </tr>
                <tr>
                    <td>服务器操作系统 </td>
                    <td><?=php_uname()?></td>
                </tr>
                <tr>
                    <td>系统所在文件夹 </td>
                    <td><?= !empty($_SERVER['DOCUMENT_ROOT'])?$_SERVER['DOCUMENT_ROOT']:$msg?></td>
                </tr>
                <tr>
                    <td>服务器的语言种类 </td>
                    <td><?=isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])?$_SERVER['HTTP_ACCEPT_LANGUAGE']:$msg?></td>
                </tr>
                <tr>
                    <td>服务器当前时间 </td>
                    <td><?=date('Y-m-d H:i:s',time())?></td>
                </tr>
                <tr>
                    <td>服务器解译引擎</td>
                    <td><?=!empty($_SERVER['SERVER_SOFTWARE'])?$_SERVER['SERVER_SOFTWARE']:$msg?></td>
                </tr>
                <tr>
                    <td>CPU 总数 </td>
                    <td><?=!empty($_SERVER['PROCESSOR_IDENTIFIER'])?$_SERVER['PROCESSOR_IDENTIFIER']:$msg?></td>
                </tr>
                <tr>
                    <td>当前SessionID </td>
                    <td><?=session_id()?></td>
                </tr>
                <tr>
                    <td>当前进程用户名</td>
                    <td><?= Get_Current_User()?></td>
                </tr>
                <tr>
                    <th colspan="2" scope="col">脚本信息</th>
                </tr>
                <tr>
                    <td>yii framework版本</td>
                    <td><?=Yii::getVersion()?></td>
                </tr>
                <tr>
                    <td>Php版本</td>
                    <td><?=PHP_VERSION?></td>
                </tr>
                <tr>
                    <td>Apache版本</td>
                    <td><?=apache_get_version();?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
