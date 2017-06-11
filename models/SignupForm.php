<?php

namespace app\models;

use Yii;
use yii\validators\UniqueValidator;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 */
class SignupForm extends \yii\db\ActiveRecord
{
    public $password_repeat;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            #[['login'], 'unique', 'className'=>'User', 'attributeName'=>'login'],
            [['login', 'first_name', 'last_name'], 'string', 'max' => 255],
            #[['login'], 'min' => 3],
            [['password'], 'string', 'max' => 32],
            [['password_repeat'], 'string', 'max' => 32],
            ['password', 'compare', 'compareAttribute'=>'password_repeat','on'=>'register, recover', 'message' => 'Пароли не совпадают'],
            ['password_repeat', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Подтверждение пароля',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
        ];
    }
}
