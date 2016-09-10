<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Home Facilities';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
    <div class="col-md-3 sidebar">
        <?php

/* @var $this yii\web\View */

?>

    <div class="col-md-12 leftsidebar">
     
     <div id="accordion-first" class="clearfix">
                        <div class="accordion" id="accordion2">
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#medical-care" href="#collapseOne">
                                <em class="icon-fixed-width fa fa-plus"></em>MEDICAL CARE
                              </a>
                            </div>
                            <div class=
"accordion-body collapse" id="collapseOne">
<div class="accordion-inner">
<ul class="nav nav-list">
<li class="selected"><a href="<?php echo Yii::$app->urlManager->createUrl(['site/arthrits']);?>">ARTHRITS</a></li>
<li><a href="#">CANCER</a></li>
<li><a href="#">ASTHMA</a></li>
<li><a href="#">THYROID</a></li>
<li><a href="#">PAIN</a></li>
<li><a href="#">YOGA</a></li>
</ul>
</div>
</div>
                          </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseTwo">
                                <em class="icon-fixed-width fa fa-plus"></em>FITNESS WELLNESS
                              </a>
                            </div>
                            <div class=
"accordion-body collapse" id="collapseTwo">
<div class="accordion-inner">
<ul class="nav nav-list">
<li><a href="#">ARTHRITS</a></li>
<li><a href="#">CANCER</a></li>
<li><a href="#">ASTHMA</a></li>
<li><a href="#">THYROID</a></li>
<li><a href="#">PAIN</a></li>
<li><a href="#">YOGA</a></li>
</ul>
</div>
</div>
                          </div>
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseThree">
                                <em class="icon-fixed-width fa fa-plus"></em>FITNESS WELLNESS
                              </a>
                            </div>
                            <div class=
"accordion-body collapse" id="collapseThree">
<div class="accordion-inner">
<ul class="nav nav-list">
<li><a href="#">ARTHRITS</a></li>
<li><a href="#">CANCER</a></li>
<li><a href="#">ASTHMA</a></li>
<li><a href="#">THYROID</a></li>
<li><a href="#">PAIN</a></li>
<li><a href="#">YOGA</a></li>
</ul>
</div>
</div>
                          </div>
                        </div><!-- end accordion -->
                    </div>
	</div>
    


<script>/*
 (function($) {

 

   var iconOpen = 'fa fa-minus',
        iconClose = 'fa fa-plus';

    $(document).on('show .bs. collapse hide.bs.collapse', '.accordion', function (e) {
        var $target = $(e.target)
          $target.siblings('.accordion-heading')
          .find('em').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show')
              $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          if(e.type == 'hide')
              $(this).find('.accordion-toggle').not($target).removeClass('active');
    });
    
});*/
 </script>
        
    </div>
<div class="col-md-9">dxvxzvcxv</div>
</div>
 <?php
  $script_pop1 =<<< JS
    var $ = jQuery.noConflict();
    $(document).ready(function(e) {
        var iconOpen = 'fa fa-minus';
        var iconClose = 'fa fa-plus'; 
        $(document).on('click', '.accordion-toggle', function (e) {
            var target = $(this);
            target.find('em').toggleClass(iconOpen + ' ' + iconClose);
            if(e.type == 'show')
                target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
                if(e.type == 'hide')
                    $(this).find('.accordion-toggle').not(target).removeClass('active');
        });
    });
JS;
  $this->registerJs($script_pop1);
  ?>
<script>

</script>