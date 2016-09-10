<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\CategoryNavigationWidget;
$this->title = 'Home Facilities';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
    <div class="col-md-3 sidebar">
         <?= CategoryNavigationWidget::widget(
            [
                
            ]
            );?>
    </div>
    <div class="loading" style="display:none;"><img class="loader" src="<?php echo Yii::$app->params['baseUrl']."loader.gif"; ?>"/></div>
    <div class="col-md-9 right-content">
        <div class="toolbar">Find everything you need to know here about health 
            <div class="sort-by pull-right"><label>SORT BY</label>
                <select class="selectpicker">
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img class="img-responsive" src="<?php echo Yii::$app->params['baseUrl'];?>images/blog-1.jpg">
                <div class="carousel-caption">
                    <h4>Why We Get Running Injuries</h4>
                    <span>Published on 23 Jan 2016</span>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-responsive" src="<?php echo Yii::$app->params['baseUrl'];?>images/blog-2.jpg">
                <div class="carousel-caption">
                    <h4>10 Solutions not to get depressed</h4>
                    <span>Published on 29 Jan 2016</span>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="limitpass" value="5"/>  