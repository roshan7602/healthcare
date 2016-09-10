<?php

namespace app\components;
use Yii; 
use yii\base\Widget;

class CategoryNavigationWidget extends Widget{
    public $form;
    public function init(){
        parent::init();
    }
    public function run(){
        return $this->render('category');
    }
}