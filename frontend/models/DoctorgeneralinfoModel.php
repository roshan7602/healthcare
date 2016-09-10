<?php

namespace frontend\models;
use Yii;
use yii\db\Query;

/**
 * Login form
 */
class DoctorgeneralinfoModel extends \yii\db\ActiveRecord
{

    //public $email;

    public static function tableName()
    {
        return 'doctor_personal_details';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email','phone','MRnumber','sex','address'], 'required'],
            ['email', 'email'],
        ];
    }
    public function fetchdatadoctor(){
        $model = DoctorgeneralinfoModel::find()
	->where("id=1")
	->one();
        return $model;
    }
    
}
