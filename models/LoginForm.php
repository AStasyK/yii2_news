<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 */
class LoginForm extends \yii\db\ActiveRecord
{
    private $_user = false; #подчеркивание т.к. приватное
    public $login;
    public $password;
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
            #указанное правило распростр.на все поля в массиве
            [['login', 'password'], 'filter', 'filter' => 'trim'],
            [['login'], 'string', 'max' => 255, 'min' => 3],
            [['password'], 'string', 'max' => 32],
            [['password'], 'validatePassword'],
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
        ];
    }
    
    public function login() {
        if ($this->validate()) {
            $user = $this->getUser();
            if ($user) {
                return Yii::$app->user->login($user, 3600*24*30);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = User::findByLoginPass($this->login, $this->password);
        }
        return $this->_user;
    }
    
    public function validatePassword($attribute) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user) {
                $this->addError($attribute, 'Неверная связка логин/пароль');
            }
        }
    }
}
