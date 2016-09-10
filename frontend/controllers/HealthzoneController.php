<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\models\CategoryModel;
use frontend\models\Uploadimage;
use yii\web\UploadedFile;
//use common\controller\BasedoctorController;
class HealthzoneController extends Controller
{   public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['category','call_subcategory'],
                        'allow' => true,
                       // 'roles' => [''],
                    ],
                    [
                        'actions' => ['fetch_data_ajax_content','home','content','subcategory','error','viewcontent','testing'],
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

    public function actionHome()
    {
    
        return $this->render('home');
    }
    public function actionContent()
    {
        
        Yii::$app->Doctorcheck->doctor_check(\Yii::$app->user->identity->user_type);
        
        $model_cat = new CategoryModel();
        $model_image = new Uploadimage();
        if (Yii::$app->request->post()) {
            
                $cat_id=Yii::$app->request->post('CategoryModel'); 
                $category_id=$cat_id['category_id'];
                $content=Yii::$app->request->post('Content');
                $subcat=Yii::$app->request->post('subcategory');
                $data_title=Yii::$app->request->post('Uploadimage');
                $image = UploadedFile::getInstance($model_image, 'image');
                $image_name=$image->name;
                $path=Yii::$app->params['post_image_path'].$cat_id['category_id'];
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $image_name_save=Yii::$app->Datecall->imagename($image_name);
                $image_save_path=$path."/".$image_name_save;
                $image->saveAs($image_save_path);
                
                $model_cat->insertcontent($category_id,$content,$subcat,$image_name_save,$data_title['title']);
        }
        return $this->render('content',[ 'model' => $model_cat,'model_image'=>$model_image]);
    }
    public function actionSubcategory()
    {
            
        if (Yii::$app->request->isAjax) {
           $id=Yii::$app->request->get('id');
            $model_subcat = new CategoryModel();
            $result_sub=$model_subcat->subcategory($id);
            //print_r($result_sub);die;
            $count_sub=count($result_sub);
            $x='';
            for($i=0;$i<$count_sub;$i++){
               $x.="<option value='".$result_sub[$i]['category_id']."'>".$result_sub[$i]['name']."</option>";
            }
            return $x;
        }
    }
    public function actionViewcontent()
    {
        $content_view=new CategoryModel();
        if (Yii::$app->request->isAjax) {
            $start=Yii::$app->request->post('pass_limit');
            $end=5;
            $viewres=$content_view->content_view($start,$end);
            return json_encode($viewres);
        }else{
            $viewres=$content_view->content_view(0,5);
            return $this->render('viewcontent',['dataprovider'=>$viewres]);
        }
        
        
    }
    public function actionError()
    {
       return $this->render('error');
    }
    public function actionTesting()
    {
       return $this->render('test');
    }
    public function actionCategory()
    {
        return $this->render('category');
    }
    public function actionCall_subcategory(){
        if (Yii::$app->request->isAjax) {
            $category_list=Yii::$app->request->post('array_val');
            echo $category_list;
        }
    }
    
}
