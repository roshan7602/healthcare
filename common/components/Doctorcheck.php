<?php

namespace common\components;
use Yii;
use yii\base\Component;

class Doctorcheck extends Component{
    public function doctor_check($type){
        if($type==1){
            return true;
        }else{
            
            //return Yii::$app->getResponse()->redirect('../../../../..'.Yii::$app->params['FrontendUrl'].'index.php/useraction/userview');
        }
    }
    
}
?>