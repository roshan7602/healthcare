<?php

namespace frontend\models;
use Yii;
use yii\db\Query;

/**
 * Login form
 */
class SpecialistModel extends \yii\db\ActiveRecord
{
    public $category_id;
    public $phone;

    public static function tableName()
    {
        return 'specialist_master';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['id'], 'required','message' => 'Please select Specialist' ],
        ];
    }
    
}
