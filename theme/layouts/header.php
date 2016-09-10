<?php
use yii\helpers\Url;
use yii\web\Request;
use frontend\models\Generalmodel;
$url=Url::base();
Yii::setAlias('theme', realpath(dirname(__FILE__).'/../../'));
//echo Yii::$app->request-> getMethod(); die;
 //echo Yii::$app->urlManagerFrontend->createUrl();die;die;
$obj_genral=new Generalmodel();
if(Yii::$app->user->getId()!=''){
    $userInfo=$obj_genral->userinfo(Yii::$app->user->getId());
}
//-----------------------------------------Code for activity Log--------------------------------------------------------
$remoteaddress=Yii::$app->request->getUserIP();
$path=$_SERVER['REQUEST_URI'];
$servername=Yii::$app->request->getHostInfo();
$serveraddress=$_SERVER['SERVER_ADDR'];
$serversoftware= $_SERVER['SERVER_SOFTWARE'];
$serverprotcol= $_SERVER['SERVER_PROTOCOL'];
$t=time();
$datetime=date("Y-m-d :H:m:s",$t);
$method=Yii::$app->request-> getMethod();
$obj_activityLog= new Generalmodel();
$obj_activityLog->activity_log($remoteaddress,$path,$serveraddress,$servername,$serversoftware,$serverprotcol,$datetime,$method);
?>
<!--<div class="top-head">
    <div class="container">

        <div class="pull-left"><a href="<?php echo Yii::getAlias('@web') ?>"><img src="../images/logo.jpg"></a>
            <div class="search-box"><span>Elevating your health</span> <span class="search"><i class="fa fa-search"></i> <input name="" value="" placeholder="Search"></span></div>
        </div>

        <div class="pull-right">
            <ul class="info-list-top">
                <li> <i class="fa fa-phone"></i> 01332-256489</li>
                <li>Mohit</li>
                <li><img src="../images/msg-icon.png"></li>
                <li><i class="fa fa-bell"></i> </li>
                <li><img class="img-circle" src="../images/profile-icon.jpg"></li>
            </ul>
        </div>

    </div>
</div>-->

<div class="top-head">
    <div class="container">
        <div class="pull-left"><a href="<?php echo Yii::$app->params['FrontendUrl'];//echo Yii::getAlias('@web'); ?>"><img src="<?php echo Yii::getAlias('@theme')."/theme/images/"; ?>logo.jpg"></a>
            <div class="search-box">
                <span>Elevating your health</span> 
                <span class="search"><i class="fa fa-search"></i> <input name="" value="" placeholder="Search"></span>
            </div>
        </div>
        <div class="pull-right">
            <ul class="info-list-top">
                <?php
                if(Yii::$app->user->getId()!=''){
                    if($userInfo[0]['info_status']!=0){
                        echo "<li><i class='fa fa-phone'></i>".$userInfo[0]['phone']."</li>";
                        echo "<li>".$userInfo[0]['fname']."</li>";
                    }
                  } ?>
                <li><img src="<?php echo Yii::$app->params['image_url'];?>msg-icon.png"></li>
                <li><i class="fa fa-bell"></i> </li>
                <li><img class="img-circle" src="<?php echo Yii::$app->params['image_url'];?>profile-icon.jpg"></li>
                <?php if(Yii::$app->user->getId()){ ?>
                <li role="presentation"><a href="<?php echo Yii::$app->params['FrontendUrl'];?>index.php/user/logout">Log out</a></li>
                <?php } else{ ?>
                <li role="presentation"><a href="<?php echo Yii::$app->params['FrontendUrl'];?>index.php/user/login">Login</a></li>
                <li role="presentation"><a href="<?php echo Yii::$app->params['FrontendUrl'];?>index.php/user/signup">Signup</a></li>
                <?php } ?>
            </ul>
         </div>
    </div>
</div>