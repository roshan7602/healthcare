<?php

namespace app\components;
use Yii; 
use yii\base\Widget;
use frontend\models\CategoryModel;

class CategoryWidget extends Widget{
    public $form;
    public function init(){
        parent::init();
    }
    public function run(){
        $pass_var=$this->form;
        $obj_category=new CategoryModel();
        $data=$obj_category->category();
        return $this->render('category',['form'=>$pass_var,'obj'=>$obj_category,'data'=>$data]);
    }
}