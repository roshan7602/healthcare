<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
//use kartik\date\DatePicker;
$url=Url::base();
$this->title = 'Socio-Health Network';
$this->params['breadcrumbs'][] = $this->title;




//echo '<label>Check Issue Date</label>';
//echo DatePicker::widget([
//    'name' => 'check_issue_date', 
//    'value' => date('d-M-Y', strtotime('+2 days')),
//    'options' => ['placeholder' => 'Select issue date ...'],
//    'pluginOptions' => [
//        'format' => 'dd-M-yyyy',
//        'todayHighlight' => true
//    ]
//]);


?>
<div class="container">
    
  <h2>Content</h2>
  
  <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    
    <div class="form-group">
       <?php $dataCategory=ArrayHelper::map(\frontend\models\CategoryModel::find()->where(['status' =>'1'])->andWhere(['main_category' =>'0'])->orderBy('name')->asArray()->all(), 'category_id', 'name');
         echo $form->field($model, 'category_id')->dropDownList($dataCategory, 
             ['prompt'=>'-Choose a Category-',
              'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('healthzone/subcategory?id=').'"+$(this).val(),function(data){
                    $( "#select" ).html(data);
                });
            ']); 
         ?>
  
    </div>
    <div class="form-group">
        <label for="sel2">Subcategory</label>
        <select name="subcategory" class="form-control input-lg" id="select">
        
        </select>
    </div>
    <div class="form-group">
        <?= $form->field($model_image, 'title')->textInput() ?>
    </div>
  
    <div class="form-group has-error">
        <label for="sel2">Content</label>
        <div class="col-sm-12">
          <div class="fg-line">
            <!--$form->field($model_image, 'Content')->textArea(array('id'=>'descr','class'=>'content_val')) -->
             <textarea name="Content" id="descr" class="content_val" style="width:100%;  height:300px" ></textarea>
          </div>
            
        </div>
        <div id="show_error" style="display:none;" class="help-block hideclass">Content cannot be blank.</div>
    </div>
    <div class="form-group">
    <?php
        echo '<label class="control-label">Add Attachments</label>';
        /*echo FileInput::widget([
            'name' => 'attachment_post_image',
            'options'=>[
                'multiple'=>true
            ],
            'pluginOptions' => [
                'showUpload' => false
            ]
        ]);
         
         */
        echo $form->field($model_image, 'image')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*'
            ],
            'pluginOptions' => [
                'showUpload' => false
            ]
        ]);
  ?>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="">&nbsp;</label>
        <div class="col-sm-10">
          <div class="fg-line">
            <?= Html::submitButton('Submit', ['class' => 'submit btn btn-info  form-sub']) ?>

          </div>
        </div>
     </div>
  <?php  ActiveForm::end(); ?>
</div>
<?php
$urlck=Yii::$app->params['ckeditor_path'];
$script=<<< JS
        var htmlString="$urlck";
        CKEDITOR.replace( 'Content',
        {
        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl:htmlString+'ckeditor/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : htmlString+'ckeditor/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : htmlString+'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : htmlString+'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : htmlString+'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        }); 
        
        
        var body_val = $('.template_body').val();
        $(".note-editable").html(body_val);
        
        $('.submit').click(function(){
            if(CKEDITOR.instances.descr.getData()==''){
                $('#show_error').show(); 
                return false;
            }else{
                $('#show_error').hide();
            }
        }); 
          
JS;
$this->registerJs($script);            
?>
