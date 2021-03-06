<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
    <div class="alert alert-success" style="display: none;">Thank you for register with us. Please verify your email.</div>

    <div class="row">
        <div class="col-lg-5">
            <div id="preloader" style="display: none;"><img src="../images/loader.gif"></div>
            <div id="form">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::Button('SUBMIT',array('class' => 'btn btn-primary', 'onclick'=>'send();')); ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


<script>

    function send()
    {

        var data=$("#form-signup").serialize();
        $("#preloader").show();
        $("#form").hide();
        $.ajax({
            type: 'POST',
            url: '<?php Yii::$app->urlManager->createAbsoluteUrl("user/signup"); ?>',
            data:data,
            success:function(data){
                $(".alert-success").show();
                $("#preloader").hide();
                $("#form").show();
            },

            //error: function(data) { // if error occured
            //alert("Error occured.please try again");
            // alert(data);
            // },

            dataType:'html'
        });
    $('#form-signup')[0].reset();
    }

</script>
