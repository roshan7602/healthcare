<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\models\SpecialistModel;
use frontend\models\DoctorgeneralinfoModel;
use frontend\models\Generalmodel;
//use common\controller\BasedoctorController;
class DoctorController extends Controller
{   public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['home'],
                        'allow' => true,
                       // 'roles' => [''],
                    ],
                    [
                        'actions' => ['doctorprofile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
            
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionHome(){
        return $this->render('dashboard');
    }
    public function actionDoctorprofile(){
        $model_specilist = new SpecialistModel();
        $model_general_info = new DoctorgeneralinfoModel();
        $doctor_dataFetch=DoctorgeneralinfoModel::fetchdatadoctor();
        $state_list=Generalmodel::get_states_lists();
        if ($doctor_dataFetch->load(Yii::$app->request->post())) {
            $doctor_dataFetch->save();
        }
        return $this->render('doctorprofile',['model'=>$model_specilist,'docinfo'=>$doctor_dataFetch,'state'=>$state_list]);
    }
}
