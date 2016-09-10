<?php
namespace frontend\models;
use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class UserSignup extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            //['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $status="0";
         $user->username = $this->username;
         $user->email = $this->email;
         $user->status = $status;
         $user->setPassword($this->password);
         $user->generateAuthKey();
        $token = $user->getConfirmationLink();
        $user->token = $token;
        $created_at = date('Y-m-d h:i:s');
        $user->register_date = $created_at;
        
       //return $user->save() ? $user : null;
        if ($user->validate()) {
            if($user->save()) {
           //print_r("asd");
            //die();
    /*-----------------------------Send Email area start------------------------------------------*/

       Yii::$app->mailer->compose('layouts/mytheame', ['token' => $token, 'username' => $user->username])
                ->setFrom('utopeentesting@gmail.com')
                ->setTo($user->email)
                ->setSubject('Signin Confirmation')
                ->send();

    /*-----------------------------Send Email area end------------------------------------------*/


            }

        }
    }

}
