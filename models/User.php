<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 */
class User extends ActiveRecord implements IdentityInterface {
    #прописать св-ва для использования
    public $login;
    public $password;
    public $password_repeat;
    public $auth_key;
    
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
            [['login', 'first_name', 'last_name'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 32],
            [['password_repeat'], 'string', 'max' => 32],
            ['password', 'compare', 'on'=>'register, recover'],
            ['password_repeat', 'safe']
        ];
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'password_repeat' => 'Подтверждение пароля'
        ];
    }
    
    public static function findByLoginPass($login, $password) {
        return self::findOne([
            'login' => $login,
            'password'  => md5($password)
        ]);
    }
    #IndentityInterface
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }
}
