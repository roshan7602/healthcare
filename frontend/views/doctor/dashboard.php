<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\DoctorleftsidebarWidget;
$this->title = 'Doctor Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container doctor-profile">
    <div class="col-md-3 sidebar">
        
        
        <?= DoctorleftsidebarWidget::widget(
            [
                
            ]
        );?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
<div class="col-md-9 pull-right">
<div class="comment-box pull-left">
<div class="col-sm-12">
  <div class="dialogbox">
    <div class="body">
      <span class="tip tip-left"></span>
      <div class="message">
        <span> <textarea placeholder="What’s on your mind.." rows="5" id="comment"></textarea></span>
        <div class="button-row border-line"><div class="pull-left"><div class="fileUpload pull-left ">
    <span>Upload photo</span>
    <input type="file" class="upload text-upload" />
</div><div class="add-file pull-left"><a href="#">Add file</a></div></div> <button type="button" class="btn btn-success">Post</button></div>
      </div>
    </div>
  </div>
 <div class="info">
 <h3>85% Indians are Making These DIET Mistakes</h3>
 <div class="row"><div class="pull-left profile-details"><div class="image pull-left"><img class="img-circle user-photo" src="<?php echo Yii::$app->params['baseUrl'];?>images/profile-icon.jpg"></div>
 <div class="info pull-left">Kartik Mangolia <span>10 hour</span></div>
 </div>  <button type="button" class="btn btn-default pull-right">FOLLOW</button></div>
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum, dui ut ullamcorper 
maximus, eros elit mollis dui, sit amet pulvinar mauris ligula vel massa. Etiam finibus 
aliquam efficitur. Maecenas ultricies sollicitudin dolor, at porttitor dolor eleifend vel. <br /><br />

Sed eleifend convallis tempor. In venenatis arcu quis purus tincidunt, vitae convallis 
tellus elementum. Duis elementum urna at dui dapibus consequat. Fusce at luctus 
ipsum, et tristique diam. In scelerisque sapien id eros malesuada, quis mattis ante venenatis. 
Cras est magna, posuere eu arcu et, imperdiet rhoncus ante. </p>
<div class="add"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/add-1.jpg"></div>
<div class="comment-like col-sm-12"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/comment-like.png"></div>
<div class="add-comment col-sm-12"><a href="#">Add a comment</a></div>
 </div>
</div><!-- /col-sm-5 -->
</div>

</div></div>
<div style="clear:both;"></div>