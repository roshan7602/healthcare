<?php
use yii\helpers\Url;
use yii\web\Request;
use frontend\models\Generalmodel;
$url=Url::base();
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

<div class="top-head">
    <div class="container">
        <div class="pull-left"><a href="ss"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/logo.jpg"></a>
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
                <li><img src="<?php echo Yii::$app->params['baseUrl'];?>images/msg-icon.png"></li>
                <li><i class="fa fa-bell"></i> </li>
                <li class="dropdown" id="toggle_profile"><a data-toggle="dropdown" href="#" class="dropdown-toggle"><img class="img-circle" src="<?php echo Yii::$app->params['baseUrl'];?>images/profile-icon.jpg"></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::$app->params['baseUrl'];?>index.php/doctor/home">My profile</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </li>
                <?php if(Yii::$app->user->getId()){ ?>
                <li role="presentation"><a href="<?php echo Yii::$app->params['baseUrl'];?>index.php/user/logout">Log out</a></li>
                <?php } else{ ?>
                <li role="presentation"><a href="<?php echo Yii::$app->params['baseUrl'];?>index.php/user/login">Login</a></li>
                <li role="presentation"><a href="<?php echo Yii::$app->params['baseUrl'];?>index.php/user/signup">Signup</a></li>
                <?php } ?>
            </ul>
         </div>
    </div>
</div>