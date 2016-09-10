<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class UseractionController extends Controller
{
    
//     public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                
//                'rules' => [
//                    [
//                        'actions' => ['category'],
//                        //'allow' => true,
//                       // 'roles' => ['@'],
//                    ],
//                    [
//                        'actions' => ['userview'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                    
//                ],
//            ],
//            
//        ];
//    }

    

    public function actionUserview(){   
        $userid = Yii::$app->request->get('userid'); 
        return $this->render('userview');
    }
    public function actionCategory(){ echo"sd"; 
        $userid = Yii::$app->request->get('userid'); 
        return $this->render('category');
    }
    
}
