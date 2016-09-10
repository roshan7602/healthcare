<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
  $('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
})

</script>
<div class="tasb-row">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="user" role="tab" data-toggle="tab">User</a></li>
    <li role="presentation"><a href="#profile" aria-controls="doctor" role="tab" data-toggle="tab">Doctor</a></li>
  </ul>
   <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="user"><div class="site-signup">
    <center>
    <span class="page-icon"><i class="fa fa-user"></i></span>

 <h5>Create your profile</h5>
</center>

    <div class="row">
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="col-lg-4">
           <div class="arrow-text"><img src="../images/arrow.jpg">
      <h4 class="text">Choose your speciality</h4></div>
                         <ul>
                    <li class="select-li">
  <select class="form-control" id="sel1">
    <option>Choose your speciality</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</li>
   <li><div class="add-plus">Add more specialities <i class="fa fa-plus"></i> </div></li>
    </ul>

           <?php /*?>     <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div><?php */?>
 </div>
   <div class="col-lg-4">
           <div class="arrow-text"><img src="../images/arrow.jpg">
      <h4 class="text">Enter your general information</h4></div>
               <ul>
                    <li><i class="fa fa-envelope"></i> <input placeholder="Email address" name="" type="text" /></li>
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
           <div class="arrow-text"><img src="../images/arrow.jpg">
      <h4 class="text">Medical Information</h4></div>
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
</div></div>
    <div role="tabpanel" class="tab-pane" id="doctor">
    <div class="site-signup">
    <center>
    <span class="page-icon"><i class="fa fa-user-md"></i> </span>

 <h5>Create your profile</h5>
</center>

    <div class="row">
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="col-lg-4">
           <div class="arrow-text"><img src="../images/arrow.jpg">
      <h4 class="text">Choose your speciality</h4></div>
                         <ul>
                    <li class="select-li">
  <select class="form-control" id="sel1">
    <option>Choose your speciality</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</li>
   <li><div class="add-plus">Add more specialities <i class="fa fa-plus"></i> </div></li>
    </ul>

           <?php /*?>     <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div><?php */?>
 </div>
   <div class="col-lg-4">
           <div class="arrow-text"><img src="../images/arrow.jpg">
      <h4 class="text">Enter your general information</h4></div>
               <ul>
                    <li><i class="fa fa-envelope"></i> <input placeholder="Email address" name="" type="text" /></li>
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
           <div class="arrow-text"><img src="../images/arrow.jpg">
      <h4 class="text">Medical Information</h4></div>
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

