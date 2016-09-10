<?php

namespace frontend\models;
use Yii;
use yii\db\Query;

/**
 * Login form
 */
class Uploadimage extends \yii\db\ActiveRecord
{
    public $image;
    public $title;
    
    public function rules()
    {
        return [
            [['image','title'], 'required'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }
}
