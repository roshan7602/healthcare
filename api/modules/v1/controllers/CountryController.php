<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
//use yii\helpers\ArrayHelper;
//use yii\web\Response;
/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountryController extends ActiveController
{
//public function behaviors()
//{
//    /*
//     * set response header to application/json
//     */
//    return ArrayHelper::merge(parent::behaviors(), [
//        'contentNegotiator' => [
//            'formats' => [
//                'application/json' => Response::FORMAT_JSON,
//            ],
//        ],
//    ]);
//} 
    
public $modelClass = 'api\modules\v1\models\Country';    
}


