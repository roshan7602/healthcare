<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="site-login">
        
<!--    <h1><?= Html::encode($this->title) ?></h1>-->
        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"textbox_local\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>
            <div class="form-group">
                
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'Placeholder'=>'Username','class'=>'form-control login-field'])->label(false) ?>
                
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['Placeholder'=>'Password'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"col-lg-offset-1\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
                ]) ?>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <div class="pull-left">
                        <?= Html::submitButton('Log in', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <div class="pull-right">
                        <?= Html::a('Forgot password?', ['class' => 'login-link','user/request-password-reset'], ['class' => 'forgot_password']) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                <p>If, you don’t have an account,
                 <?= Html::a('Sign up now!', ['class' => 'login-link','user/signup'], ['class' => 'forgot_password']) ?> 
                </div>
            </div>
            

            
            
        <?php ActiveForm::end(); ?>
</div>
            <div class="col-md-4 col-md-offset-3">
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['user/auth']
            ]) ?></div>
</div>

