<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
//print_r($docinfo);die;
?>

<div class="tasb-row">
   <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="user">
            <div class="site-signup">
                <center>
                    <span class="page-icon"><i class="fa fa-user"></i></span>
                    <h5>Create your profile</h5>
                </center>
                <div class="row">
                      <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
                        <div class="col-lg-4">
                            <div class="arrow-text"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/arrow.jpg">
                                <h4 class="text">Choose your Speciality</h4>
                            </div>
                            <?php $dataspecilist=ArrayHelper::map(\frontend\models\SpecialistModel::find()->where(['status' =>'1'])->orderBy('name')->asArray()->all(), 'id', 'name');
                            echo $form->field($model, 'id')->dropDownList($dataspecilist, 
                                ['multiple'=>'multiple'])->label(''); 
                            ?>
                            <div class="add-plus">Add more specialities <i class="fa fa-plus"></i> </div></li>
                        </div>
                        <div class="col-lg-4">
                            <div class="arrow-text"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/arrow.jpg">
                                <h4 class="text">Enter your general information</h4>
                            </div>
                            <?= $form->field($docinfo,'email')->label('')->textInput(['placeholder' => "Email Address"]) ?>
                            <?= $form->field($docinfo,'phone')->label('')->textInput(['placeholder' => "Phone"]) ?>
                            <?= $form->field($docinfo,'MRnumber')->label('')->textInput(['placeholder' => "Medical Registration number"]) ?>
                            <?= $form->field($docinfo, 'sex')->dropDownList(['M' => 'M', 'F' => 'F'])->label('') ?>
                            <?= $form->field($docinfo, 'address')->textArea(['rows' => '6'])->label('') ?>
                            <?= $form->field($docinfo,'landmark')->label('')->textInput(['placeholder' => "landmark"]) ?>
                            <ul>
                                
                                <li><i class="fa fa-phone"></i> <input placeholder="Mobile number" name="" type="text" /></li>
                                <li><i class="fa fa-file"></i> <input placeholder="Medical Registration number" name="" type="text" /></li>    
                                <li class="select-li"><i style=" margin-left: 15px; margin-top: 9px;" class="fa fa-user"></i>
                                    <select class="form-control " id="gender">
                                      <option>Gender</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                    </select>
                                </li>
                                <li><i class="fa fa-map-marker"></i><input placeholder="Address" name="" type="text" /></li>
                                <li><i class="fa fa-chevron-circle-right"></i> <input placeholder="Landmark" name="" type="text" /></li>  
                                <li><i class="fa fa-chevron-circle-right"></i><input placeholder="City" name="" type="text" /></li>  
                                <li><i class="fa fa-chevron-circle-right"></i> <input placeholder="Nationality" name="" type="text" /></li>   
                            </ul>
                        </div>
                        <div class="col-lg-4">
                        <div class="arrow-text"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/arrow.jpg">
                            <h4 class="text">Medical Information</h4>
                        </div>
                        <ul>
                            <li><i class="fa"></i> <input placeholder="School Name" name="" type="text" /></li>
                            <li> <input placeholder="Date attended" name="" type="text" /> <i class="fa fa-calendar"></i></li>
                            <li> <i class="fa"></i> <input placeholder="Degree" name="" type="text" /></li>
                            <li><i class="fa"></i> <input placeholder="Location" name="" type="text" /></li>
                            <li><i class="fa"></i> <textarea placeholder="Write a short description..." ></textarea></li>
                        </ul>
                    </div>
                        <div style="clear:both;"></div>
                        <div style="text-align:center" class="form-group">
                            <?= Html::submitButton('Chick here to go to appointment page ', ['class' => 'btn-signup', 'name' => 'signup-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
  </div>
</div>

