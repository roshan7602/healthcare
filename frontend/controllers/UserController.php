<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\UserSignup;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Generalmodel;
/**
 * Site controller
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
////            'verbs' => [
////                'class' => VerbFilter::className(),
////                'actions' => [
////                    'logout' => ['post'],
////                ],
////            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function actions()
    {

        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                //'successCallback' => [$this, 'oAuthSuccess'],
                'successCallback' => [$this, 'successCallback'],
            ],
        ];

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

    public function successCallback($client)
    {
        
        $model = new User;
        $attributes = $client->getUserAttributes();
        //echo"<pre>";print_r($attributes);die;
        // user login or signup comes here

        $user_email = $attributes['email'];


        $user_name = $attributes['name'];
        //$first_name = $attributes['first_name'];
        //$last_name = $attributes['last_name'];
        $pwd = "allfbusers";
        //$user_profile_pic = "https://graph.facebook.com/".$attributes['id']."/picture?width=150&height=150";
        //echo $user_profile_pic; die;
        //echo $user_email;echo '<br>';
        //echo $user_name;
        //die();

        $user = User::find()->where(['email'=>$user_email])->one();
        echo $count = count($user);
        if ($count == 0 ){
            //return $this->redirect(['user/create',['email'=>$user_email,'name'=>$user_name]]);

            //$emailid = Yii::$app->request->get('email');
            $model->email = $user_email;
            $model->username = $user_name;
            $model->password = $pwd;
            $model->save(); 
            $user = User::find()->where(['email'=>$model->email])->one();
            return Yii::$app->user->login($user);
        }else{
            //echo Yii::$app->user->getId();die;
            return Yii::$app->user->login($user);
            //echo Yii::$app->user->identity->id;die();
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
     
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $obj_genral=new Generalmodel();
            $userInfo=$obj_genral->userinfo(Yii::$app->user->getId());
            //here you can asisgn landing page
            if($userInfo[0]['user_type']==1){
                return $this->goHome();
            }else{
                return $this->goHome();
            }
           
            //return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
       // echo "sd";die;
        Yii::$app->user->logout();
        
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new UserSignup();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    public function actionError()
    {
       return $this->render('error');
    }
    
}
