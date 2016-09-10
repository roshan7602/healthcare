<?php

namespace common\components;
use Yii;
use yii\base\Component;
class Datecall extends Component{
    public function datecallasia(){
        return date('M d, Y,h:m:s');
    }
    public function imagename($imagename){
                if(strlen(Yii::$app->security->generateRandomString($length =8)."-".date('MdYhms').'-'.$imagename)>50){
                   return  Yii::$app->security->generateRandomString($length =8)."-".date('MdYhms').'-';
                }else{
                   return Yii::$app->security->generateRandomString($length =8)."-".date('MdYhms').'-'.$imagename;
                }
    }
}
?>