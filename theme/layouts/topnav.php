 
 <?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>
<nav id="w1" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="w1-collapse" class="collapse navbar-collapse">
            <ul id="w2" class="navbar-nav navbar-left nav">
                <li><a href="<?php echo Yii::$app->params['ContentUrl']?>index.php/socialhealthnetwork/content">Health Zone</a></li>
                <li><a href="/advanced/frontend/web/index.php/site/sociohealthnetwork">Socio-Health Network</a></li>
                <li><a href="/advanced/frontend/web/index.php/site/bookappointment">Book an Appointment</a></li>
                <li><a href="/advanced/frontend/web/index.php/site/ordermedicines">Order Medicines</a></li>
                <li><a href="/advanced/frontend/web/index.php/site/healthtracker">Health Tracker</a></li>
                <li><a href="/advanced/frontend/web/index.php/site/homefacilities">Home facilities</a></li>
            </ul>
            <ul id="w3" class="navbar-nav navbar-right nav"></ul>
        </div>
    </div>
</nav>
<?php
//    NavBar::begin([
//  //      'brandLabel' => '<img src="../images/logo.jpg">',
////        'brandUrl' => Yii::$app->homeUrl,
////        'options' => [
////            'class' => 'navbar-inverse navbar-fixed-top',
////        ],
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-left'],
//        'items' => [
//            ['label' => 'Health Zone', 'url' => ['/sociohealthnetwork/healthopedia']],
//            ['label' => 'Socio-Health Network', 'url' => ['/site/sociohealthnetwork']],
//			['label' => 'Book an Appointment', 'url' => ['/site/bookappointment']],
//			['label' => 'Order Medicines', 'url' => ['/site/ordermedicines']],
//			['label' => 'Health Tracker', 'url' => ['/site/healthtracker']],
//			['label' => 'Home facilities', 'url' => ['/site/homefacilities']],
//
//        ],
//    ]);

// if (Yii::$app->user->isGuest) {
//     $menuItems[] = ['label' => 'Signup', 'url' => ['/user/signup']];
//     $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
// } else {
//     $menuItems[] = '<li>'
//         . Html::beginForm(['/site/logout'], 'post')
//         . Html::submitButton(
//             'Logout (' . Yii::$app->user->identity->username . ')',
//             ['class' => 'btn btn-link']
//         )
//         . Html::endForm()
//         . '</li>';
 //}
// echo Nav::widget([
//     'options' => ['class' => 'navbar-nav navbar-right'],
//    // 'items' => $menuItems,
// ]);
  //  NavBar::end();
    ?>