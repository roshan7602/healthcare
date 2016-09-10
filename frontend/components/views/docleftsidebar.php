<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>

    <div class="col-md-12 leftsidebar">
        <div class="doctor-info">
            <img class="img-circle user-photo" src="<?php echo Yii::$app->params['baseUrl'];?>images/profile-icon.jpg">
            <div class="name">Dr. Maj. Gen Mahesh</div>
            <div class="details">MDS - Oral & Maxillofacial<br />Surgery, BDS<br />Dentist</div>
        </div>
        <div style="clear:both;"></div>
        <div id="accordion-first" class="clearfix">
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#medical-care" href="#"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/icon/my-feed.png">My Feeds</a>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#medical-care" href="#"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/icon/my-dashboard.png">My Dashboard</a>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#medical-care" href="#"><img src="<?php echo Yii::$app->params['baseUrl'];?>images/icon/appointments.png">Appointments</a>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle collapsed network" data-toggle="collapse" data-parent="#medical-care">
                        <em class="icon-fixed-width fa fa-plus"></em><img src="<?php echo Yii::$app->params['baseUrl'];?>images/icon/networks.png">Networks
                      </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseOne">
                        <div class="accordion-inner">
                            <ul class="nav nav-list">
                                <li class="network_menu">Doctors</li>
                                <li class="network_menu">Patients in my area</li>
                                <li class="network_menu">Find senior doctor</li>
                                <li class="network_menu">Health Community</li>
                                <li class="network_menu">Find vendors near me</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#medical-care" href="#"><img src="<?php echo Yii::$app->params['baseUrl'];?>/images/icon/medical-briefcase.png">Medical briefcase </a>
                    </div>
                </div>
            </div><!-- end accordion -->
        </div>
    </div>
<?php
    $this->registerJsFile('../../js/doctorsidebar.js');
?> 
    
