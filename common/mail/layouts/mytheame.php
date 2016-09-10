<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <?php $this->beginBody() ?>
    
    <div class="jumbotron">
  <h3>Dear <?= $username ?></h3>
  <p>Kindly click on link below to verify your email id: </p>
  <p><a class="btn btn-primary btn-lg" href="http://127.0.0.1/healthcare/frontend/web/index.php?verify=<?= $token ?>" role="button">Verify</a></p>
</div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
